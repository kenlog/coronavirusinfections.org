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

namespace Coronavirusinfections\Controller;

use Coronavirusinfections\Model\Home;
use Instant\Core\Controller\BaseController;

class ContentController extends BaseController
{
    protected $modelHome;
    
	public function __construct()
	{
		parent::__construct();
        	$this->modelHome = new Home();
	}
}
