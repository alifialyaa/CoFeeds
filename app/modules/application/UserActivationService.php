<?php

namespace CoFeeds\Modules\User\Services;

use CoFeeds\Modules\User\InMemory\UsersRepository;

class UserActivationService{

    private $repository;

    public function __construct(UsersRepository $repository){
        $this->repository = $repository;
    }

    public function execute($id){
        try{
            //update status pasca aktivasi
            $user = $this->repository->byId($id);

            $user->activate();

            $this->repository->update($user);
        }catch (\Exception $exception){
            throw new \Exception();
        }
    }

}
?>