<?php $this->layout('layouts', ['title' => 'Edit page']) ?>

<div class="conteiner">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <form action="update.php?id=<?=$id?>" method="post">
                <div class="form-group">
                    <label for="">Articles <?=$post['id']?> </label>
                    <input type="text" name="title" value="<?=$title ?>" class="form-control">
                </div>
                <div class="form-group">
                    <button class="btn btn-warning">Изменить запись</button>
                </div>
            </form>
        </div>
    </div>
</div>