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

 ?>
        
        <div id="toolbar" class="select mr-2" style="display:none">
            <select class="form-control">
                <option value="all">Export All</option>
            </select>
        </div>

        <table 
        id="table"
        class="table table-dark"
        data-toggle="table"
        data-buttons-align="right"
        data-buttons-class="secondary"
        data-show-columns="true"
        data-search="true"
        data-filter-control="true"
        data-show-search-button="true"
        data-search-align="left"
        data-show-search-clear-button="true"
        data-pagination="true"
        data-click-to-select="false"
        data-toolbar="#toolbar"
        data-mobile-responsive="true"
        data-show-toggle="true"
        data-show-export="true">
        <thead class="thead-light">
          <tr>
            <th data-field="state" data-filter-control="input">Province/State</th>
            <th data-field="country" data-filter-control="input">Country/Region</th>
            <th data-field="data" data-filter-control="select">Last Update</th>
            <th>Confirmed</th>
            <th>Recovered</th>
            <th>Deaths</th>
          </tr>
        </thead>
        <tbody>
        <?php 
        if (!empty($_POST['date']) && file_exists('data/csv/reports/'.$_POST['date'].'.csv')) {
            $file = 'data/csv/reports/'.$_POST['date'].'.csv';
        } else {
            $files = glob('data/csv/reports/*');
            $file = end($files);
        }
          $csvFile = new Keboola\Csv\CsvReader(
            $file,
            ',', // delimiter
            '"', // enclosure
            '', // escapedBy
            1 // skipLines
          );
          $sumConfirmed = 0;
          $sumDeaths = 0;
          $sumRecovered = 0;
          foreach ($csvFile as $row) {
            echo '<tr>';
            if (empty($row[0])) {
                echo '<th>'.$row[1].'</th>';
            } else {
                echo '<th>'.$row[0].'</th>';
            }
            echo '<th>'.$row[1].'</th>';
            echo '<th>'.$row[2].'</th>';
            echo '<th>'.$row[3].'</th>';
            echo '<th>'.$row[5].'</th>';
            echo '<th>'.$row[4].'</th>';
            echo '</tr>';
            if ($row[3] > 0) {
                $sumConfirmed += $row[3];
            }
            if ($row[4] > 0) {
                $sumDeaths += $row[4];
            }
            if ($row[5] > 0) {
                $sumRecovered += $row[5];
            }
          }
        ?>
        </tbody>
      </table>