# Introduction
---

**Hey!**
- Are you use native PHP programming?
- Does it often make it difficult for you to connect to the database? or
- Isn't it tiring to rewrite the same code every time to manipulate your database data?
- OpenCRUD is an open source package built in PHP to facilitate the connection on mySQL database and makes the CRUD very easy.

So, what is the problem?
The difficulty of connecting to a MySQL server.
The problem arises with the often complex rewriting of code, which is a waste of time when working on a big or a complex projects.
In this tutorial, we want to explain you how OpenCRUD can be installed and used in your different projects to help your to the development of your programs very easily.

# Installation
---

1. **Requirements**

  - Be free with the Object Oriented Programming.
  - Be sure to have a PHP version that is up to date.
    
2. **Installation**

- [Download](https://github.com/ElieRu/OpenCRUD/archive/refs/heads/main.zip) and insert the package in your project.
- Create the mySQL database.
- Initialise your database informations in the `/database/db-infos.php` file.
- Link the `init.php` in the file that you need to instantiate OpenCRUD.
  Note : By default, you need to initialise the `$dbname` variable only.

3. **Instanciation**

To interact with databases using OpenCrud, you create an object instance. This object acts as a representation of one or more database tables, and it provides methods for performing CRUD operations (Create, Read, Update, and Delete) on the table data.

```
# I instantiate the users table
$users = new Crud($users, $attributes, $type);
```

The required params :

- `array $tables` is specify the table(s) that we need to use.
- `array $attributes` will have access to the table's attributes and to the foreigner key(s) also if necessary.
- `bool $type` return a row of values in case of false value. Else, it returns a row of objects values.

# Getting started

## Create

The create operation allow you to save datas by calling the create method of the instantiated object.

```
# The save a data
$users->create($formData);
```
The create method requires an array of data to be saved, excluding the primary key. However, it accepts foreign keys for establishing relationships with other data entities.

## Read

The read operation retrieves datas from the database and display them to the user interface. The read operation can handle different parameters as needed. To improve code organization and readability, it's recommended to assign the read method to a variable.

```
# I get datas
$getDatas = $users->read($fields, $condition, $values, $limit);
```

The required params :

- `array|null $fields` select attribute(s) of the table instatiated.
- Sort datas with the `string|null $condition` if necessary.
```
# Query statement
$condition="name='john' and postname='doe'"
=> The $values param should have null value

# Prepared statement
$condition="name=? and postname=?"
=> The $values param should be an array with name and postname values
ex. $values = ['john', 'doe']
```
- `array $values` must get values of the attributes in the condition.
  Note : The initialisation of this variable require a **prepared statement.**
- `array|int $limit`

Note : The fields parameter allows selecting all table attributes if set to `null` or `'*'`.

## Update

```
# Update datas
$users->update($id, $datas);
```

The required params :

  - `int $id`
  - `array $datas`

## Delete

```
# Delete datas
$users->delete($id);
```
The required param :
  
  - `int $id`
