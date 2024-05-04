<?php

include_once 'settings.php';

class Crud extends Settings
{
    public function create(array $formData)
    {
        $tmpAttributs = $this->attributs;
        
        array_unshift($formData, null);
        
        $prepAttributs = Params::magic($tmpAttributs, false);
        $reqAttributs = Params::magic($tmpAttributs, true);

        $save = function () use ($tmpAttributs, $prepAttributs, $reqAttributs, $formData) {
            $request = $this->connection()->prepare("INSERT INTO {$this->table} ($prepAttributs) VALUES ($reqAttributs)");
            return $request->execute(Params::request($tmpAttributs, $formData));
        };

        return $save();
    }

    public function read(array $fields = null, string $condition = null, array $values = null, $limit = null)
    {

        $fields = (isset($fields) && !empty($fields)) ? Params::magic($fields, false) : '*';
        $condition = isset($condition) ? $condition : '1';
        $lmt = (gettype($limit) === 'integer') ? $limit : 10;
        $limit = (gettype($limit) === 'array') ? Params::magic($limit, false) : $lmt;

        $type = function (object $all_datas) {
            $listDatas = [];
            $tmp = [];

            while ($datas = $all_datas->fetch($this->type)) {
                $listDatas[] = $datas;
            }

            return $tmp = !empty($listDatas) ? $listDatas : "empty";
        };

        $display = function () use ($values, $fields, $type, $condition, $limit) {
            
            if (isset($values)) {
                $prepare = $this->connection()->prepare("SELECT {$fields} FROM {$this->table} WHERE {$condition} limit {$limit}");
                $prepare->execute($values);
                return $type($prepare);
            } else {
                $query = $this->connection()->query("SELECT {$fields} FROM {$this->table} WHERE {$condition} LIMIT {$limit}");
                return $type($query);
                // condition and value
            }
        };

        return $display();
    }

    public function update(int $id, array $formData)
    {
        $attributs = $this->attributs;
        array_shift($attributs);
        array_push($attributs, $this->id);
        array_push($formData, $id);
        $reqUp = Params::magic($attributs, false, true);
        $condition = $this->id . '=:' . $this->id;

        $update = $this->connection()->prepare("UPDATE {$this->table} SET {$reqUp} WHERE {$condition}");
        return $update->execute(Params::request($attributs, $formData));
    }

    public function delete(int $id)
    {
        $condition = $this->id . '=:' . $this->id;
        $delete = $this->connection()->prepare("DELETE FROM {$this->table} WHERE {$condition}");
        $delete->execute([$this->id => $id]);
    }
}



