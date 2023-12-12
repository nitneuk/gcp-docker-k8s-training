<?php

$data = ['Movies:' => []];

try {
    $pdo = new \PDO(
        dsn: 'pgsql:host=localhost;port=5432;dbname=movie_store;',
        username: 'enigma',
        password: 'password',
        options: [\PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION]
    );
} catch (\PDOException $e) {
    echo $e->getMessage();
}

foreach ($pdo->query('SELECT * FROM movies') as $row) {
    $data['Movies:'][] = $row['name'];
}

print_r($data);
