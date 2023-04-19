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

    public function fileUpload($file_name)
    {
        $files = $_FILES[$file_name];
        $file_name = $files['name'];
        $format = pathinfo($file_name, PATHINFO_EXTENSION); // jorabek.jpg => jpg
        $newNameFile = uniqid('', true) . '.' . $format; /// new name for file / d34sa2323.jpg
        $path = './assets/images/' . $newNameFile;
        move_uploaded_file($files['tmp_name'], $path);
        return $newNameFile;
    }

    public function create($data, $file = false, $file_name = 'file')
    {
        if ($file) {
            $data[$file_name] = $this->fileUpload($file_name);
        }
        $columns = implode(',', $this->columns);
        $data = implode("','", $data);
        $this->db->query("INSERT INTO {$this->table} ({$columns}) VALUES ('{$data}')");
        if ($this->db->error) {
            return $this->db->error;
        }
        return true;
    }

    public function update($id, $data, $file = false, $file_name = 'file', $old_file = 'old_file')
    {
        if ($file) {
            if ($_FILES[$file_name]['name'] != $old_file) {
                if (file_exists('./assets/images/' . $old_file)) {
                    unlink('./assets/images/' . $old_file);
                }
                $data[$file_name] = $this->fileUpload($file_name);
            }
        }
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
        $this->db->query("UPDATE {$this->table} SET {$columns} WHERE id = {$id}");
        if ($this->db->error) {
            return $this->db->error;
        }
        return true;

    }

    public function delete($id, $file = false, $file_name = '')
    {
        if ($file) {
            if (file_exists('./assets/images/' . $file_name)) {
                unlink('./assets/images/' . $file_name);
            }
        }

        return $this->db->query("DELETE FROM {$this->table} WHERE id = {$id}");
    }

    public function find($id, $columns = ['*'])
    {
        $columns = implode(',', $columns);
        return $this->db->query("SELECT {$columns} FROM {$this->table} WHERE id = {$id}")->fetch_assoc();
    }

    public function findWhere($columns = ['*'], $wheres = [])
    {
        $conditions = '';
        $loop = 0;
        foreach ($wheres as $key => $where) {
            if (is_array($where)) {
                [$column, $operator, $value] = $where;
                $conditions .= "{$column} {$operator} {$value}";
                // last loop
                if ($loop == count($wheres) - 1) {
                    $conditions .= ' ';
                } else {
                    $conditions .= ' AND ';
                }
            } else {
                $conditions .= $key . ' = ' . "'{$where}'";
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

    public function getAll($columns = ['*'])
    {
        $columns = implode(',', $columns);
        return $this->db->query("SELECT {$columns} FROM {$this->table}")->fetch_all(MYSQLI_ASSOC);
    }
}