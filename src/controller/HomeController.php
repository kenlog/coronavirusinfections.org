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

use Coronavirusinfections\Controller\ContentController;

class HomeController extends ContentController
{
	public function index()
	{
		$data = $this->modelHome->getData();
		$percentage = $this->modelHome;
		$this->view->show('HomePage.php', 
			[
				'data' => $data,
				'modelHome' => $percentage
			]
		);
	}
}