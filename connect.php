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

?>