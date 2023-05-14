<?php 
    define('MYSQL_HOST', 'localhost');
    define('MYSQL_USER', 'root');
    define('MYSQL_PASSWORD', '');
    define('MYSQL_DB_NAME', 'tasklist');

    try {
        $pdo = new PDO ('mysql:host='.MYSQL_HOST.';dbname='.MYSQL_DB_NAME, MYSQL_USER, MYSQL_PASSWORD);
        $pdo->exec("SET CHARACTER SET utf8");
        
    } catch (PDOException $e) {
        
        echo"Erro ao conectar ao BD: ". $e->getMessage();
        exit();
    }


?>
