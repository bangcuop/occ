<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Admin extends CBehavior {

    private $_name;

    public function getName() {
        return $this->_name;
    }

    public function load($name) {
        $this->_name = $name;
        $this->onAdminLoad = array($this, 'changePath');
        $this->onAdminLoad(new CEvent($this->owner));
        $this->owner->run();
    }

    public function onAdminLoad($event) {
        $this->raiseEvent('onAdminLoad', $event);
    }

    protected function changePath($event) {
        $object = $event->sender;
        $object->controllerPath .= DIRECTORY_SEPARATOR . $this->_name;
        $object->viewPath .= DIRECTORY_SEPARATOR . $this->_name;
    }

}
