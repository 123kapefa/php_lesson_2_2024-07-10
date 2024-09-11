<?php

namespace Controllers\Api\User;

use Models\User;
use Request\Post;

class Login {

    /**
     * @param Post $request
     * @return object|bool|string|null
     * @throws \Exception
     */
    public function postRequest (Post $request) : string {


        $login = $request->get('login');
        $password = $request->get('password');

        $user = User::getUserByLogin ($login);

        //if ($user && password_verify($password, $user->password)) {
        if ($user && $user->password == $password) {

            $token = bin2hex(random_bytes(16));

            print_r ($token);

            $user->updateToken($token);

            return json_encode(['token' => $token]);
        }
        else {
            return json_encode(['error' => 'Ошибка']);
        }
    }
}
