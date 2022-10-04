

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style/login.css">
</head>
<body>
        <!-- Navbar -->
        <header>
        <nav>
            <div class="logo">
                <div class="circle-logo"></div>
                <h1>Kasir Pintar</h1>
            </div>
            <img src="img/moon.png" alt="" id="icon">
        </nav>
    </header>

    <div class="text">
        <h1><span class="text-login">Login Member</span><span class="titik">.</span></h1>
        <p>Don't have account? <a href="register.php"><span class="biru"> Register </span></a></p>
    </div>
        <div class="form">
            <form action="dashboard.php" method="POST">
                    <div class="email">
                        <label for="email">Email</label>
                        <input type="text" name="email" id="email" required>
                    </div>
                    <div class="password">
                        <label for="password">Password</label>
                        <input type="password" name="password" id="password" required>
                    </div>
                    <button type="submit" name="register">Login</button>
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