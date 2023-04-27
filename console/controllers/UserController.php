<?php

namespace console\controllers;


use lesson\models\User;
use yii\console\Controller;

class UserController extends Controller
{
    public function actionIndex()
    {
        echo 'This is User console controller'.PHP_EOL;
        echo 'You can create user by command [user/create username password]'.PHP_EOL;
        echo 'You can set password for user by command [user/set-password username password]'.PHP_EOL;
        echo 'You can delete user by command [user/delete username]'.PHP_EOL;
    }

    public function actionCreate($username, $password)
    {
        echo 'Creating user'.PHP_EOL;
        $user = new User();
        $user->username = $username;
        $user->setPassword($password);
        $user->generateAuthKey();
        $user->status = User::STATUS_ACTIVE;
        if($user->save()) {
            echo 'User '.$username.' created successfully!'.PHP_EOL;
        } else {
            echo 'Error! User '.$username.' not created!'.PHP_EOL;
            print_r($user->errors);
        }
    }

    public function actionDelete($username)
    {
        $user = User::findByUsernameWithoutStatus($username);

        if($user) {
            if($user->delete()) {
                echo 'User '.$username.' deleted successfully!'.PHP_EOL;
            } else {
                echo 'Error! Can not to delete user '.$username.'!'.PHP_EOL;
            }
        } else {
            echo 'Error! User '.$username.' not found!'.PHP_EOL;
        }

    }

    public function actionSetPassword($username, $password)
    {
        $user = User::findByUsernameWithoutStatus($username);

        if($user) {
            $user->setPassword($password);
            $user->generateAuthKey();
            if($user->save()) {
                echo 'User '.$username.' set password successfully!'.PHP_EOL;
            } else {
                echo 'Error! Can not set password for user '.$username.'!'.PHP_EOL;
            }
        } else {
            echo 'Error! User '.$username.' not found!'.PHP_EOL;
        }

    }

}