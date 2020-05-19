<?php
declare(strict_types=1);

namespace CoFeeds\Modules\User\Controllers;

use CoFeeds\Modules\User\Forms\UsersLogin;
use CoFeeds\Modules\User\Forms\UsersRegister;

class IndexController extends ControllerBase
{

    public function indexAction(){
        $login_form = new UsersLogin();
        
        $this->view->UsersLogin = $login_form;
        
        $sessions = $this->getDI()->getShared("session");

        if ($sessions->has("user_id")) {
            return $this->response->redirect("/");
        }
    }

    public function signupAction(){
        $register_form = new UsersRegister();
        $this->view->regForm = $register_form; 

        $sessions = $this->getDI()->getShared("session");

        if ($sessions->has("user_id")) {
            return $this->response->redirect("/");
        }
        
    }

    public function registerAction(){
        $register_form = new UsersRegister();

        if(!$this->security->checkToken()){
            echo "invalid csrf !!";
        }

        if($register_form->isValid($this->request->getPost())){
            try{
                $this->registerService->execute(
                    $this->request->getPost('nickname'),
                    $this->request->getPost('email'),
                    $this->request->getPost('password'),
                    $this->security
                );
            }catch (\RegisterFailedException $e){
                echo "Register Failed";
            }
            
            return $this->response->redirect('/user');
        }else{
            return $this->response->redirect('/user');
        }

    }

    public function loginAction(){
        $login_form = new UsersLogin();
        if(!$this->security->checkToken()){
            echo "invalid csrf !!";
        }

        if($login_form->isValid($this->request->getPost())){
                
            $user = $this->loginService->execute(
                $this->request->getPost('email'), 
                $this->request->getPost('password'),
                $this
            );
            
            if($user){
                return $this->response->redirect('/');
            }else{
                return $this->response->redirect('/user');    
            }

        }else{
            return $this->response->redirect('/user');
        }

    }

    public function logoutAction(){

        $sessions = $this->getDI()->getShared("session");
        $sessions->remove("user_id");

        return $this->response->redirect('/user');
        
    }

}

