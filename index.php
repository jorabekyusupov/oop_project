<?php
include "./Repositories/UserRepository.php";
$users = new  UserRepository();
$getAllUsers = $users->getAll();
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
<div class="container">
    <ul class="nav justify-content-center">
        <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="create.php">Create</a>
        </li>

    </ul>
</div>
<div class="container">
    <table class="table table-bordered">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">First</th>
            <th scope="col">Last</th>
            <th scope="col">age</th>
            <th scope="col">Handle</th>

        </tr>
        </thead>
        <tbody>
        <?php foreach ($getAllUsers as $user) {?>
        <tr>
            <th scope="row"><?= $user['id']?></th>
            <td><?= $user['name']?></td>
            <td><?= $user['email']?></td>
            <td><?= $user['age']?></td>
            <td>
                <a href="edit.php?id=<?= $user['id']?>" class="btn btn-primary">Edit</a>
                <a href="delete.php?id=<?= $user['id']?>" class="btn btn-danger">Delete</a>
            </td>
        </tr>
        <?php }?>
        </tbody>
    </table>
</div>
</body>
</html>
