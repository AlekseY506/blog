<?php $this->layout('layouts/layouts', ['title' => 'Login page']) ?>

<div class="kotha-default-content">
    <div class="container">
        <div class="row">
            <div class="col-sm-4">
                <div class="login-block">
                    <img src="images/1.png" alt="Scanfcode">
                    <h1>Введите свои данные</h1>
                    <form action="validation-login.html" method="post">
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-user ti-user"></i></span>
                                <input type="email" name="email" class="form-control" placeholder="Ваш email">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-lock ti-unlock"></i></span>
                                <input type="password" name="password" class="form-control" placeholder="Ваш суперпароль">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="custom-control custom-checkbox mb-3">
                                <input type="checkbox" name="remember" class="custom-control-input" id="customControlValidation1">
                                <label class="custom-control-label" for="customControlValidation1">
                                    Запомнить
                                </label>
                            </div>
                        </div>

                        <button class="btn btn-primary btn-block" type="submit">ВОЙТИ НА САЙТ</button>
                        </div>

                    </form>
                    <div class="login-links">
                        <p class="text-center">Еще нет аккаунта? <a class="txt-brand" href="/register.html"><font color=#29aafe>Регистрируйся</font></a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
