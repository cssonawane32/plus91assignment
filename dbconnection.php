<?php
require_once "vendor/autoload.php";

//Database connection
$connectionParams = array(
    'dbname' => 'plus91assignment',
    'user' => 'root',
    'password' => '',
    'host' => 'localhost',
    'driver' => 'pdo_mysql',
);

$conn = \Doctrine\DBAL\DriverManager::getConnection($connectionParams);

//Create querybuilder
$queryBuilder = $conn->createQueryBuilder();

//Create Schema
$schemaManager = $conn->getSchemaManager();
$schema = $schemaManager->createSchema();

//Create Patient Table
if (!$schema->hasTable('patients')) {

    $patients = $schema->createTable("patients");

    /* Add some columns to the table */
    $id = $patients->addColumn("id", "integer", array("unsigned" => true));
    $patients->addColumn("name", "string", array("length" => 100));
    $patients->addColumn("age", "integer", array("length" => 5));
    $patients->addColumn("city", "string", array("length" => 50));
    $patients->addColumn("state", "string", array("length" => 50));
    $patients->addColumn("country", "string", array("length" => 50));
    $patients->addColumn("dob", "date", array());
    $patients->addColumn("blood_group", "string", array("length" => 5));
    $patients->addColumn("created_at", "datetime", array());
    $patients->addColumn("updated_at", "datetime", array());

    /* Add a primary key */
    $patients->setPrimaryKey(array("id"));
    $id->setAutoincrement(true);

    $sql = $schemaManager->getDatabasePlatform()->getCreateTableSQL($patients);
    $conn->query($sql[0]);
}