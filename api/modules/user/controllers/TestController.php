<?php
/**
 * Created by PhpStorm.
 * User: khanhnh
 * Date: 24/10/2014
 * Time: 12:39
 */

namespace Camera\User\Controllers;

class TestController extends \Camera\User\Controllers\ControllerBase
{
    public function indexAction()
    {
        echo json_encode(array(
            'name'=>'Khanh',
            'role'=>'admin'
        ));
    }
} 