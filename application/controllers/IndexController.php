<?php

class IndexController extends Zend_Controller_Action {

    public function init() {
        /* Initialize action controller here */
    }

    public function indexAction() {

        $auth = Zend_Auth::getInstance();

        if ($auth->hasIdentity()) {
            $this->view->identity = $auth->getIdentity();

            if (isset($this->view->identity['properties']['email'])) {
                $this->view->email = $this->view->identity['properties']['email'];
            } else {
                $this->view->email = 'some@empty.email';
            }
            
        } else {
            $this->view->identity = null;
        }
    }

}

