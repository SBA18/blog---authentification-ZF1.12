<?php

class Default_IndexController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
        $layoutPath = APPLICATION_PATH . '/templates/default';
        $options = array('layout'=>'index',
            'layoutPath'=>$layoutPath);

        Zend_Layout::startMvc($options);
    }

    public function indexAction()
    {
        $headTitle = $this->headTitle = "Home Sawers Blog";
        $this->view->headTitle = $headTitle;
    }

    public function aboutAction()
    {
        $headTitle = $this->headTitle = "About Sawers Blog";
        $this->view->headTitle = $headTitle;

        $about = "This is a about page";

        $this->view->about = $about;
    }

    public function contactAction()
    {
        $headTitle = $this->headTitle = "Contact Us";
        $this->view->headTitle = $headTitle;

        $msg = "About us page";
        $this->view->msg = $msg;
    }


}





