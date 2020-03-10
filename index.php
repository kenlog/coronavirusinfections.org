<?php

/**
 * This file is part of the Covid19 project.
 * 
 * @author Valentino Pesce
 * @copyright (c) Valentino Pesce <valentino@iltuobrand.it>
 * 
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

require 'vendor/autoload.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="public/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <link rel="stylesheet" href="public/css/bootstrap-table.min.css">
    <link rel="stylesheet" href="public/css/style.css">
    <title>COVID-19</title>
</head>

<body>
    <nav class="navbar sticky-top navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="#">COVID-19</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup"
            aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
                <a class="nav-item nav-link" href="https://www.who.int/" target="_blank">World Health Organization</a>
            </div>
        </div>
    </nav>

    <div class="container text-light text-center">
        <blockquote class="blockquote mt-5">
            <p class="mb-0">Coronavirus disease (COVID-19) situation reports</p>
            <footer class="blockquote-footer">Data are taken from <strong>HUMANITARIAN DATA EXCHANGE</strong></footer>
        </blockquote>
        <div class="card text-white bg-danger mb-5 mt-3 mx-auto" style="max-width: 25rem;">
            <div class="card-header font-weight-bold">Globally <br> 10 AM CET 09 March 2020* <br> Total and new cases in last 24 hours</div>
            <div class="card-body">
                <h5 class="card-title font-weight-bold">Confirmed</h5>
                <p class="card-text">109 577</p>
                <h5 class="card-title font-weight-bold">New</h5>
                <p class="card-text">3993 </p>
                <h5 class="card-title font-weight-bold">Deaths</h5>
                <p class="card-text">3809</p>
                <h5 class="card-title font-weight-bold">New</h5>
                <p class="card-text">225</p>
                <hr>
                <h5 class="card-title font-weight-bold">RISK ASSESSMENT</h5>
                <p class="card-text">
                    China Very High <br>
                    Regional Level Very High <br>
                    Global Level Very High
                </p>
            </div>
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
        data-pagination="true">
        <thead class="thead-light">
          <tr>
            <th data-field="state" data-filter-control="input">Province/State</th>
            <th data-field="country" data-filter-control="input">Country/Region</th>
            <th data-field="data" data-filter-control="select">Last Update</th>
            <th>Confirmed</th>
            <th>Deaths</th>
            <th>Recovered</th>
          </tr>
        </thead>
        <tbody>
        <?php 
          $csvFile = new Keboola\Csv\CsvReader(
            'data/csv/reports/03-09-2020.csv',
            ',', // delimiter
            '"', // enclosure
            '', // escapedBy
            1 // skipLines
          );
          foreach ($csvFile as $row) {
            echo '<tr>';
            echo '<th>'.$row[0].'</th>';
            echo '<th>'.$row[1].'</th>';
            echo '<th>'.$row[2].'</th>';
            echo '<th>'.$row[3].'</th>';
            echo '<th>'.$row[4].'</th>';
            echo '<th>'.$row[5].'</th>';
            echo '</tr>';
          }
        ?>
        </tbody>
      </table>
    </div>

    <footer class="text-muted mt-5 mb-5">
        <div class="container">
            <p class="float-right">
                <a href="#">Back to top</a>
            </p>
            <p>Data are taken from <strong><a href="https://data.humdata.org/" target="_blank">HUMANITARIAN DATA EXCHANGE</a></strong></p>
            <small>The code of this project is open-sourced on Github with the MIT License.</small>
        </div>
    </footer>

    <script src="public/js/jquery-3.3.1.min.js"></script>
    <script src="public/js/popper.min.js"></script>
    <script src="public/js/bootstrap.min.js"></script>
    <script src="public/js/bootstrap-table.min.js"></script>
    <script src="public/js/bootstrap-table-filter-control.min.js"></script>
</body>

</html>
