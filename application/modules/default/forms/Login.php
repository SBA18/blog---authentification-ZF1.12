<?php

class Default_Form_Login extends Zend_Form
{

    public function init()
    {
        $this->setName('login');


        $username = new Zend_Form_Element_Text('username');
        $username->setLabel('User name : ')
                ->setRequired(true);


        $password = new Zend_Form_Element_Password('password');
        $password->setLabel('Password : ')
                ->setRequired(true);

        $login = new Zend_Form_Element_Submit('login');
        $login->setLabel('login');


        $this->addElements(array($username, $password, $login));
        $this->setMethod('post');
        $this->setAction(Zend_Controller_Front::getInstance()->getBaseUrl() . '/default/auth/login');

    }


}

