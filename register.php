<?php

include 'connect.php';

if(isset($_POST["register"])) {
    if(register($_POST) > 0 ) {
        echo "<script>
                alert('New User Has been Added')
              </script>";
        header("Location: login.php");
    }else{
        echo mysqli_error($connect);
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <!-- CSS -->
    <link rel="stylesheet" href="style/register.css">
    <!-- Icon -->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</head>
<body>

    <!-- Navbar -->
    <header>
        <nav>
            <div class="logo">
                <ion-icon name="ellipse" class="blue"></ion-icon>
                <h1>Kasir Pintar</h1>
            </div>
            <img src="img/moon.png" alt="" id="icon">
        </nav>
    </header>

    <div class="text">
        <p>START FOR FREE</></p>
        <h1><span class="heading">Create New Account</span><span class="circle">.</span></h1>
        <p>Already A Member? <a href="login.php"><span class="blue"> Log In</span></a></p>
    </div>

    <!-- FORM -->
        <div class="form">
            <form action="" method="post">
                    <div class="name">
                        <div class="input">
                            <label for="firstname">First Name</label>
                            <input type="text" name="nama_depan" id="firstname" required>
                        </div>
                        <div class="input">
                            <label for="lastname">Last Name</label>
                            <input type="text" name="nama_belakang" id="lastname" required>
                        </div>
                    </div>
                    <div class="email">
                        <label for="email">Email</label>
                        <input type="text" name="email" id="email" required>
                    </div>
                    <div class="password">
                        <label for="password">Password</label>
                        <input type="password" name="password" id="password" required>
                    </div>
                    <button type="submit" name="register">Create Account</button>
            </form>
        </div>


        <div class="image">
            <img src="img/cashier.png" alt="">
        </div>

        <script>
            var icon = document.getElementById("icon");
            var body = document.querySelector("body");
            

                icon.onclick = function(){
                    document.body.classList.toggle("dark-theme")
                    if(document.body.classList.contains("dark-theme")){
                        icon.src = "img/sun.png";
                    }else{
                        icon.src = "img/moon.png";
                    }
                }
        </script>

</body>
</html>