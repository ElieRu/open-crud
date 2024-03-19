<?php

include_once 'settings/params.php';

class Settings extends implement
{
    public $table;
    public $attributs;
    public $type;
    public $id;


    public function __construct(array $table, array $attributs, bool $type)
    {
        $this->table = Params::magic($table, false);
        $this->attributs = $attributs;
        $this->id = array_shift($attributs);
        $this->type = $type == false ? PDO::FETCH_ASSOC : PDO::FETCH_OBJ;
    }
}
