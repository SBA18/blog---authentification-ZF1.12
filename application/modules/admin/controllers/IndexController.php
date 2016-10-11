<?php

class Admin_IndexController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
        $layoutPath = APPLICATION_PATH . '/templates/admin';
        $options = array('layout'=>'index',
                        'layoutPath'=>$layoutPath);

        Zend_Layout::startMvc($options);
    }

    public function indexAction()
    {
        // action body
    }


}

