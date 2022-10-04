<?php

    //Koneksi
    $conn = mysqli_connect('localhost', 'root', '', 'kasir_pintar');




    if(isset($_POST['tambah-produk'])){
        $kodeproduk = $_POST  ['Tambah_Kode_Produk'];
        $namaproduk = $_POST  ['Tambah_Nama_Produk'];
        $harga_modal = $_POST  ['Tambah_Harga_Modal'];
        $harga_jual = $_POST  ['Tambah_Harga_Jual'];
        $stock = $_POST  ['Tambah_Stock_Produk'];

        $insert = mysqli_query($conn,"INSERT INTO produk (kode_produk, nama_produk, harga_modal, harga_jual, stock) VALUES ('$kodeproduk', '$namaproduk', '$harga_modal', '$harga_jual', '$stock')");
    
        if($insert){
            header('location:masuk.php');
        }else{
            echo '<script>alert("Gagal Menambahkan Data");history.go(-1);</script>';
        }
    
    
    
    
    
    }




?>