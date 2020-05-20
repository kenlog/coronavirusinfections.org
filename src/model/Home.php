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

namespace Coronavirusinfections\Model;

class Home
{
	private $updateDate = '19 May 2020';
	private $nextUpdate = '13 AM CET 21 May 2020';
	private $pathReportFolder;
	private $reportFolder;
	private $contagionDays;

	public function getData()
	{
		$this->pathReportFolder = 'data/csv/reports/';
		$this->reportFolder = glob($this->pathReportFolder.'*.csv');
		$this->contagionDays = count($this->reportFolder);

		return [
			'updateDate' => $this->updateDate,
			'nextUpdate' => $this->nextUpdate,
			'pathReportFolder' => $this->pathReportFolder,
			'reportFolder' => $this->reportFolder,
			'contagionDays' => $this->contagionDays
		];
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