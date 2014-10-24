<?php
namespace Camera\Shared\Controllers;

class ControllerBase extends \Phalcon\Mvc\Controller
{
    public function checkLogin()
    {

    }
    public function getResponse()
    {
        return $this->getDI()['response'];
    }
}
