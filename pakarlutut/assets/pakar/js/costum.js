var urle = window.location.href;

console.log(urle);

jQuery.extend( jQuery.fn.dataTableExt.oSort, {
    "last-2-digits-pre": function ( a ) {
       var n = a.substring(1)
       return parseInt(n)
    }
})

$(document).ready(function() {

    $('.bagian-form').hide();
    $('#bagian-gambar').hide();

    // ============== HALAMAN GEJALA ==================

    $('#tabelGejala').DataTable({
        "columnDefs": [
            { 
                "targets": [ 1, 2, 3],
                "orderable": false,
            },
            { 
                "targets":  0,
                "type": 'last-2-digits',
            },
        ],
        "aLengthMenu": [[25, 50, 75, -1], [25, 50, 75, "All"]],
        "iDisplayLength": 25
    });

    $('#buka-form-gejala').on('click', function(){
        $('.bagian-form').show(2000);
        $('#form-gejala')[0].reset();
        $('#form-gejala').attr('action', urle+'/tambah');
        $('#form-gejala button[type=submit]').html('TAMBAH DATA');
        $('#gejala-judul-card').html('Tambah Data');

        $(this).addClass('d-none');
        $('#tutup-form-gejala').removeClass('d-none');
        $('#bagian-gambar').hide();
    });

    $('#tutup-form-gejala').on('click', function(){
        $('.bagian-form').hide(2000);
        $('#form-gejala')[0].reset();
        $('#form-gejala').attr('action', urle+'/tambah');
        $('#form-gejala button[type=submit]').html('TAMBAH DATA');

        $(this).addClass('d-none');
        $('#buka-form-gejala').removeClass('d-none');
    });

    $('.ubah-gejala').on('click', function(){
        $('.bagian-form').show(2000);
        $('#form-gejala')[0].reset();
        $('#form-gejala').attr('action', urle+'/ubah');
        $('#form-gejala button[type=submit]').html('UBAH DATA');
        $('#gejala-judul-card').html('Ubah Data');

        let id =$(this).data('id');
        let kode =$(this).data('kode');
        let nama =$(this).data('nama');
        let gambar= $(this).data('gambar');
        let pathGambar = '/pakarlutut/images/'+$(this).data('gambar');

        
        $('#form-gejala-id').val(id);
        $('#form-gejala-kode').val(kode);
        $('#form-gejala-nama').val(nama);
        $('#form-gejala-gambar-lama').val(gambar);
        $('#tampil-gejala-gambar').attr('src', pathGambar);
        
        $('#bagian-gambar').show();
        $('#buka-form-gejala').addClass('d-none');
        $('#tutup-form-gejala').removeClass('d-none');

        $('html, body').animate({ scrollTop: $('body').offset().top }, 'slow');

    });

    // ============== HALAMAN CEDERA ==================
    $('#tabelCedera').DataTable({
        "aLengthMenu": [[25, 50, 75, -1], [25, 50, 75, "All"]],
        "iDisplayLength": 25,
        "columnDefs": [
            { 
                "targets": [ 1, 2, 4],
                "orderable": false,
            },
            { 
                "targets":  0,
                "type": 'last-2-digits',
            },
        ]
    });

    $('#buka-form-cedera').on('click', function(){
        $('.bagian-form').show(2000);
        $('#form-cedera')[0].reset();
        $('#form-cedera').attr('action', urle+'/tambah');
        $('#form-cedera button[type=submit]').html('TAMBAH DATA');
        $('#cedera-judul-card').html('Tambah Data');

        $(this).addClass('d-none');
        $('#tutup-form-cedera').removeClass('d-none');
    });

    $('#tutup-form-cedera').on('click', function(){
        $('.bagian-form').hide(2000);
        $('#form-cedera')[0].reset();
        $('#form-cedera').attr('action', urle+'/tambah');
        $('#form-cedera button[type=submit]').html('TAMBAH DATA');

        $(this).addClass('d-none');
        $('#buka-form-cedera').removeClass('d-none');
    });

    $('.ubah-cedera').on('click', function(){
        $('.bagian-form').show(2000);
        $('#form-cedera')[0].reset();
        $('#form-cedera').attr('action', urle+'/ubah');
        $('#form-cedera button[type=submit]').html('UBAH DATA');
        $('#cedera-judul-card').html('Ubah Data');

        let id =$(this).data('id');
        let kode =$(this).data('kode');
        let nama =$(this).data('nama');
        let nilaicf =$(this).data('nilaicf');
        let solusi =$(this).data('solusi');

        
        $('#form-cedera-id').val(id);
        $('#form-cedera-kode').val(kode);
        $('#form-cedera-nama').val(nama);
        $('#form-cedera-nilaicf').val(nilaicf);
        $('#form-cedera-solusi').val(solusi);
        
        $('#buka-form-cedera').addClass('d-none');
        $('#tutup-form-cedera').removeClass('d-none');

        $('html, body').animate({ scrollTop: $('body').offset().top }, 'slow');

    });

    // ============== HALAMAN KAIDAH ==================

    $('#tabelKaidah').DataTable({
        "aLengthMenu": [[25, 50, 75, -1], [25, 50, 75, "All"]],
        "iDisplayLength": 25,
        "columnDefs": [
            { 
                "targets": [ 1, 2, 3, 4],
                "orderable": false,
            },
            { 
                "targets":  0,
                "type": 'last-2-digits',
            },
        ]
    });

    $('#buka-form-kaidah').on('click', function(){
        $('.bagian-form').show(2000);
        $('#form-kaidah')[0].reset();
        $('#form-kaidah').attr('action', urle+'/tambah');
        $('#form-kaidah button[type=submit]').html('TAMBAH DATA');
        $('#kaidah-judul-card').html('Tambah Data');

        $(this).addClass('d-none');
        $('#tutup-form-kaidah').removeClass('d-none');
        $('#form-kaidah-kode').removeAttr('disabled');
        $("#form-kaidah-fkgejala option").removeAttr("selected");

    });

    $('#tutup-form-kaidah').on('click', function(){
        $('.bagian-form').hide(2000);
        $('#form-kaidah')[0].reset();
        $('#form-kaidah').attr('action', urle+'/tambah');
        $('#form-kaidah button[type=submit]').html('TAMBAH DATA');

        $(this).addClass('d-none');
        $('#buka-form-kaidah').removeClass('d-none');
    });

    $('.ubah-kaidah').on('click', function(){
        $('.bagian-form').show(2000);
        $('#form-kaidah')[0].reset();
        $('#form-kaidah').attr('action', urle+'/ubah');
        $('#form-kaidah button[type=submit]').html('UBAH DATA');
        $('#kaidah-judul-card').html('Ubah Data');

        let cedera =$(this).data('cedera');
        let kaidah =$(this).data('kaidah');
        let gejala =$(this).data('gejala');

        $('#form-kaidah-kode').val(kaidah);
        $('#form-kaidah-kode').attr('disabled', 'disabled');

        $('#form-kaidah-kode-hidden').val(kaidah);
        
        $("#form-kaidah-fkcidera").val(cedera);

        $.each(gejala.split(","), function(i,e){
            $("#form-kaidah-fkgejala option[value='" + e + "']").attr("selected", true);
        });
        
        $('#buka-form-kaidah').addClass('d-none');
        $('#tutup-form-kaidah').removeClass('d-none');

        $('html, body').animate({ scrollTop: $('body').offset().top }, 'slow');

    });
    // $('.ubah-gejala').on('click', function(){
    //     $('#ModalLabel').html('Ubah Data Gejala');
    //     $('.modal-footer button[type=submit]').html('Ubah Data');
    //     $('.modal-body form').attr('action', urle+'/ubah');

    //     const id =$(this).data('id');
    //     $.ajax({
    //         url: urle+'/ambil_data',
    //         data: {id : id },
    //         method: 'post',
    //         dataType: 'json',
    //         success: function (data) {
    //             $('#form-gejala-nama').val(data.gejala_nama);
    //             $('#form-gejala-id').val(data.gejala_id);
    //         }
    //     });
    // });

    // // ============== HALAMAN CIDERA ==================
    // $('#tabelCidera').DataTable();

    // $('.tambah-cidera').on('click', function(){
    //     $('#from-cidera-nama').val('');
    //     $('#from-cidera-saran').val('');
    //     $('.modal-body form').attr('action', urle+'/tambah');
    // });

    // $('.ubah-cidera').on('click', function(){
    //     $('#ModalLabel').html('Ubah Data Cidera');
    //     $('.modal-footer button[type=submit]').html('Ubah Data');
    //     $('.modal-body form').attr('action', urle+'/ubah');

    //     const id =$(this).data('id');
    //     $.ajax({
    //         url: urle+'/ambil_data',
    //         data: {id : id },
    //         method: 'post',
    //         dataType: 'json',
    //         success: function (data) {
    //             $('#form-cidera-nama').val(data.cidera_nama);
    //             $('#form-cidera-saran').val(data.cidera_saran);
    //             $('#form-cidera-id').val(data.cidera_id);
    //         }
    //     });
    // });
    // // ============== HALAMAN KAIDAH ==================
    // $('#tabelmasterkaidah').DataTable();

    //     // AMBIL DATA CIDERA
    //     $.ajax({
    //         url: 'http://localhost/sistempakar/admin/cidera/ambil_data_objek',
    //         method: 'post',
    //         dataType: 'json',
    //         success: function (data) {
    //             html = "";
    //             data.forEach(function(perdata) {
    //                 html+="<option value='"+perdata.cidera_id+"'>"+perdata.cidera_nama+"</option>";

    //             });
    //             $('#form-cidera-id').html(html);
    //         }
    //     });
    //     // AMBIL DATA GEJALA
    //     $.ajax({
    //         url: 'http://localhost/sistempakar/admin/gejala/ambil_data_objek',
    //         method: 'post',
    //         dataType: 'json',
    //         success: function (data) {
    //             html = "";
    //             data.forEach(function(perdata) {

    //                 html+="<div class='form-check' ><input type='checkbox' class='form-check-input' value='"+perdata.gejala_id+"' name='form-gejala-id[]'><label class='form-check-label' for='exampleCheck1'>"+perdata.gejala_nama+"</label></div>"
    //             });
    //              $('#gejala-checklist').html(html);
    //         }
    //     });

    //     $('#tambah-kaidah').on('click', function(){
    //         $('.modal-body form').attr('action', urle+'/tambah');
    //     });

    //     $('.ubah-kaidah').on('click', function(){
    //         $('#ModalLabel').html('Ubah Data Kaidah');
    //         $('.modal-footer button[type=submit]').html('Ubah Data');
    //         $('.modal-body form').attr('action', urle+'/ubah');

    //         const id =$(this).data('id');
    //         $.ajax({
    //             url: urle+'/ambil_data',
    //             data: {id : id },
    //             method: 'post',
    //             dataType: 'json',
    //             success: function (data) {
    //                 console.log(data);
    //             }
    //         });
    //     });


});