<?php

include_once 'settings.php';

class Crud extends Settings
{
    public function create(array $datas)
    {
        $tmpAttributs = $this->attributs;
        array_unshift($datas, null);
        $prepAttributs = Params::magic($tmpAttributs, false);
        $reqAttributs = Params::magic($tmpAttributs, true);

        $save = function () use ($tmpAttributs, $prepAttributs, $reqAttributs, $datas) {

            $request = $this->connection()->prepare("INSERT INTO {$this->table} ($prepAttributs) VALUES ($reqAttributs)");
            return $request->execute(Params::request($tmpAttributs, $datas));
        };

        return $save();
    }
}
