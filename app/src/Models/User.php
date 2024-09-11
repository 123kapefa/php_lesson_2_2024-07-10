<?php

namespace Models;

use Database\DB;

class User {
    public ?int $id;
    public ?string $login;
    public ?string $password;
    public ?string $token;

    /**
     * @return array
     */
    public static function getAllUsers () : array {
        return DB::getInstance ()->getRowByClass ('SELECT * FROM users;', self::class);
    }

    /**
     * @param string $login
     * @return mixed
     */
    public static function getUserByLogin (string $login) : ?User {
        $userData = DB::getInstance()->getUser(
            'SELECT * FROM users WHERE login = :login;',
            self::class,
            ['login' => $login]);

        if($userData)
            return $userData;
        return null;
    }

    public function updateToken(string $token): void {
        DB::getInstance()->query(
            'UPDATE users SET token = :token WHERE id = :id',
            ['token' => $token, 'id' => $this->id]
        );
    }
}
