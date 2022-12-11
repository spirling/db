<?php

function outputHandler(string $string) {
    static $counter = 0;
    $str = 'Output handler triggered #' . (++$counter) . ': ' . '<br/>';
    $str .= $string . '<br/><br/>';
    return $str;
}
ob_start('outputHandler');
echo 'First';
ob_flush();
echo 'Second';
?>
HTML
<?php

ob_end_flush();

$baseDir = dirname(__DIR__);

$autoloaderFile = $baseDir . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'autoload.php';
if (file_exists($autoloaderFile)) {
    require_once $autoloaderFile;
} else {
    exec('php -v', $output, $resultCode);
    echo 'Output: ';
    var_dump($output);
    echo '<br/>';
    echo 'Result code: ' . $resultCode . '<br/>';
}



$routes = include $baseDir . DIRECTORY_SEPARATOR . 'config' . DIRECTORY_SEPARATOR . 'routes.php';
$router = new \Spirling\Components\Router\Router($routes);

/**
 * Handle request
 */

$requestUri = $_SERVER['REQUEST_URI'];
$requestMethod = $_SERVER['REQUEST_METHOD'];

$requestUri = '/' . ltrim('\/', $requestUri);

$controller = $router->match($requestUri, $requestMethod);

var_dump($controller);
