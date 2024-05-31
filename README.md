# Overview
---

open-crud is an open-source package created in native PHP that simplifies connecting to MySQL databases and makes it easier to manage databases using object-oriented programming.

**Some challenges :**
- How to connect my app to the database?
- How to make CRUD easier to use?

In this documentation, we want to explain you how OpenCRUD package can be connected to your application and use different operations to manage your datas from a mySql database. 

# Installation
---

1. **Requirements**

  - Be sure to have a PHP version that is up to date.
  - You might know object-oriented programming, or you might not.
    
2. **Connection**

- [Download](https://github.com/ElieRu/OpenCRUD/archive/refs/heads/main.zip) and insert the package in your project.
- Create the mySQL database.
- Initialise your database informations in the `/database/db-infos.php` file.
- Link the `init.php` in the file that you need to instantiate OpenCRUD.
  
  Note : By default, you need to initialise the `$dbname` variable only.

  MySql rules : Your table's attributes will have the `null` value by default. Except the primary key.

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
=> The $values param should be an array
ex. $values = ['john', 'doe']
```

  Note : The `fields` param can be initialize by `'*'` to return all datas.
- `array $values` must get values of the attributes in the condition.
  Note : The initialisation of this variable require a **prepared statement.**
- `array|int $limit` select datas. Else, you can use an array.

```
# Select only 5 datas
$limit = 5

# Select by the 5th to 10th data
$limit = [5, 10]
```

## Update

The update operation refers to actions that modify existing data within a database or storage system. It allows you to change specific values or attributes of a record without deleting and recreating it entirely.
  
```
# Update users data
$users->update($id, $formData);
```

The required params :

  - `int $id` select the specific data to update.
  - `array $formDatas` contain new informations of a data.
  
  Note : The `array $formData` should have the values of attributes of the table.

## Delete

The Delete operation refers to the functionality that allows you to remove data from a database or storage system. It's the process of permanently erasing a specific record or set of records based on certain criteria.

```
# Remove a user data
$users->delete($id);
```

The required param :
  
  - With the `int $id` param, you can select the data.
