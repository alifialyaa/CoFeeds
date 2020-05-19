<?php

namespace CoFeeds\Modules\User\Services;

use CoFeeds\Modules\User\InMemory\UsersRepository;

class LoginService{

    private $repository;

    public function __construct(UsersRepository $repository){
        $this->repository = $repository;
    }

    public function execute($email ,$password, $controller){
        try{
            $user = $this->repository->Login($email, $password, $controller);
        }catch (\Exception $exception){
            throw new \Exception();
        }
        return $user;
    }

}
?>