<?php

/**
 * This file is part of the coronavirusinfections.org project.
 * 
 * @author Valentino Pesce
 * @copyright (c) Valentino Pesce <valentino@iltuobrand.it>
 * 
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

$route->get_post('/', 'Coronavirusinfections\Controller\HomeController@index');

$route->any('/*', function(){
    pre("Page ( {$this->app->request->path} ) Not Found", 6);
});