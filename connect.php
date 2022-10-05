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




if(isset($_POST['SimpanEdit'])){
    $idproduk1 = $_POST['id_produk'];
    $kodeproduk1 = $_POST['Edit_Kode_Produk'];
    $namaproduk1 = $_POST['Edit_Nama_Produk'];
    $stock1 = $_POST['Edit_Stock_Produk'];
    $harga_modal1 = $_POST['Edit_Harga_Modal'];
    $harga_jual1 = $_POST['Edit_Harga_Jual'];

    $sql = mysqli_query($connect,"UPDATE produk SET kode_produk='$kodeproduk1', nama_produk='$namaproduk1', stock='$stock1', harga_modal='$harga_modal1', harga_jual='$harga_jual1' WHERE id_produk=$idproduk1");
    
    if($sql){
        header('Location: masuk.php');
    }else{
        echo '<script>alert("Gagal Edit Data");history.go(-1);</script>';
    }
};

if(isset($_POST['SimpanEditPelanggan'])){
    $idpelanggan1 = $_POST['idpelanggan'];
    $namapelanggan1 = $_POST['Edit_Nama_Pelanggan'];
    $telepon1 = $_POST['Edit_Telepon_Pelanggan'];
    $alamat1 = $_POST['Edit_Alamat_Pelanggan'];

    $sql = mysqli_query($connect,"UPDATE pelanggan2 SET namapelanggan='$namapelanggan1', notelp='$telepon1', alamat='$alamat1' WHERE idpelanggan=$idpelanggan1");
    
    if($sql){
        header('Location: pelanggan.php');
    }else{
        echo '<script>alert("Gagal Edit Data");history.go(-1);</script>';
    }
};



if(!empty($_GET['hapus'])){
    $idproduk1 = $_GET['hapus'];
    $hapus_data = mysqli_query($connect, "DELETE FROM produk WHERE id_produk='$idproduk1'");
    if($hapus_data){
        header('Location: masuk.php');
    }else{
        echo '<script>alert("Gagal Hapus Data");history.go(-1);</script>';
    }
}

// if(isset($_POST['tambahpesanan'])){
//     $idpelanggan = $_POST  ['idpelanggan'];

//     $insert = mysqli_query($connect,"INSERT INTO pelanggan2 (idpelanggan) VALUES ('$idpelanggan')");

//     if($insert){
//         header('location:order.php');
//     }else{
//         echo '<script>alert("Gagal Menambahkan Pelanggan Baru");
//         history.go(-1);</script>';
//     }

// }

if(isset($_POST['tambahpelanggan'])){
    $namapelanggan = $_POST  ['namapelanggan'];
    $notelp = $_POST  ['notelp'];
    $alamat = $_POST  ['alamat'];

    $insert = mysqli_query($connect,"INSERT INTO pelanggan2 (namapelanggan, notelp, alamat) VALUES ('$namapelanggan', '$notelp', '$alamat')");

    if($insert){
        header('location:pelanggan.php');
    }else{
        echo '<script>alert("Gagal Menambahkan Pelanggan Baru");
        history.go(-1);</script>';
    }

}

if(isset($_POST['tambahpesanan'])){
    $idpelanggan = $_POST ['idepelanggan'];

    $insert = mysqli_query($connect,"INSERT INTO pesanan (idpelanggan) VALUES ('$idpelanggan')");

    if($insert){
        header('location:view.php');
    }else{
        echo '<script>alert("Gagal Menambahkan Pelanggan Baru");
        history.go(-1);</script>';
    }

}



if(isset($_POST['addproduk'])){
    $idproduk = $_POST ['idproduk'];
    
    $insert = mysqli_query($connect,"INSERT INTO detailpesanan (idpesanan,idproduk,qty) VALUES ('$idpesanan','$idproduk','$qty')");
    
    if($insert){
        header('location:view.php?idpesanan='.$idpesanan);
      }else{

        echo '<script>alert("Gagal Menambahkan Pelanggan Baru");
        history.go(-1);</script>';
    }
}
?>