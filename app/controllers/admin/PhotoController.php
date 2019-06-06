<?php

namespace App\controllers\admin;

use App\controllers\AppController;

class PhotoController extends  AppController
{
    public function index()
    {
        //если авторизовался
        if ($this->auth->isLoggedIn()) {

            //если пользователь из группы админестраторов
            if (self::canEditArticle($this->auth)){

                $photos = $this->qb->getAll('images');

                echo $this->templates->render('admin/photos/index', ['photos' => $photos]);
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

    public function formCreate()
    {
        //если авторизовался
        if ($this->auth->isLoggedIn()) {

            //если пользователь из группы админестраторов
            if (self::canEditArticle($this->auth)){
                echo $this->templates->render('admin/photos/create', ['user_name' => $this->auth->getUsername()]);
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

    public function create()
    {
        //если авторизовался
        if ($this->auth->isLoggedIn()) {

            //если пользователь из группы админестраторов
            if (self::canEditArticle($this->auth)){

            $link = self::downloadImage($_POST['title']);

            $this->qb->insert('images', [
                'title'       => $_POST['title'] . "." . $link,
                'description' => $_POST['description'],
                'id_category' => $_POST['id_category'],
                'user_name'   => $this->auth->getUsername(),
                'link'        => $_POST['title'] . "." . $link,
                ]);

            header("Location: /admin/photos/index.html");
            exit();

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