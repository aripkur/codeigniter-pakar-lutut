var pathUrl = window.location.href;

$(document).ready(function(){
    resetKomponen();
    if ((pathUrl == "http://localhost/pakarlutut/konsultasi")){
        $("#modalNama").modal({
            backdrop: 'static',
            keyboard: false
        });

    }

    const dataPertanyaan =  $.ajax({
                                url: pathUrl+'/pertanyaan',
                                method: 'get',
                                dataType: 'json',
                                async: false
                            }).responseJSON;
    const dataCedera =  $.ajax({
                                url: pathUrl+'/cedera',
                                method: 'get',
                                dataType: 'json',
                                async: false
                            }).responseJSON;

    console.group("==== Data awal dari PHP ====");
        console.log('Data Cedera ',dataCedera);
        console.log('Data pertanyaan ',dataPertanyaan);
    console.groupEnd();

    let sisaDataCedera ;

    let nilaiCF = [];
    let inputGejala = ["1","2"];

    function resetKomponen(){
        $('.tombol-ya .btn').removeClass('tombol-active')
        $('.tombol-tidak .btn').removeClass('tombol-active')
        $('#tidak').attr('checked', false);
        $('#ya').attr('checked', false);
        $('#nilaiCf').val('');
        $('.konsul-nilaiCf').hide();

    }
    function buatPertanyaan(data, index){
        let tampilkan;
        let indexTampilkan;
        for(let i = index; i < dataPertanyaan.length; i++){
            for(let a= 0; a < data.length; a++){
                cedera = data[a].gejala.split(",");
                if(cedera.includes(dataPertanyaan[i].gejala_id)){
                    tampilkan = "ya";
                    indexTampilkan = i;
                    break;
                }
            }
            if(tampilkan === "ya" && indexTampilkan !== undefined){
                break;
            }
        }
        console.log('Pertanyaan ke ', dataPertanyaan[indexTampilkan].gejala_id)


        if(tampilkan === "ya" && indexTampilkan !== undefined){
            resetKomponen();
            $('#pertanyaan').text(dataPertanyaan[indexTampilkan].gejala_nama)
            $('#pertanyaan-gambar').attr('src', '/pakarlutut/images/'+dataPertanyaan[indexTampilkan].gejala_gambar);
            $('.lanjut').data('index', indexTampilkan);
            $('.lanjut').data('gejalaId', dataPertanyaan[indexTampilkan].gejala_id);
        }
    }

    function pencarian(dataCederane, gejalaId, jawab){
        let cederaGejala = dataCederane.map(rowCedera=>rowCedera.gejala.split(","))
        let prosesCariGejala = jawab == "ya" ? cederaGejala.filter(rowCedera=>rowCedera.includes(gejalaId)) : cederaGejala.filter(rowCedera=>!rowCedera.includes(gejalaId));
        
        let hasilstrCederaGejala = prosesCariGejala.map(row=>row.join(",")); 
        
        let sisaCederaCari = [];
        hasilstrCederaGejala.forEach((element)=>{
            sisaCederaCari.push(dataCederane.filter(e => e.gejala === element));
        })

        let hasilPencarian = sisaCederaCari.map(e=>Object.assign(e[0]));

        console.group("==== Proses Pencarian '%s' ====", `${gejalaId} - ${jawab}`);
            console.log('data cederaGejala', cederaGejala)
            console.log('sisa cederaGejala(array)', prosesCariGejala)
            console.log('sisa cederaGejala(string)', hasilstrCederaGejala)
            console.log('sisa cedera(bentuke ruwet)', sisaCederaCari)
            console.log('sisa cedera(bentuke mantab)', hasilPencarian)
            console.log('hasil cari', hasilPencarian)
        console.groupEnd();

        console.group("==== Input User ====")
            console.log('input gejala', inputGejala)
            console.log('input nilaicf', nilaiCF)
        console.groupEnd();


        return hasilPencarian;
    }

    $('.tombol-ya').click(function(){
        $('#ya').attr('checked', true);
        $('#tidak').attr('checked', false);
        $('.tombol-ya .btn').addClass('tombol-active')
        $('.tombol-tidak .btn').removeClass('tombol-active')
        $('.konsul-nilaiCf').show(500);

    })
    $('.tombol-tidak').click(function(){
        $('#tidak').attr('checked', true);
        $('#ya').attr('checked', false);
        $('.tombol-tidak .btn').addClass('tombol-active')
        $('.tombol-ya .btn').removeClass('tombol-active')
        $('.konsul-nilaiCf').hide(500);
        $('#nilaiCf').val('');
    })

    $('.lanjut').click(function(){
        let index = $(this).data('index') ;
        let gejala = $(this).data('gejalaId') ;

        let dataCederane;
        if(index == 2){
             dataCederane = dataCedera;
        }else{
            dataCederane = sisaDataCedera;
        }        

        if ($('#ya').is(":checked")){
            
            inputGejala.push(gejala);
            nilaiCF.push(parseInt($('#nilaiCf').val()));
            sisaDataCedera = pencarian(dataCederane, gejala, "ya") 
        }
        else if($('#tidak').is(":checked")){
            sisaDataCedera = pencarian(dataCederane, gejala, "tidak") 
        }else{
            alert('Jawab pertanyaan dulu sebelum klik lanjut..')
            return false;
        }
        
        if(sisaDataCedera.length == 0){
            Swal.fire({
                icon: 'error',
                title: 'Data Cedera Tidak Ditemukan',
                allowOutsideClick: false
              }).then(()=> window.location.replace(pathUrl))

        }
        else if(sisaDataCedera.length == 1 && kompare(inputGejala, sisaDataCedera[0].gejala.split(","))){
            let nama = $('#tampilNama').text();
            let umur = $('#tampilUmur').text();
            let hasilCedera = sisaDataCedera[0].cedera_nama
            let hasilSolusi = sisaDataCedera[0].solusi
            let hasilCF = hitungCf(parseInt(sisaDataCedera[0].nilaicf))
            
            Swal.fire({
                icon: 'success',
                title: 'Data Cedera Ditemukan',
                allowOutsideClick: false
              }).then(()=> tampilKesimpulan(nama, umur, hasilCedera, hasilCF, hasilSolusi))
            
        }else{
            buatPertanyaan(sisaDataCedera, index + 1);
        }
    })
    
    function hitungCf(cfKaidah){
        let cfUser = Math.min(...nilaiCF);

        console.group("==== Ketemu ====")
            console.log('CF User: ', nilaiCF);
            console.log('CF: ', cfUser+' * '+cfKaidah);
        console.groupEnd();

        return ((cfUser/100) * (cfKaidah/100))*100
    }

    function kompare(a, b){
        if(JSON.stringify(a) == JSON.stringify(b)){
            return true;
        }else{
            return false;
        }
    }

    $('.modal-footer #tambahNama').click(function(){
        $('#modalNama').hide(2000);
        $('.modal-backdrop').remove();
        let umur = $('.modal-body #umur').val() ? $('.modal-body #umur').val() : 'NaN'
        let nama = $('.modal-body #nama').val() ? $('.modal-body #nama').val() : 'anonim'
        //let identitas = nama+' - '+umur
        $('#tampilNama').text(nama);
        $('#tampilUmur').text(umur);

        buatPertanyaan(dataCedera, 2);
    });

    function tampilKesimpulan(nama, umur, hasilCedera, hasilCF, hasilSolusi){
        $('.wrap-konsultasi').addClass('d-none');
        $('.kesimpulan-nama').text(nama)
        $('.kesimpulan-umur').text(umur)
        $('.kesimpulan-cedera').text(hasilCedera)
        $('.kesimpulan-nilaicf').text(hasilCF)
        $('.solusi').text(hasilSolusi)
        $('.wrap-kesimpulan').removeClass('d-none');
    }
});