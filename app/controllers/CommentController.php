<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 03.06.2019
 * Time: 14:35
 */

namespace App\controllers;
use App\controllers\AppController;


class CommentController extends AppController
{

    public function addComment()
    {
        $this->qb->insert('comments', $_POST);

        header("Location: " . $_SERVER['HTTP_REFERER']);
        exit();
    }
}