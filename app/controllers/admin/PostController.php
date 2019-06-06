<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 01.06.2019
 * Time: 22:04
 */

namespace App\controllers\admin;

use App\controllers\AppController;
use App\QueryBuilder;

class PostController extends AppController
{
    public function create()
    {
        //если авторизовался
        if ($this->auth->isLoggedIn()) {

            //если пользователь из группы админестраторов
            if (self::canEditArticle($this->auth)){
                echo $this->templates->render('admin/post/create', ['user_name' => 'Admin']);
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

    public function addPost()
    {
        if (empty($_FILES['photo']['tmp_name'])){
            header("Location: " . $_SERVER['HTTP_REFERER']);
            exit();
        }else{
            $this->qb->insert('posts', $_POST);

            $name_images = $this->qb->lastsInsertId();

            $extended = self::downloadImage($name_images);

            $this->qb->update('posts', ['photo' => $name_images . "." . $extended], $name_images);

            header("Location: /admin.html");
            exit();
        }
    }

}