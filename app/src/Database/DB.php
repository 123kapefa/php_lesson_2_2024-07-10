<?php

namespace Database;
use Models\User;
use PDO;
use PDOStatement;

class DB {
    private static DB $instance;

    private PDO $pdo;

    private function __construct () {
        $connectionString = strtr (
            '%connect%:dbname=%dbname%;host=%host%;port=%port%', [
                '%connect%' => getenv ('DATABASE_CONNECTION'),
                '%dbname%' => getenv ('DATABASE_DB'),
                '%host%' => getenv ('DATABASE_HOST'),
                '%port%' => getenv ('DATABASE_PORT'),
            ]
        );

        $this->pdo = new PDO(
            $connectionString,
            getenv ('DATABASE_USERNAME'),
            getenv ('DATABASE_PASSWORD')
        );
    }

    public static function getInstance () : self {
        if (!isset(self::$instance)) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    public function query (string $sql, array $params = []) : PDOStatement {
        $result = $this->pdo->prepare($sql);
        $result->execute($params);
        $result->setFetchMode(PDO::FETCH_ASSOC);
        return $result;
    }

    /**
     * @param string $sql
     * @param string $class
     * @return array
     */
    public function getRowByClass (string $sql, string $class) : array {
        $result = $this->pdo->query ($sql);
        $result->setFetchMode (PDO::FETCH_CLASS, $class);

        $list = [];
        foreach ($result as $item) {
            $list[] = $item;
        }

        return $list;
    }

    public function getUser (string $sql, string $class, array $params = []) : ?User {
        $result = $this->pdo->prepare($sql);
        $result->execute($params);
        $result->setFetchMode(PDO::FETCH_CLASS, $class);

        $user = $result->fetch ();

        return  $user ?: null;
    }
}