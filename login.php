<?php
    session_start();
    require 'koneksi.php';
    

    //cek loogin
    if(isset($_POST['login'])){
        $email = $_POST['email'];
        $password = $_POST['password'];
        $epassword = password_hash($password,PASSWORD_DEFAULT);
        //cocokin db nyari data ada apa engga
        $cekdb = mysqli_query($conn,"SELECT * FROM login WHERE email='$email' and password='$password'");
        //hitung jumlah data
        $hitung = mysqli_num_rows($cekdb);

        if($hitung>0){
            $_SESSION['log'] = 'true';
            header('location:index.php');
        } else {
            header('location:login.php');
        };
    };
    
    if(!isset($_SESSION['log'])){

    }else {
        header('location:index.php');
    }
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/login.css" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">
        <script src="js/bootstrap.bundle.min.js"></script>
        <script src="https://kit.fontawesome.com/a81368914c.js"></script>

        <title>Login</title>
    </head>

    <body>
        <div class="container">
            <div class="img">
                <img src="img/logo.png">
            </div>
            <div class="login-content">
                <form method="post">
                    <h2>Admin</h2>
                    <div class="input-div one">
                        <div class="i">
                            <i class="fa fa-user"></i>
                        </div>
                        <div class="div">
                            <h5>Email</h5>
                            <input type="text" name="email" class="input" autocomplete=off>
                        </div>
                    </div>
                    <div class="input-div pass">
                        <div class="i">
                            <i class="fa fa-lock"></i>
                        </div>
                        <div class="div">
                            <h5>Password</h5>
                            <input type="password" name="password" class="input">
                        </div>
                    </div>
                    <button type="submit" class="btn" name="login" value="Login">LOGIN</button>
                </form>
            </div>
        </div>

        <script type="text/javascript" src="js/main.js"></script>
    </body>

    </html>