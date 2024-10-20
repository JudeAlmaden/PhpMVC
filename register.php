<?php
    session_start();
    require_once('models/connect.php');

    if(isset($_SESSION['id'])){
        header('Location: routes.php?operation=homepage');
    }
?>


<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="style.css">
    <script src="script.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <div class="wrapper register">
        <div class="logo">
            <img src="https://www.freepnglogos.com/uploads/logo-chatgpt-png/chatgpt-brand-logo-transparent.png" alt="LogoLangz">
        </div>
        <div class="text-center mt-4 name">
            Generic Website
        </div>
        <form class="p-3 mt-3"  action="routes.php?operation=register" method="POST" autocomplete="off">
            <div class="form-field d-flex align-items-center">
                <span class="far fa-user"></span>
                <input type="text" name="name" id="name" placeholder="Name" autocomplete="false" >
            </div>
            <div class="form-field d-flex align-items-center">
                <span class="far fa-user"></span>
                <input type="text" name="email" id="email" placeholder="Email" autocomplete="false" >
            </div>
            <div class="form-field d-flex align-items-center">
                <span class="fas fa-key"></span>
                <input type="password" name="password" id="pwd" placeholder="Password" autocomplete="false" >
            </div>
            <div class="form-field d-flex align-items-center">
                <span class="far fa-user"></span>
                <input type="password" name="confirm_password" placeholder="Confirm Password" autocomplete="false" >
            </div>
            <button class="btn mt-3" id="register-btn">Register</button>
        </form>
        <div class="text-center fs-6">
            <div style="font-size: small; display: inline-block;">Already have an account? </div><a href="index.php"> Sign in</a>
        </div>
    </div>
    <?php require_once("views/view_error.php");?>
</body>
</html>


<!-- 
<script>
    const inputFields = document.querySelectorAll('input');
    const submitButton = document.getElementById('register-btn');

    submitButton.disabled=true;
    inputFields.forEach(input => {
        input.addEventListener('input', checkInputs);
    });

    function checkInputs(){
        let allFilled = true;

        inputFields.forEach(input => {
            if (input.value === '') {
                allFilled = false;
            }

            if(allFilled && validatePassword()){
                submitButton.disabled=false;
            }else{
                submitButton.disabled=true;
            }
        });
    }

    function validatePassword() {
        const password = document.getElementById("pwd").value.trim();
        const passwordConfirm = document.getElementById("pwd-confirm").value.trim();

        if(password !== passwordConfirm) {
            return false;
        }else{
            return true;
        }
    }
    </script> -->