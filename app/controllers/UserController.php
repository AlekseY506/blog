<?php
namespace App\controllers;

use SimpleMail;

class UserController extends AppController
{
    public function login()
    {
        //если авторизовался
        if ($this->auth->isLoggedIn()) {
            header("Location: /index.html");
            exit();
        }
        else {
            //выводим форму входа
            echo $this->templates->render('login');
        }
    }

    public function verificationEmail()
    {
        try {
            $this->auth->confirmEmailAndSignIn($_GET['selector'], $_GET['token']);

            flash()->success('Email успешпо подтвержден. Теперь вы можете войти на сайт используя свой логин и пароль');
            header("Location: /index.html");
            exit();
        }
        catch (\Delight\Auth\InvalidSelectorTokenPairException $e) {
            flash()->error('Недопустимый маркер');
            header("Location: /index.html");
            exit();
        }
        catch (\Delight\Auth\TokenExpiredException $e) {
            flash()->error('Срок действия токена истек');
            header("Location: /index.html");
            exit();
        }
        catch (\Delight\Auth\UserAlreadyExistsException $e) {
            flash()->error('Пользователь уже существует.');
            header("Location: /index.html");
            exit();
        }
        catch (\Delight\Auth\TooManyRequestsException $e) {
            flash()->warning('Слишком много запросов');
            header("Location: /index.html");
            exit();
        }
    }

    public function register()
    {
        //если авторизовался
        if ($this->auth->isLoggedIn()) {
            header("Location: /index.html");
            exit();
        }
        else {
            //выводим форму входа
            echo $this->templates->render('register');
        }
    }

    public function validationRegister()
    {
        try {
            $userId = $this->auth->register($_POST['email'], $_POST['password'], $_POST['name'], function ($selector, $token) {

                SimpleMail::make()
                    ->setTo($_POST['email'], $_POST['name'])
                    ->setFrom('info@example.blog', 'Administration')
                    ->setSubject('Подтверждение регистрации')
                    ->setMessage("Вы зарегистрировались на сайте <b>my-blog.ru</b> Вам необходимо поддтвердить Email - адрес. Для это перейдите по ссылке ниже.<br><a href=verification-email.html?selector=$selector&token=$token>Подтвердите Email</a>")
                    ->setHtml()
                    ->send();
                $name = $_POST['name'];
                flash()->success("$name, на указанный вами Емайл отправлено сообщение. Для подтверждения перейдите по ссылке внутри!");

                header("Location: /index.html");
                exit();
            });
        }
        catch (\Delight\Auth\InvalidEmailException $e) {
            flash()->error('Неверный адрес электронной почты ');
            header("Location: /");
            exit();
        }
        catch (\Delight\Auth\InvalidPasswordException $e) {
            flash()->error('Не верный паpоль');
            header("Location: /");
            exit();
        }
        catch (\Delight\Auth\UserAlreadyExistsException $e) {
            flash()->info('Пользователь уже существует.');
            header("Location: /");
            exit();
        }
        catch (\Delight\Auth\TooManyRequestsException $e) {
            flash()->warning('Слишком много запросов');
            header("Location: /");
            exit();
        }
    }
}