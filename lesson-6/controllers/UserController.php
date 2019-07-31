<?php
namespace app\controllers;

use app\models\User;
use app\services\Controller;

class UserController extends Controller
{
    protected $defaultAction = 'users';

    public function userAction()
    {
        $params = [
            'user' =>  User::getOne(1)
        ];

        echo $this->render('user', $params);
    }

    public function usersAction()
    {
        $params = [
          'users' =>  User::getAll()
        ];

        echo $this->render('users', $params);
    }




}