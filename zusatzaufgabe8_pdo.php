<?php

$sql = <<<SQL
create table if not exists name
(
    name char(255) not null
);
create unique index if not exists name_uindex on name (name);
SQL;

try {
    $pdo = new PDO('sqlite:zusatzaufgabe8.db');
    $pdo->exec($sql);
} catch (PDOException $e) {
    die('Database Error');
}

function insertName(PDO $pdo, string $name): void
{
    $statement = $pdo->prepare('INSERT INTO name (name) values(:name)');
    $statement->execute(['name' => $name]);
}

try {
    $pdo->beginTransaction();
    insertName($pdo, 'Martin');
    insertName($pdo, 'Nikolas');
    insertName($pdo, 'Tom');
    $pdo->commit();
} catch (PDOException $e) {
    print('<pre>');
    print_r($e);
    print('</pre>');
    $pdo->rollBack();
}

// ACID = Atomicity, Consistency, Isolation und Durability
