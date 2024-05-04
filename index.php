<?php

require 'init.php';

$users = new Crud(['users'], ['id', 'name', 'postname', 'age', 'birthday'], false);

// $users->create(["John", "Doe", 78, "2019-3-3"]);

// $getUsers = $users->read(null, "name=? and postname=?", ['elie', 'jean'], null);

$users->update(1, ['john', 'matadi', 12, "2019-3-3"]);

$getUsers = $users->read(null, null, null, 5);
// name='john' and postname='doe'

for ($i=0; $i < count($getUsers); $i++) { 
    echo "<ul>
            <li>{$getUsers[$i]['id']} {$getUsers[$i]['name']}</li>
        </ul>";
}


