<?php
namespace Camera\User\Controllers;

class ControllerBase extends \Camera\Shared\Controllers\ControllerBase
{
    public function getShared($name)
    {
        return $this->getDI()->getShared($name);
    }

}
