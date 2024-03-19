<?php

class Params

{

    public static function magic(array $table, bool $prepReq, bool $prepUpdate = false)
    {
        $strTab = [];
        $strTabUp = [];

        foreach ($table as $key => $value) {
            $strTab[] = $prepReq == false && $prepUpdate == false ? $value . ',' : ':' . $value . ',';
            $strTabUp[] = $prepUpdate == true ? $value . '=:' . $value . ',' : false;
        }

        return $prepUpdate == true ? substr(implode($strTabUp), 0, -1) : substr(implode($strTab), 0, -1);
    }


    public static function request(array $attributs, array $datas): array
    {
        $formData = [];

        foreach ($attributs as $key => $attr) {
            $formData[$attributs[$key]] = $datas[$key];
        }

        return $formData;
    }
}
