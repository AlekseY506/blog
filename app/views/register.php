<?php $this->layout('layouts', ['title' => 'Страница регистрации']) ?>

<div class="form-group form-group-lg">
    <div class="container">
        <div class="row">
            <div class="col-sm-4">
                <form class="form-signin" action="validation-register.html" method="post">
                    <img class="mb-4" src="images/bootstrap-solid.svg" alt="" width="72" height="72">
                    <h1 class="h3 mb-3 font-weight-normal">Регистрация</h1>
                    <?php if(isset($_SESSION['error'])): ?>
                        <div class="alert alert-danger">
                            <?=$_SESSION['error'];unset($_SESSION['error']); ?>
                        </div>
                    <?php endif; ?>
                    <label for="input" class="sr-only">Имя</label>
                    <input type="text" name="name" id="input" class="form-control form-group" placeholder="Имя" required autofocus>
                    <label for="inputEmail" class="sr-only">Email</label>
                    <input type="email" name="email" id="inputEmail" class="form-control form-group" placeholder="Email" required >
                    <label for="inputPassword" class="sr-only">Пароль</label>
                    <input type="password" name="password" id="inputPassword" class="form-control form-group" placeholder="Пароль" required>
                    <button class="btn btn-lg btn-primary btn-block" type="submit">Зарегистрироваться</button>
                    <a href="/login.html">Войти</a>
                    <p class="mt-5 mb-3 text-muted">&copy; 2018 - <?=date("Y") ?></p>
                </form>
            </div>
        </div>
    </div>
</div>