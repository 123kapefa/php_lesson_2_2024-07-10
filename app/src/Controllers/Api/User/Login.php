<?php

namespace Controllers\Api\User;

use Request\Post;

class Login {

    /**
     * @param Post $request
     * @return string
     */
    public function postRequest (Post $request) : string {


        return print_r ($request, true);
    }
}
