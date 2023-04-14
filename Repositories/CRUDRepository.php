<?php

class CRUDRepository
{
    /**
     * @var $db mysqli
     *
     */
    protected $db;
    protected $table;
    protected $columns;



    public function create($data)
    {
        $columns = implode(',', $this->columns);
        $data = implode("','", $data);
        return $this->db->query("INSERT INTO {$this->table} ({$columns}) VALUES ('{$data}')");
    }

    public function update($id, $data)
    {
        $columns = '';
        $loop = 0;
        foreach ($data as $key => $value) {
            $columns .= "{$key} = '{$value}'";
            if ($loop == count($data) - 1) {
                $columns .= ' ';
            } else {
                $columns .= ', ';
            }
            $loop++;
        }
        return $this->db->query("UPDATE {$this->table} SET {$columns} WHERE id = {$id}");

    }

    public function delete($id)
    {
        return $this->db->query("DELETE FROM {$this->table} WHERE id = {$id}");
    }

    public function find($id, $columns = ['*'])
    {
        $columns = implode(',', $columns);
        return $this->db->query("SELECT {$columns} FROM {$this->table} WHERE id = {$id}")->fetch_assoc();
    }

    public function findWhere($columns = '*', $wheres = [])
    {
        $conditions = '';
        $loop = 0;
        foreach ($wheres as $key=>$where) {
            if (is_array($where)) {
               [$column, $operator, $value] = $where;
               $conditions .= "{$column} {$operator} {$value}";
               // last loop
               if ($loop == count($wheres) - 1) {
                   $conditions .= ' ';
               } else {
                   $conditions .= ' AND ';
               }
            }
            else{
                $conditions .= $key.' = '."'{$where}'";
                if ($loop == count($wheres) - 1) {
                    $conditions .= ' ';
                } else {
                    $conditions .= ' AND ';
                }
            }
            $loop++;
        }
    $columns = implode(',', $columns);
        return $this->db->query("SELECT {$columns} FROM {$this->table} WHERE {$conditions}")->fetch_all(MYSQLI_ASSOC);
    }

}