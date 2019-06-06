<?php
namespace App\controllers;

use Delight\Auth\Auth;
use League\Plates\Engine;
use App\QueryBuilder;
use Intervention\Image\ImageManager;
use Delight\Auth\Role;
use Bulletproof\Image;

class AppController
{
    protected $qb;
    protected $auth;
    protected $templates;
    protected $manager;

    public function __construct(Engine $templates, Auth $auth, QueryBuilder $qb, ImageManager $manager)
    {
        $this->qb = $qb;
        $this->auth = $auth;
        $this->templates = $templates;
        $this->manager = $manager;
    }

    public function validationLogin()
    {
        if ($_POST['remember'] == on) {
            $rememberDuration = (int) (60 * 60 * 24 * 365.25);
        }
        else {
            $rememberDuration = null;
        }

        try {
            $this->auth->login($_POST['email'], $_POST['password'], $rememberDuration);
            header("Location: /index.html");
        }
        catch (\Delight\Auth\InvalidEmailException $e) {
            flash()->error('Неверный адрес электронной почты');
            header("Location: /index.html");
        }
        catch (\Delight\Auth\InvalidPasswordException $e) {
            flash()->error('Неверный пароль');
            header("Location: /index.html");
        }
        catch (\Delight\Auth\EmailNotVerifiedException $e) {
            flash()->warning('Электронная почта не подтверждена');
            header("Location: /index.html");
        }
        catch (\Delight\Auth\TooManyRequestsException $e) {
            flash()->warning('Слишком много запросов');
            header("Location: /index.html");
        }
    }

    public static function canEditArticle($auth) {
        return $auth->hasAnyRole(
            Role::MODERATOR,
            Role::SUPER_MODERATOR,
            Role::ADMIN,
            Role::SUPER_ADMIN
        );
    }

    public function logout()
    {
        $this->auth->logOut();
        $this->auth->destroySession();

        header("Location: /index.html");
    }

    protected function getUserInfo($auth)
    {

    }

    public static function downloadImage($name)
    {
        $image = new Image($_FILES);

        if($image["photo"]){

            $image->setName($name)
                ->setMime(array('jpeg', 'jpg'))
                ->setSize(100000, 2000000)
                ->setLocation(dirname(__DIR__) . "../../public/front/images/posts/");
            $upload = $image->upload();

            if($upload){
                return $upload->getMime();
            }else{
                flash()->error($image->getError());
                header("Location: ". $_SERVER['HTTP_REFERER']);
                exit();
            }
        }
    }
}