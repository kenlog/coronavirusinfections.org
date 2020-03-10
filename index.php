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

require 'vendor/autoload.php';

$host = "http://$_SERVER[HTTP_HOST]";

$updateDate = '10 AM CET 09 March 2020';

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="public/css/bootstrap.min.css">
    <link rel="stylesheet" href="public/css/fontawesome-all.css">
    <link rel="stylesheet" href="public/css/bootstrap-table.min.css">
    <link rel="stylesheet" href="public/css/style.css">
    <meta name="theme-color" content="#1b1e23">
    <title>Coronavirus infections (COVID-19)</title>
</head>

<body>
    <nav class="navbar sticky-top navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="<?= $host; ?>">
            <img src="public/img/logo.png" width="30" height="30" class="d-inline-block align-top" alt="Logo">
            Coronavirus infections
        </a>
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
        <blockquote class="blockquote mt-5 mb-5">
            <p class="mb-0">Coronavirus disease (COVID-19) situation reports</p>
            <footer class="blockquote-footer">Data are taken from <strong>HUMANITARIAN DATA EXCHANGE</strong></footer>
            <strong class="text-info"><?= $updateDate; ?></strong> 
        </blockquote>

        <div class="col-md-3 mx-auto">
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="get">
                <select name="filename" class="form-control mx-auto" >
                    <option value="" selected="selected">Select by date</option>
                    <?php 
                        foreach(glob(dirname(__FILE__) . '/data/csv/reports/*') as $filename){
                            $filename = basename($filename);
                            echo "<option value='" . $filename . "'>".str_replace('.csv','', $filename)."</option>";
                        }
                    ?>
                </select> 
                <a class="btn btn-outline-secondary mt-2" href="<?= $host; ?>" role="button">Reset</a>
                <button type="submit" class="btn btn-secondary mt-2">Show data</button>
            </form>
        </div>

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
        data-click-to-select="true"
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
            <th>Deaths</th>
            <th>Recovered</th>
          </tr>
        </thead>
        <tbody>
        <?php 
        if (!empty($_GET['filename'])) {
            $file = 'data/csv/reports/'.$_GET['filename'];
        } else {
            foreach(glob(dirname(__FILE__) . '/data/csv/reports/*') as $filename){
                $filename = basename($filename);
                $file = 'data/csv/reports/'.$filename;
            }
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
            echo '<th>'.$row[4].'</th>';
            echo '<th>'.$row[5].'</th>';
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

        <canvas id="globallyChart" width="100%"></canvas>

        <div class="card text-white bg-danger mb-5 mt-5 mx-auto" style="max-width: 100%;">
            <div class="card-header font-weight-bold">Globally <br> <?= $updateDate; ?> <br> Total cases in last 24 hours</div>
            <div class="card-body">
                <h5 class="card-title font-weight-bold">Confirmed</h5>
                <p class="card-text"><?= $sumConfirmed; ?></p>
                <h5 class="card-title font-weight-bold">Deaths</h5>
                <p class="card-text"><?= $sumDeaths; ?></p>
                <h5 class="card-title font-weight-bold">Recovered</h5>
                <p class="card-text"><?= $sumRecovered; ?></p>
                <hr>
                <h5 class="card-title font-weight-bold">RISK ASSESSMENT</h5>
                <p class="card-text">
                    China Very High <br>
                    Regional Level Very High <br>
                    Global Level Very High
                </p>
            </div>
        </div>

    </div>

    <footer class="text-muted mt-5 mb-5">
        <div class="container">
            <p class="float-right">
                <a href="#">Back to top</a>
            </p>
            <p>Data are taken from <strong><a href="https://data.humdata.org/" target="_blank">HUMANITARIAN DATA EXCHANGE</a></strong></p>
            <small>The code of this project is open-sourced on <a href="https://github.com/kenlog/coronavirusinfections.org">Github</a> with the MIT License.</small>
        </div>
    </footer>

    <script src="public/js/jquery-3.3.1.min.js"></script>
    <script src="public/js/popper.min.js"></script>
    <script src="public/js/Chart.min.js"></script>
    <script src="public/js/bootstrap.min.js"></script>
    <script src="public/js/bootstrap-table.min.js"></script>
    <script src="public/js/bootstrap-table-filter-control.min.js"></script>
    <script src="public/js/tableExport.min.js"></script>
    <script src="public/js/jspdf.min.js"></script>
    <script src="public/js/jspdf.plugin.autotable.js"></script>
    <script src="public/js/bootstrap-table-export.min.js"></script>
    <script src="public/js/bootstrap-table-mobile.min.js"></script>
    <script>
        var $table = $('#table')

        $(function() {
            $('#toolbar').find('select').change(function () {
                $table.bootstrapTable('destroy').bootstrapTable({
                    exportDataType: $(this).val(),
                    exportOptions: {
                        fileName: function () {
                            return 'Situation reports (COVID-19)'
                        },
                        preventInjection: false
                    },
                    exportTypes: ['json', 'xml', 'csv', 'txt', 'sql', 'excel', 'pdf'],
                })
            }).trigger('change')
        })
    </script>
    <script>
        var ctx = document.getElementById('globallyChart').getContext('2d');
        var globallyChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['Confirmed', 'Deaths', 'Recovered'],
                datasets: [{
                    label: 'Situation reports (COVID-19)',
                    data: [<?= $sumConfirmed; ?>, <?= $sumDeaths; ?>, <?= $sumRecovered; ?>],
                    backgroundColor: [
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(213, 51, 66, 0.2)',
                        'rgba(255, 206, 86, 0.2)'
                    ],
                    borderColor: [
                        'rgba(54, 162, 235, 1)',
                        'rgba(213, 51, 66, 1)',
                        'rgba(255, 206, 86, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            }
        });
    </script>
</body>

</html>
