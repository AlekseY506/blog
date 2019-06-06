<?php

namespace App\controllers\admin;

use App\controllers\AppController;

class HomeController extends AppController
{
    public function index()
    {
        //если авторизовался
        if ($this->auth->isLoggedIn()) {

            //если пользователь из группы админестраторов
            if (self::canEditArticle($this->auth)){
                echo $this->templates->render('admin/home', ['name' => 'admin', 'posts' => 'Post']);
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

    public function categories()
    {
        //если авторизовался
        if ($this->auth->isLoggedIn()) {

            //если пользователь из группы админестраторов
            if (self::canEditArticle($this->auth)){

                $categories = $this->qb->getAll('categories');

                echo $this->templates->render('admin/categories/index', ['name' => 'Admin', 'categories' => $categories]);
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

    public function pages()
    {

    }
}