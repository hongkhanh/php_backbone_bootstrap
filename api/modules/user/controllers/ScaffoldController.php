<?php
/**
 * Created by PhpStorm.
 * User: khanhnh
 * Date: 25/10/2014
 * Time: 10:52
 */

namespace Camera\User\Controllers;

use Camera\User\Models\User;

class ScaffoldController extends ControllerBase {

    public function createAction()
    {
        $input = json_decode(file_get_contents("php://input"));
        $user = new User();
        foreach ($input as $key => $value)
        {
            $user->$key = $value;
        }
        if ($user->save() == false) {
            $response = 'failed';
            foreach ($user->getMessages() as $message) {
                $response += $message . "\n";
            }
        } else {
            $response = 'succeed';
        }
        echo json_encode(array(
            'message'=>$response
        ));
    }
} 