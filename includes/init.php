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

$host = "https://coronavirusinfections.org";

$updateDate = '22 March 2020';

$nextUpdate = 'Data temporarily unavailable'; 

$pathReportFolder = 'data/csv/reports/';

$reportFolder = glob($pathReportFolder.'*.csv');

$contagionDays = count($reportFolder);

function percentage(int $a, int $b, int $decimals = 2)
{
    if ($b > $a) {
        return number_format((($a / $b) * 100),$decimals) . '%';
    } else {
        return '0.00%';
    }
}