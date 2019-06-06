<?php

namespace App\controllers\admin;

use App\controllers\AppController;

class CategoryController extends AppController
{
    public function formAddCategory()
    {
        //если авторизовался
        if ($this->auth->isLoggedIn()) {

            //если пользователь из группы админестраторов
            if (self::canEditArticle($this->auth)){
                echo $this->templates->render('admin/categories/form-add');
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

    public function addCategory()
    {
        //если авторизовался
        if ($this->auth->isLoggedIn()) {

            //если пользователь из группы админестраторов
            if (self::canEditArticle($this->auth)){

                $this->qb->insert('categories', $_POST);

                header("Location: /admin/categories/index.html");
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

    public function editForm()
    {
        //если авторизовался
        if ($this->auth->isLoggedIn()) {

            //если пользователь из группы админестраторов
            if (self::canEditArticle($this->auth)){

                $category = $this->qb->getOne('categories', $_GET['id']);

                echo $this->templates->render('admin/categories/edit', ['category' => $category]);
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

    public function update()
    {
        //если авторизовался
        if ($this->auth->isLoggedIn()) {

            //если пользователь из группы админестраторов
            if (self::canEditArticle($this->auth)){

                $this->qb->update('categories', $_POST, $_POST['id']);

                header("Location: /admin/categories/index.html");
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

    public function delete()
    {
        //если авторизовался
        if ($this->auth->isLoggedIn()) {

            //если пользователь из группы админестраторов
            if (self::canEditArticle($this->auth)){

                $this->qb->delete('categories', $_GET['id']);

                header("Location: /admin/categories/index.html");
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