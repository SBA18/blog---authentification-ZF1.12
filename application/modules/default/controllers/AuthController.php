<?php

class Default_AuthController extends Zend_Controller_Action
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
        // action body
    }

    public function loginAction()
    {
        if (Zend_Auth::getInstance()->hasIdentity()){
            $this->_redirect('admin/index/index');
        }
        $request = $this->getRequest();
        $form = new Default_Form_Login();
        if ($request->isPost()){
            if ($form->isValid($this->_request->getPost())){
                $authAdapter = $this->getAuthAdapter();

                $username = $form->getValue('username');
                $password = $form->getValue('password');


                $authAdapter->setIdentity($username)
                            ->setCredential($password);

                $auth = Zend_Auth::getInstance();
                $result = $auth->authenticate($authAdapter);

                if ($result->isValid()){
                    $identity = $authAdapter->getResultRowObject();
                    $authStorage = $auth->getStorage();
                    $authStorage->write($identity);

                    $this->_redirect('admin/index/index');

                }else{
                    $this->view->errorMessageLogin = 'Username or password is incorrect';
                }
            }
        }


        $this->view->form = $form;


    }

    public function logoutAction()
    {
        Zend_Auth::getInstance()->clearIdentity();
        $this->redirect('default/index/index');
    }

    private function getAuthAdapter(){
        $authAdapter = new Zend_Auth_Adapter_DbTable(Zend_Db_Table::getDefaultAdapter());

        $authAdapter->setTableName('users')
                    ->setIdentityColumn('username')
                    ->setCredentialColumn('password');

        return $authAdapter;


    }


}





