<?php
// Start a Session
if( !session_id() ) @session_start();

require '../vendor/autoload.php';

$contBuilder = new DI\ContainerBuilder;

$contBuilder->addDefinitions([
    League\Plates\Engine::class => function(){
        return new League\Plates\Engine('../app/views');
    },

    \PDO::class => function(){
        $driver = 'mysql';
        $host = 'localhost';
        $dbname = 'myblog';
        $user = 'root';
        $password = '';

        $Options = [
            PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES   => false,
        ];

        return new \PDO("$driver:host=$host;dbname=$dbname", $user, $password, $Options);
    },

    Delight\Auth\Auth::class => function($container){
        return new Delight\Auth\Auth($container->get('PDO'), null, null, false);
    },

    Aura\SqlQuery\QueryFactory::class => function(){
        return new Aura\SqlQuery\QueryFactory('mysql');
    },

    Intervention\Image\ImageManager::class => function(){
        return new Intervention\Image\ImageManager(array('driver' => 'imagick'));
    }
]);

$container = $contBuilder->build();

$dispatcher = FastRoute\simpleDispatcher(function(FastRoute\RouteCollector $r) {
    $r->addRoute('GET', '/', ['App\controllers\HomeController', 'index']);
    $r->addRoute('GET', '/index.html[?page={id:\d+}]', ['App\controllers\HomeController', 'index']);
    $r->addRoute('GET', '/page.html[?category={id:\d+}]', ['App\controllers\HomeController', 'category']);
    $r->addRoute('GET', '/login.html', ['App\controllers\UserController', 'login']);
    $r->addRoute('POST', '/validation-login.html', ['App\controllers\UserController', 'validationLogin']);
    $r->addRoute('GET', '/register.html', ['App\controllers\UserController', 'register']);
    $r->addRoute('POST', '/validation-register.html', ['App\controllers\UserController', 'validationRegister']);
    $r->addRoute('GET', '/verification-email.html', ['App\controllers\UserController', 'verificationEmail']);
    $r->addRoute('GET', '/logout.html', ['App\controllers\UserController', 'logout']);
    $r->addRoute('GET', '/contact.html', ['App\controllers\HomeController', 'contact']);
    $r->addRoute('GET', '/show.html[?id={id:\d+}]', ['App\controllers\HomeController', 'show']);
    //comment
    $r->addRoute('POST', '/add-comment.html[?id={id:\d+}]', ['App\controllers\CommentController', 'addComment']);

    //Admin Routes
    $r->addRoute('GET', '/admin.html', ['App\controllers\admin\HomeController', 'index']);
    $r->addRoute('GET', '/admin/categories/index.html', ['App\controllers\admin\HomeController', 'categories']);
    $r->addRoute('GET', '/admin/categories/create-category.html', ['App\controllers\admin\CategoryController', 'formAddCategory']);
    $r->addRoute('POST', '/admin/categories/add-category.html', ['App\controllers\admin\CategoryController', 'addCategory']);
    $r->addRoute('GET', '/admin/categories/edit.html[?id={id:\d+}]', ['App\controllers\admin\CategoryController', 'editForm']);
    $r->addRoute('POST', '/admin/categories/update.html', ['App\controllers\admin\CategoryController', 'update']);
    $r->addRoute('GET', '/admin/categories/delete.html[?id={id:\d+}]', ['App\controllers\admin\CategoryController', 'delete']);
    //user
    $r->addRoute('GET', '/admin/users/index.html', ['App\controllers\admin\UserController', 'users']);
    $r->addRoute('GET', '/admin/users/create.html', ['App\controllers\admin\UserController', 'showUserCreationForm']);
    $r->addRoute('GET', '/admin/users/edit.html', ['App\controllers\admin\UserController', 'showEditForm']);
    $r->addRoute('GET', '/admin/users/update.html[?id={id:\d+}]', ['App\controllers\admin\UserController', 'update']);
    $r->addRoute('POST', '/admin/users/create-user.html', ['App\controllers\admin\UserController', 'createUser']);
    $r->addRoute('GET', '/admin/pages/index.html', ['App\controllers\admin\HomeController', 'pages']);
    //fotos
    $r->addRoute('GET', '/admin/photos/index.html', ['App\controllers\admin\PhotoController', 'index']);
    $r->addRoute('GET', '/admin/photos/create.html', ['App\controllers\admin\PhotoController', 'formCreate']);
    $r->addRoute('POST', '/admin/photos/create-photo.html', ['App\controllers\admin\PhotoController', 'create']);

    //post
    $r->addRoute('GET', '/admin/post/create.html', ['App\controllers\admin\PostController', 'create']);
    $r->addRoute('POST', '/admin/post/create-post.html', ['App\controllers\admin\PostController', 'addPost']);
});

// Fetch method and URI from somewhere
$httpMethod = $_SERVER['REQUEST_METHOD'];
$uri = $_SERVER['REQUEST_URI'];

// Strip query string (?foo=bar) and decode URI
if (false !== $pos = strpos($uri, '?')) {
    $uri = substr($uri, 0, $pos);
}
$uri = rawurldecode($uri);

$routeInfo = $dispatcher->dispatch($httpMethod, $uri);
switch ($routeInfo[0]) {
    case FastRoute\Dispatcher::NOT_FOUND:
        include '404.php';
        break;
    case FastRoute\Dispatcher::METHOD_NOT_ALLOWED:
        $allowedMethods = $routeInfo[1];
        echo "Метод $allowedMethods не разрешон";
        break;
    case FastRoute\Dispatcher::FOUND:
        $handler = $routeInfo[1];
        $vars = $routeInfo[1];
        $cont = $container->call($routeInfo[1], $routeInfo[2]);
        break;
}