
<?php
    session_start();
    require_once('models/connect.php');
    require_once('Controllers/ToDo_Controller.php');
    require_once('Models/ToDo_model.php');
    
    if(!isset($_SESSION['id'])){
      header('Location: index.php?errors=' . urlencode('You Have Been Logged Out'));
    } else{
      $ToDo_Controller = new ToDoController;
      $ToDo_Controller->getTasks();
    }
?>
<!DOCTYPE html>
<html>
<head>
    <script src="script.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>

<form class="position-fixed" style="top: 20px; right: 20px;"  action="routes.php" method="GET">                
    <div class="col-12">
        <button type="submit" value="logout" name="operation" data-mdb-button-init data-mdb-ripple-init class="btn btn-danger">Logout</button>
    </div>
</form>

<section class="vh-100" style="background-color: #eee;">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col col-lg-9 col-xl-7">
        <div class="card rounded-3">
          <div class="card-body p-4">

            <h4 class="text-center  pb-3">
                <?php echo($_SESSION['name'])?>'s To do List
            </h4>

            <hr>

            <form class="row g-1 justify-content-center align-items-center mb-4 pb-2 px-2" method="POST" action="routes.php?operation=insertTask">                
                <div class="col-2">Add New:</div>
                <div class="col-8 "> <!-- Change this to col-md-6 for wider input -->
                    <div data-mdb-input-init class="form-outline col-12">
                        <input type="text" name="description" id="task" class="form-control" placeholder="Enter task here" required>
                    </div>
                </div>
                <div class="col-2">
                    <button type="submit" data-mdb-button-init data-mdb-ripple-init class="btn btn-primary">Save</button>
                </div>
            </form>

            <table class="table mb-4 col-12 g-1">
              <thead style>
                <tr>
                    <th scope="col" width="10%">No.</th>
                    <th scope="col" width="45%">Todo item</th>
                    <th scope="col" width="10%">Status</th>
                    <th scope="col" width="35%" class="text-center">Actions</th>
                </tr>
              </thead>
              <tbody>
                <?php require_once("views/view_to_do_items.php")?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
</body>
</html>
