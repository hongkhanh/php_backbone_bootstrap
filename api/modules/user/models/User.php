<?php
/**
 * Created by PhpStorm.
 * User: khanhnh
 * Date: 25/10/2014
 * Time: 10:53
 */

namespace Camera\User\Models;


class User extends \Phalcon\Mvc\Model
{
    public function getSource()
    {
        return "user";
    }
} 