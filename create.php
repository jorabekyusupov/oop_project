<?php
if (isset($_REQUEST['create_user']) && $_REQUEST['create_user'] ) {
    unset($_REQUEST['create_user']);
    include './Repositories/UserRepository.php';
    $user = new UserRepository();
//    $data = [
//        'name' => $_REQUEST['name'],
//        'email' => $_REQUEST['email'],
//        'password' => $_REQUEST['password'],
//        'age' => $_REQUEST['age'],
//        'photo' => $_REQUEST['photo']
//    ];
    $user->create($_REQUEST, true, 'photo');
    header('Location: index.php');
}
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
            <a class="nav-link active" aria-current="page" href="index.php">Go back</a>
        </li>

    </ul>
</div>
<div class="container">
    <form action="create.php" method="post" enctype="multipart/form-data">
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input class="form-control"  type="text" name="name" id="name">
        </div>
        <div class="mb-3">
            <label for="Email" class="form-label">Email</label>
            <input class="form-control" type="text" name="email" id="Email">
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">password</label>
            <input class="form-control" type="text" name="password" id="password">
        </div>
        <div class="mb-3">
            <label for="age" class="form-label">age</label>
            <input  class="form-control" type="number" name="age" id="age">
        </div>
        <div>
            <label for="formFileLg" class="form-label">File</label>
            <input class="form-control" id="formFileLg" name="photo" type="file">
        </div>
        <button type="submit" class="btn btn-primary" name="create_user" value="1">Submit</button>
    </form>
</div>
</body>
</html>
