<?php 

require 'config.php';

if ($_POST) {

    $title = $_POST['title'];
    $desc = $_POST['description'];
    $id = $_POST['id'];

    $pdostatement = $pdo->prepare("UPDATE todo SET title='$title',description='$desc' WHERE id='$id'");
    $result = $pdostatement->execute();

    if($result) {
        echo "<script>alert('New ToDo is Added');window.location.href='index.php';</script>";
    }

}else{

    $pdostatement = $pdo->prepare("SELECT * FROM todo WHERE id=".$_GET['id']);
    $pdostatement->execute();
    $result = $pdostatement->fetchAll();

  
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">

</head>
<body>
    <div class="col">
        <div class="row">
            <div class="card ">
                <div class="card-body">
                    <h2 class="d-flex justify-content-center">Edit Page</h2>
                    <hr>
                  <form action=""  method="post" class="form-control" >
                  <input type="hidden" value="<?= $result[0]['id'] ?>" name="id">
                  <div class="mb-3">
                    <label  class="form-label">Title</label>
                    <input type="text" class="form-control" name="title"  placeholder="name@example.com" value="<?= $result[0]['title'] ?>" >
                </div>
                <div class="mb-3">
                    <label  class="form-label">Description</label>
                    <textarea class="form-control" name="description"  rows="3" ><?= $result[0]['description'] ?></textarea>
                </div>
                <div>
                
                <a href="index.php" class="btn btn-warning">Back</a>
                <input  class="btn btn-primary" type="submit" value="Update">
                </div>
                  </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>