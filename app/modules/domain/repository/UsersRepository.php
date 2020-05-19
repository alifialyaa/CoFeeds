<?php

namespace CoFeeds\Modules\User\Repository;

interface UsersRepository{
    public function SignUp($nickname, $email , $password, $security);
    public function Login($email , $password, $controller);
}

?>