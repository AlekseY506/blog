<?php $this->layout('layouts', ['title' => 'Create page']) ?>

<div class="conteiner">.
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <form action="/MyBlogProject/store.php" method="post">
                <div class="form-group">
                    <label for="">Title</label>
                    <input type="text" name="title" class="form-control">
                </div>
                <div class="form-group">
                    <button class="btn btn-success">Добавить запись</button>
                </div>
            </form>
        </div>
    </div>
</div>