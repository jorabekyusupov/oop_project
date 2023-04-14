<?php
include './Repositories/CRUDRepository.php';
include './Database/Connection.php';
class Company extends CRUDRepository
{
    public function __construct()
    {
        $this->db = (new  Connection())->getConnection();
        $this->table = 'companies';
        $this->columns = ['name'];
    }

}