<?php

class UserController {

    function login(){

        $userModel = new UserModel();
        $errors = [];

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = sanitizeOutput($_POST["email"]);
            $password = sanitizeOutput($_POST["password"]);

            $user = $userModel->getUserLogin($email,$password);

            if(  $email == "" && $password == ""){
                array_push($errors,"Email or password cannot be empty");
            }

            if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                array_push($errors,"Invalid Email");
            }

            if(!$user){
                array_push($errors,"Unauthorized Method");
            } 
            
            if(!$errors){
                $this->setSession($user['id'],$user['name']);


                header('Location: routes.php?operation=homepage');
                return;
            }


        }else{
            array_push($errors,"Unauthorized Method");
        }        

        $errorQuery = http_build_query(['errors' => $errors]);
        header('Location: index.php?'. $errorQuery);

        return;
    }

    function register(){

        $userModel = new UserModel();
        $errors = [];

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = sanitizeOutput($_POST["name"]);
            $email = sanitizeOutput($_POST["email"]);
            $password = sanitizeOutput($_POST["password"]);
            $confirm_password = sanitizeOutput($_POST["confirm_password"]);
            $exists = $userModel->isEmailValid( $email );

            if($name == "" || $email == ""  || $password == "" || $confirm_password== ""){
                array_push($errors,"Cannot have empty fields");

            }
            if($confirm_password != $password){
                array_push($errors,"Passwords do not match");

            }
            if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                array_push($errors,"Invalid email");

            }
            if($exists){
                array_push($errors,"Email already used");

            }
            if(!$errors){
                $userModel->insertUser($name, $email, $password);
                header('Location: index.php');
                return;
            }


        }else{
            array_push($errors,"Unauthorized Method");
        }  

        $errorQuery = http_build_query(['errors' => $errors]);
        header('Location: register.php?'. $errorQuery);
    }

    function setSession($id, $name){
        session_start();

        $_SESSION['id'] = $id;
        $_SESSION['name'] =$name;

        return;
    }

    function endSession(){
        session_unset();
        
        header('Location: index.php');
        return;
    }
}