<?php

/**
 * Created by PhpStorm.
 * User: tricoman
 * Date: 1/11/16
 * Time: 20:23
 */
include_once "DB_adapter.php";
include_once "Query.php";

class PrizeQuery extends Query {

    private $adapter;
    protected $connection;

    public function __construct() {
        $this->adapter = new DB_adapter();

        $this->connection = $this->adapter->getConnection();

    }


    public function getCustomEntries(array $fields, array $filtersFields, array $filtersArguments) {

        $sql = $this->buildQuery('PRIZE', $fields, $filtersFields, $filtersArguments);

        $result = $this->getArraySQL($sql, $this->connection);

        $this->adapter->closeConnection();

        return $result;
    }

    public function getParseEntries() {
        $sql = "SELECT idPRIZE, name FROM PRIZE;";

        $result = $this->getArraySQL($sql);

        $this->adapter->closeConnection();

        return $result;
    }

    public function getAllEntries() {
        $sql = "SELECT * FROM TOURNAMENT_HOST;";

        $result = $this->getArraySQL($sql);

        $this->adapter->closeConnection();

        return $result;
    }

}