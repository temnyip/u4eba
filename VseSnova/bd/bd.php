<?php

class DataBase
{
    private $host;
    private $user;
    private $pass;
    private $nameDB;
    private $connection;

    function __construct($host, $user, $pass, $nameDB)
    {
        $this->host = $host;
        $this->user = $user;
        $this->pass = $pass;
        $this->nameDB = $nameDB;
        $this->openConnect();
    }

    private function openConnect()
    {
        $this->connection = mysqli_connect($this->host, $this->user, $this->pass, $this->nameDB);
    }

    private function parseForInsert($data)
    {
        $strKey = null;
        $strValue = null;
        foreach ($data as $key => $value) {
            if ($strKey != null) {
                $strKey .= ",";
            }
            if ($strValue != null) {
                $strValue .= ",";
            }
            $strKey .= "`" . $key . "`";
            $strValue .= "'" . $value . "'";
        }
        return array('keys' => $strKey, 'values' => $strValue);
    }

    function insert($tableName, $data)
    {
        $parseData = $this->parseForInsert($data);
        $query = "INSERT INTO `" . $tableName . "`(" . $parseData['keys'] . ") VALUES (" . $parseData['values'] . ")";
        mysqli_query($this->connection, $query);
    }


    function select($query)
    {
        $sqlResult = mysqli_query($this->connection, $query);
        if ($sqlResult) {
            $arrResult = null;
            foreach ($sqlResult as $row) {
                $arrResult[] = $row;
            }
            return $arrResult;
        } else
            return 0;
    }

    function query($query)
    {
        if (mysqli_query($this->connection, $query)) {
            return 1;
        } else {
            return 0;
        }
    }

}
