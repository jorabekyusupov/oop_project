<?php
include './Repositories/Company.php';
$company = new Company();

//$user->create(['Jorabe', 'kemail', 'apassword', 23]);
//$user->update(2, ['name' => 'Jorabek', 'email' => 'j.a.y', 'password'=>'asdasd', 'age'=>'12']);
//var_dump($user->find(1));
//var_dump($user->findWhere(
//    ['name', 'email'],
//    [
//        ['id', '>=', 1],
//        ['id', '<', 6],
//        'name' => 'Jorabek'
//    ]
//));
$company->create(['Jorabek']);