<?php

    // Ini Connect yaa temen temen

    $host = "localhost";
    $user = "root";
    $password = "";
    $database = "kasir_pintar";
    $connect = mysqli_connect($host,$user,$password,$database);


    // Kalau ini Function supaya data yang masuk ke database itu berubah menjadi strtolower / huruf kecil dan menghilangkan garis bawah juga

    function register($data){
        global $connect;


    $nama_depan = stripslashes($data["nama_depan"]);
    $nama_belakang = stripslashes($data["nama_belakang"]);
    $email = stripslashes($data["email"]);
    $password = mysqli_real_escape_string($connect, $data["password"]);
    



    // Cek Kalau username udh ada di DB atau belum
    $result = mysqli_query($connect, "SELECT nama_depan FROM akun WHERE nama_depan = '$nama_depan'");
    if( mysqli_fetch_assoc($result) ) {
        echo "<script>
                alert('First Name & Last Name Already Exist')
              </script>";
        return false;
    }




    // Enkripsi Password dek biar gk Di hek Bjorka
    $password = password_hash($password, PASSWORD_DEFAULT);

    // User Baru Akan Ditambahkan ke DB
    mysqli_query($connect, "INSERT INTO akun VALUES('', '$nama_depan', '$nama_belakang', '$email', '$password')");

    return mysqli_affected_rows($connect);
}








if(isset($_POST['tambah-produk'])){
    $kodeproduk = $_POST  ['Tambah_Kode_Produk'];
    $namaproduk = $_POST  ['Tambah_Nama_Produk'];
    $harga_modal = $_POST  ['Tambah_Harga_Modal'];
    $harga_jual = $_POST  ['Tambah_Harga_Jual'];
    $stock = $_POST  ['Tambah_Stock_Produk'];

    $insert = mysqli_query($connect,"INSERT INTO produk (kode_produk, nama_produk, harga_modal, harga_jual, stock) VALUES ('$kodeproduk', '$namaproduk', '$harga_modal', '$harga_jual', '$stock')");

    if($insert){
        header('location:masuk.php');
    }else{
        echo '<script>alert("Gagal Menambahkan Data");history.go(-1);</script>';
    }
}    

?>