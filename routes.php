<?php
require_once("Controllers/User_Controller.php");
require_once("Controllers/ToDo_Controller.php");
require_once("Models/User_Model.php");
require_once("Models/ToDo_Model.php");
require_once("utils/sanitize.php");

session_start();

$userControl = new UserController;
$ToDo_Controller = new ToDoController;

if (isset($_GET['operation']) && $_GET['operation'] === 'login' && $_SERVER['REQUEST_METHOD'] === 'POST') {
    $userControl->login();
}

if (isset($_GET['operation']) && $_GET['operation'] === 'register' && $_SERVER['REQUEST_METHOD'] === 'POST') {
    $userControl->register();
}

if (isset($_GET['operation']) && $_GET['operation'] === 'logout') {
    $userControl->endSession();
}

if (isset($_GET['operation']) && $_GET['operation'] === 'homepage') {
    header('Location: homepage.php');
}


if (isset($_GET['operation']) && $_GET['operation'] === 'insertTask') {
    $ToDo_Controller->insertTask();
    header('Location: routes.php?operation=homepage');
}

if (isset($_GET['operation']) && $_GET['operation'] === 'updateTask') {
    $ToDo_Controller->updateTask();
    header('Location: routes.php?operation=homepage');
}

if (isset($_GET['operation']) && $_GET['operation'] === 'changeTaskStatus') {
    $ToDo_Controller->changeTaskStatus();
    header('Location: routes.php?operation=homepage');
}

if (isset($_GET['operation']) && $_GET['operation'] === 'deleteTask') {
    $ToDo_Controller->deleteTask();
    header('Location: routes.php?operation=homepage');
}


// echo($_GET['operation']);