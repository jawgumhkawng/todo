<?php 
require 'config.php';



if ($_POST) {
    
    $title = $_POST['title'];
    $desc = $_POST['description'];

    $sql = "INSERT INTO todo(title,description) VALUES (:title,:description)";
    $pdostatement = $pdo->prepare($sql);
    $result = $pdostatement->execute(
        array(
            ':title'=>$title,
            ':description'=>$desc
        )
    );

    if($result) {
        echo "<script>alert('New ToDo is Added');window.location.href='index.php';</script>";
    }

}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">

</head>
<body>
    <div class="col">
        <div class="row">
            <div class="card ">
                <div class="card-body">
                    <h2 class="d-flex justify-content-center">Create New Todo</h2>
                    <hr>
                  <form action="add.php" method="post" class="form-control">
                  <div class="mb-3">
                    <label  class="form-label">Title</label>
                    <input type="text" class="form-control" name="title"  placeholder="name@example.com" required>
                </div>
                <div class="mb-3">
                    <label  class="form-label">Description</label>
                    <textarea class="form-control" name="description"  rows="3" required></textarea>
                </div>
                <div>
                
                <a href="index.php" class="btn btn-warning">Back</a>
                <input  class="btn btn-primary" type="submit" value="Submit">
                </div>
                  </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>