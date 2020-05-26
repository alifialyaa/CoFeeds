<?php

namespace CoFeeds\Modules\User\Models;


class Users {
    private $id;
    private $nickname;
    private $email;
    private $password;
    private $enabled;
    private $createdAt;

    public function __construct()
    {
// constructor buat bikin user
    }

    public function activate()
    {
        if ($this->enabled == false) {
            $this->enabled = true;
        }
    }

    public function authenticate($username, $password)
    {
        if ($this->username == $username) ...
        // logic
    }


}

?>