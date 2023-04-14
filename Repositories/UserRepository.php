<?php

include './Repositories/CRUDRepository.php';
include './Database/Connection.php';

class UserRepository extends CRUDRepository
{
    public function __construct()
    {
        $this->db = (new  Connection())->getConnection();
        $this->table = 'users';
        $this->columns = ['name', 'email', 'password', 'age'];
    }


}