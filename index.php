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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

</head>
<body>
    <div class="wrapper">
        <div class="logo">
            <img src="https://www.freepnglogos.com/uploads/logo-chatgpt-png/chatgpt-brand-logo-transparent.png" alt="LogoLangz">
        </div>
        <div class="text-center mt-4 name">
            Generic Website
        </div>
        <form class="p-3 mt-3" action="routes.php?operation=login" method="POST">
            <div class="form-field d-flex align-items-center">
                <span class="far fa-user"></span>
                <input type="text" name="email" id="email" placeholder="Email">
            </div>
            <div class="form-field d-flex align-items-center">
                <span class="fas fa-key"></span>
                <input type="password" name="password" id="pwd" placeholder="Password">
            </div>
            <button class="btn mt-3">Login</button>
        </form>
        <div class="text-center fs-6">
            <a href="register.php">Sign up here!</a>
        </div>
        <?php require_once("views/view_error.php");?>
    </div>
</body>
</html>
