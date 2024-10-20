<?php


class ToDoModel {
    private $conn;

    function connect() {
      if ($this->conn === null) {
        require("connect.php");
        $this->conn = $conn;
      }
      return $this->conn;
    }

    function delete($id){
        try{
            $conn = $this->connect();
            //Main delete delete
            $sql = "DELETE FROM  to_do_items WHERE id = :id";
            $stmt = $conn->prepare($sql);     
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);            
            $stmt->execute();    
        } catch(PDOException $e) {
            echo "Error: " . $e->getMessage();
        }

        return;
    }


    function create($userId, $description): void{
        try{
            $conn = $this->connect();
            //Main Insert Statement
            $sql = "INSERT INTO  to_do_items (user_id,task_info) 
            VALUES(:user_id,:task_info)";

            $stmt = $conn->prepare($sql);            
            $stmt->bindParam(':user_id', $userId, PDO::PARAM_STR);
            $stmt->bindParam(':task_info', $description, PDO::PARAM_STR);

            $stmt->execute();
            return;
            
        } catch(PDOException $e) {
            echo "Error: " . $e->getMessage();
        }

        return;
    }


    function update($id,  $description){
        try {
            $conn = $this->connect();
            // Update status to 'completed'
            $sql = "UPDATE to_do_items SET task_info = :task_info WHERE id = :id";

            $stmt = $conn->prepare($sql);
          
            // Bind parameters
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->bindParam(':task_info', $description, PDO::PARAM_STR);
            
            // Execute the statement
            $stmt->execute();
            
            // Redirect after successful update
            return;
        } catch (PDOException $e) {
            // Handle errors (optional)
            echo 'Error: ' . $e->getMessage();
        }
        return;
    }


    function getUserTasks($userId){
        try {
            $conn = $this->connect();

            $sql = "SELECT * FROM to_do_items WHERE user_id = :user_id ORDER BY status ASC";
            $stmt = $conn->prepare($sql);
            $user_id = $_SESSION['id'];
            $stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
            $stmt->execute();

            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
            
            return $results ?: []; 

        } catch (PDOException $e) {
            // Handle errors (optional)
            echo 'Error: ' . $e->getMessage();
        }
        return;
    }

    
    function changeStatus($id){
        try {
            $conn = $this->connect();
            // Update status to 'completed'
            $sql = "UPDATE to_do_items SET status = :status WHERE id = :id";

            $stmt = $conn->prepare($sql);
            $status = 'Completed';
            

            // Bind parameters
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->bindParam(':status', $status, PDO::PARAM_STR);
            
            // Execute the statement
            $stmt->execute();
            return;
            
        } catch (PDOException $e) {
            // Handle errors (optional)
            echo 'Error: ' . $e->getMessage();
        }
        return;
    }
}