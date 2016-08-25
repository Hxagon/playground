<?php

/**
 * Gibt ein DatabaseHandle-Object zurück, mit dem Queries ausgeführt werden können
 * @return PDO
 */
function getDbHandle()
{
    $databaseHandle = null;
    try {
        $user = 'testing';
        $pass = '1234';
        $databaseHandle = new PDO('mysql:host=localhost;dbname=playground', $user, $pass);
    } catch (PDOException $exc) {
        print "Error!: " . $exc->getMessage() . "<br/>";
    }

    return $databaseHandle;
}

/**
 * @param $orderBy
 * @param $orderDirection
 * @param $filter
 * @return array
 */
function getAllTickets($orderBy, $orderDirection, $filter = array())
{
    $orderBy = validateOrderByParams($orderBy);

    $databaseHandle = getDbHandle();
    $statement = 'SELECT * FROM tickets ORDER BY ' . $orderBy . ' ' . $orderDirection;

    $query = $databaseHandle->query($statement);
    return $query->fetchAll();
}

/**
 * @param $elementsPerPage
 * @param $currentPage
 * @param $orderBy
 * @param $orderDirection
 * @return array
 */
function getViewTickets($elementsPerPage, $currentPage, $orderBy, $orderDirection)
{
    $orderBy = validateOrderByParams($orderBy);

    $databaseHandle = getDbHandle();
    $statement = 'SELECT * FROM tickets ORDER BY ' . $orderBy . ' ' . $orderDirection . ' LIMIT ' . ($elementsPerPage * ($currentPage - 1)) . ', ' . $elementsPerPage;
    $query = $databaseHandle->query($statement);
    return $query->fetchAll();
}

/**
 * @param $orderBy
 * @return string
 */
function validateOrderByParams($orderBy)
{
    $orderByFallback = 'id';

    // Mögliche Tabellen-Felder ermitteln, nach denen sortiert werden könnte
    $databaseHandle = getDbHandle();
    $query = $databaseHandle->query('SHOW COLUMNS FROM tickets');
    $tableFields = $query->fetchAll();

    $valid = false;
    foreach ($tableFields as $tableField) {
        if ($orderBy == $tableField['Field']) {
            $valid = true;
        }
    }

    if ($valid === false) {
        return $orderByFallback;
    }

    return $orderBy;
}
