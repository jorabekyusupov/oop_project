<?php
if (isset($_REQUEST['id']) && $_REQUEST['id']) {
    include './Repositories/UserRepository.php';
    $user = new UserRepository();
    $userModel = $user->find($_REQUEST['id']);
    if ($userModel) {
        $user->delete($_REQUEST['id'], true, $userModel['photo']);
    }
    header('Location: index.php');
}
