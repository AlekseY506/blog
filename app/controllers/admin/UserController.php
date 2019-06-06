<?php

namespace App\controllers\admin;

use App\controllers\AppController;

class UserController extends AppController
{
    public function users()
    {
        //если авторизовался
        if ($this->auth->isLoggedIn()) {

            //если пользователь из группы админестраторов
            if (self::canEditArticle($this->auth)){
                $users = $this->qb->getAll('users');
                echo $this->templates->render('admin/users/index',['users' => $users]);
            }else{
                //Выводим сообщение о запрете
                flash()->warning("В эту часть сайта доступ закрыт");
                header("Location: /index.html");
                exit();
            }
        }
        else {
            //переадресовываем на страницу входа
            header("Location: /login.html");
            exit();
        }
    }

    public function showUserCreationForm()
    {
        //если авторизовался
        if ($this->auth->isLoggedIn()) {

            //если пользователь из группы админестраторов
            if (self::canEditArticle($this->auth)){
                echo $this->templates->render('admin/users/create');
            }else{
                //Выводим сообщение о запрете
                flash()->warning("В эту часть сайта доступ закрыт");
                header("Location: /index.html");
                exit();
            }
        }
        else {
            //переадресовываем на страницу входа
            header("Location: /login.html");
            exit();
        }
    }

    public function showEditForm()
    {
        //если авторизовался
        if ($this->auth->isLoggedIn()) {

            //если пользователь из группы админестраторов
            if (self::canEditArticle($this->auth)){
                echo $this->templates->render('admin/users/edit');
            }else{
                //Выводим сообщение о запрете
                flash()->warning("В эту часть сайта доступ закрыт");
                header("Location: /index.html");
                exit();
            }
        }
        else {
            //переадресовываем на страницу входа
            header("Location: /login.html");
            exit();
        }
    }

    //Создает нового пользователя от именя Админестратора
    public function createUser()
    {
        //если авторизовался
        if ($this->auth->isLoggedIn()) {

            //если пользователь из группы админестраторов
            if (self::canEditArticle($this->auth)){

                try {
                    $userId = $this->auth->admin()->createUser($_POST['email'], $_POST['password'], $_POST['username']);

                    echo 'We have signed up a new user with the ID ' . $userId;
                }
                catch (\Delight\Auth\InvalidEmailException $e) {
                    die('Invalid email address');
                }
                catch (\Delight\Auth\InvalidPasswordException $e) {
                    die('Invalid password');
                }
                catch (\Delight\Auth\UserAlreadyExistsException $e) {
                    die('User already exists');
                }
            }else{
                //Выводим сообщение о запрете
                flash()->warning("В эту часть сайта доступ закрыт");
                header("Location: /index.html");
                exit();
            }
        }
        else {
            //переадресовываем на страницу входа
            header("Location: /login.html");
            exit();
        }
    }
}