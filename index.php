<?php ini_set('display_errors', 1);

/**
 * This file is part of the Instant MVC PHP Micro-Framework project.
 * 
 * @package     Instant MVC PHP Micro-Framework
 * @author      Valentino Pesce 
 * @link        https://github.com/kenlog
 * @copyright   2019 (c) Valentino Pesce <valentino@iltuobrand.it>
 * 
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

require_once 'src/config.php';

$autoload = 'vendor/autoload.php';

if (file_exists($autoload)) {
    
    require $autoload;

    $loader = new Nette\Loaders\RobotLoader;
    $loader->addDirectory(__DIR__ . '/src');
    $loader->setTempDirectory(__DIR__ . '/temp');
    $loader->register();

    $app            = System\App::instance();
    $app->request   = System\Request::instance();
    $app->route     = System\Route::instance($app->request);

    $route = $app->route;

    include 'src/route.php';

    $route->end();

} else {
    echo '<p>Install composer dependencies, run: <code style="background: #eee;padding: 5px;color: #9c3eb9;">composer install</code></p>';
}