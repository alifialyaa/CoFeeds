<?php

namespace CoFeeds\Modules\User\Repository;

interface UsersRepository{
    //public function SignUp($nickname, $email , $password, $security);
    //public function Login($email , $password, $controller);

    public function byId($id) : Users;
    public function save(User $user) : void;
    public function update(User $user) : void;
    public function delete($id) : void;

    //wadah untuk ambil dan manggil objek
}

?>