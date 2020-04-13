<?php

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

namespace Instant\Core\Views;

class View 
{
	public function show($file, $data = null)
	{
		if (is_array($data))
		{
			extract($data);
		}
		include 'src/views/'.$file;
	}

	public function load(string $title, string $path, array $viewdata = null)
	{
		$data = ['title' => $title];
		$this->show('partial/Head.php',$data);
		$this->show($path, $viewdata);
		$this->show('partial/Footer.php');
	}

	public function percentage(int $a, int $b, int $decimals = 2)
	{
		if ($b > $a) {
			return number_format((($a / $b) * 100),$decimals) . '%';
		} else {
			return '0.00%';
		}
	}
}