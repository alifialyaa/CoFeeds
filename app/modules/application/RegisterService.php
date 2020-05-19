<?php

namespace CoFeeds\Modules\User\Services;

use CoFeeds\Modules\User\InMemory\UsersRepository;

class RegisterService{

    private $repository;

    public function __construct(UsersRepository $repository){
        $this->repository = $repository;
    }

    public function execute($nickname, $email ,$password, $security){
        try{
            $this->repository->SignUp($nickname, $email, $password, $security);
        }catch (\Exception $exception){
            throw new \Exception();
        }
    }

}
?>