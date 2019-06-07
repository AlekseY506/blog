<?php
namespace App\controllers;

use JasonGrimes\Paginator;
use App\core\MyRole;

class HomeController extends AppController
{

    //Главная страница
    public function index()
    {
        $this->templates->registerFunction('mb_substr', function ($string) {
            return mb_substr($string, 0, 500, 'utf-8');
        });

        $totalItems = $this->qb->getAll('posts');
        $itemsPerPage = 3;
        $currentPage = $_GET['page'] ?? 1;
        $urlPattern = '?page=(:num)';

        $posts = $this->qb->getLimitPost('posts', 'id', $itemsPerPage);

        $category = $this->qb->getAll('categories');

        $most_popular = $this->qb->getLimitPost('posts', 'view', 5);

        $latest_post = $this->qb->getLimitPost('posts', 'data', 4);

        $paginator = new Paginator(count($totalItems), $itemsPerPage, $currentPage, $urlPattern);

        echo $this->templates->render('home', [
            'paginator'    => $paginator,
            'posts'        => $posts,
            'name'         => $this->auth->getUsername(),
            'most_popular' => $most_popular,
            'latest_post'  => $latest_post,
            'category'   => $category
        ]);
    }

    //Показ одного Поста
    public function show()
    {
        $post = $this->qb->getOne('posts', (int)$_GET['id']);

        $post['view']++;

        $this->qb->update('posts', ['view' => $post['view']], (int)$_GET['id']);

        $most_popular = $this->qb->getLimitPost('posts', 'view', 5);

        $latest_post = $this->qb->getLimitPost('posts', 'data', 4);

        $comments = $this->qb->getAllId('comments', (int)$_GET['id']);

        echo $this->templates->render('show', [
            'post'         => $post,
            'name'         => $this->auth->getUsername(),
            'comments'     => $comments,
            'most_popular' => $most_popular,
            'latest_post'  => $latest_post
        ]);
    }

    //Контакты
    public function contact()
    {
        echo $this->templates->render('contact', ['name' => $this->auth->getUsername()]);
    }
}