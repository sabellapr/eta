<?php

require 'koneksi.php';

if( isset($_POST["login"])){
    if(registrasi($_POST) > 0){
        header("location:homeuser.php");
    }else{
        echo "<script>
            alert('Registrasi Gagal');
            document.location.href - 'login.php';
            </script>
            ";
    }
}
 
?>


<html>
    <head>
        <style>
             @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap');

* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: 'Poppins', sans-serif
}

body {
    background: #ecf0f3
}

.wrapper {
    max-width: 350px;
    min-height: 500px;
    margin: 80px auto;
    padding: 40px 30px 30px 30px;
    background-color: #ecf0f3;
    border-radius: 15px;
    box-shadow: 13px 13px 20px #cbced1, -13px -13px 20px #fff
}
.logo {
     width: 80px;
     margin: auto
 }

 .logo img {
     width: 100%;
     height: 80px;
     object-fit: cover;
     border-radius: 50%;
     box-shadow: 0px 0px 3px #5f5f5f, 0px 0px 0px 5px #ecf0f3, 8px 8px 15px #a7aaa7, -8px -8px 15px #fff
 }

 .wrapper .name {
     font-weight: 600;
     font-size: 1.4rem;
     letter-spacing: 1.3px;
     padding-left: 10px;
     color: #555
 }

 .wrapper .form-field input {
     width: 100%;
     display: block;
     border: none;
     outline: none;
     background: none;
     font-size: 1.2rem;
     color: #666;
     padding: 10px 15px 10px 10px
 }

 .wrapper .form-field {
     padding-left: 10px;
     margin-bottom: 20px;
     border-radius: 20px;
     box-shadow: inset 8px 8px 8px #cbced1, inset -8px -8px 8px #fff
 }

 .wrapper .form-field .fas {
     color: #555
 }

 .wrapper .btn {
     box-shadow: none;
     width: 100%;
     height: 40px;
     background-color: #03A9F4;
     color: #fff;
     border-radius: 25px;
     box-shadow: 3px 3px 3px #b1b1b1, -3px -3px 3px #fff;
     letter-spacing: 1.3px
 }

 .wrapper .btn:hover {
     background-color: #039BE5
 }

 .wrapper a {
     text-decoration: none;
     font-size: 0.8rem;
     color: #03A9F4
 }

 .wrapper a:hover {
     color: #039BE5
 }

 @media(max-width: 380px) {
     .wrapper {
         margin: 30px 20px;
         padding: 40px 15px 15px 15px
     }
 }
        </style>
        <title>Login eTa</title>
    </head>
<body>
    <div class="wrapper">
        <div class="logo"> <img src="data:image/png;base64,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" alt=""> </div>
        <br>
        <form class="p-3 mt-3" method= "post">
            <div class="form-field d-flex align-items-center"> <span class="far fa-user"></span> <input type="text" name="email" id="email" placeholder="Email"> </div>
            <div class="form-field d-flex align-items-center"> <span class="fas fa-key"></span> <input type="password" name="password" id="pwd" placeholder="Password"> </div> 
            <button class="btn mt-3" name="login" id="login"> Login</button>
        </form>
        <div class="text-center fs-6"> <a href="homeuser.php">Forget password?</a> or <a href="signup.php">Sign up</a> </div>
    </div>

</body>
</html>