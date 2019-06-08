<li class="dropdown">
    <a href="#" class="dropdown-toggle" data-toggle="dropdown"  role="button"
       aria-haspopup="true" aria-expanded="false">Категории</a>
    <ul class="dropdown-menu">
        <?php foreach ($categories as $category): ?>
            <li class="active"><a href="#"><?=$category['title'] ?></a></li>
        <?php endforeach; ?>
    </ul>
</li>