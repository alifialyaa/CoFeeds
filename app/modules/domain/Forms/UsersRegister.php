<?php

namespace CoFeeds\Modules\User\Forms;

use Phalcon\Forms\Form;
use Phalcon\Forms\Element\Text;
use Phalcon\Forms\Element\Password;
use Phalcon\Forms\Element\Email as FormEmail;
use Phalcon\Validation;
use Phalcon\Validation\Validator\Email;
use Phalcon\Validation\Validator\PresenceOf;

class RegisterForm extends Form
{
    public function initialize(){
        $this->setEntity($this);

        $nickname = new Text("nickname");
        $nickname->setAttribute('placeholder','Username');
        $nickname->addValidator(new PresenceOf(array(
            'message' => 'Username is required'
        )));
        
        $email = new FormEmail("email");
        $email->setAttribute('placeholder','Email');
        $email->addValidator(new PresenceOf(array(
            'message' => 'Email Address is required'
        )));
        $email->addValidator(new Email(array(
            'message' => 'Invalid Email Format'
        )));
        
        $password = new Password('password');
        $password->setAttribute('placeholder','Password');
        $password->addValidator(new PresenceOf(array(
            'message' => 'Password is required'
        )));



        $this->add($email);
        $this->add($nickname);
        $this->add($password);
        
    }
}

?>