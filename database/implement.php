<?php


class implement

{
    public static $dns;
    public static $dbname;
    public static $username;
    public static $password;

    public function __construct(string $dns, string $dbname, string $username, string $password)
    {
        implement::$dns = $dns;
        implement::$dbname = $dbname;
        implement::$username = $username;
        implement::$password = $password;
    }


    public function connection()
    {
        return new PDO("mysql:host=".implement::$dns."; dbname=".implement::$dbname."", implement::$username, implement::$password);
    }
}
