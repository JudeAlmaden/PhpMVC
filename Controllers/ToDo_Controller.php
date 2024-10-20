<?php

class ToDoController {

    
    function getTasks(){
        $ToDo = new ToDoModel();
        $errors = [];
        
        if(isset($_SESSION['id'])){
            $items = $ToDo->getUserTasks($_SESSION['id']);
            $_SESSION['items'] = $items;
        }
        return;
    }

    function insertTask(){
        $ToDo = new ToDoModel();
        $errors = [];

        if(isset($_SESSION['id'])){
            $ToDo->create($_SESSION['id'], $_POST['description']);
            header('Location: homepage.php');
            die();
        }
    }

    
    function updateTask(){
        $ToDo = new ToDoModel();
        $errors = [];

        $ToDo = new ToDoModel();
        $errors = [];

        $ToDo->update($_POST['id'], $_POST['description']);
        header('Location: homepage.php');
    }

    
    function changeTaskStatus(){
        $ToDo = new ToDoModel();
        $errors = [];

        $ToDo->changeStatus($_POST['id']);
        header('Location: homepage.php');
    }

    
    function deleteTask(){
        $ToDo = new ToDoModel();
        $errors = [];

        $ToDo->delete($_POST['id']);
        header('Location: homepage.php');
    }
}

