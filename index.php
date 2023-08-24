<?php
require 'config.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>index page</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
 
<style>
    *{
        margin: 0;
        padding: 0;
    }
</style>
</head>
<body >
<?php 
 $pdostatement = $pdo->prepare("SELECT * FROM todo ORDER BY  id DESC");
 $pdostatement->execute();
 $result = $pdostatement->fetchAll();

?>

<div class="col ">
    <div class="row">
     <div class="card d-flex justify-content-center">
        <div class="card-body">
        <table class="table table-dark table-hover">
            <h2 class="d-flex justify-content-center">TO DO Home Page</h2>
            <hr>
           <span class="d-block"> <a href="add.php" class="btn btn-success">Create New +</a></span>
            <br>
            <thead>
                <tr>
                <th scope="col">#ID</th>
                <th scope="col">Title</th>
                <th scope="col">Description</th>
                <th scope="col">Create_at</th>
                <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1; ?>
                <?php if ($result)  : ?>
                    <?php foreach ($result as $value) : ?>

                        <tr>
                            <th><?= $i ?></th>
                            <td><?= $value['title'] ?></td>
                            <td><?= $value['description'] ?></td>
                            <td><?= date('Y-m-d',strtotime($value['created_at'])) ?></td>
                            <td>
                                <a type="button" class="btn btn-warning text-white" href="edit.php?id=<?= $value['id'] ?>">Edit</a> 
                                <a type="button" class="btn btn-danger" href="delete.php?id=<?= $value['id'] ?>">Delete</a>
                            </td>
                        </tr>  

                        <?php $i++; ?>
                  <?php endforeach ?>
                <?php endif ?>
            </tbody>
            </table>
        </div>
     </div>
    </div>
</div>
    

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>

</body>
</html>