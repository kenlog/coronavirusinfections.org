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

$updateDate = '13 March 2020';

$nextUpdate = '10 AM CET 15 March 2020'; 

$contagionDays = count(glob(dirname(__FILE__) . '/data/csv/reports/*'));

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="public/css/bootstrap.min.css">
    <link rel="stylesheet" href="public/css/fontawesome-all.css">
    <link rel="stylesheet" href="public/css/bootstrap-table.min.css">
    <link rel="stylesheet" href="public/css/style.css?v=5">
    <title>Coronavirus infections (COVID-19)</title>
    <meta name="description" content=" Health information on coronavirus infections with detailed statistics from around the world. Data can be exported in 7 different formats.">
    <link rel="apple-touch-icon" sizes="57x57" href="public/icons/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="public/icons/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="public/icons/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="public/icons/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="public/icons/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="public/icons/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="public/icons/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="public/icons/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="public/icons/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192"  href="public/icons//android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="public/icons/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="public/icons/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="public/icons/favicon-16x16.png">
    <meta name="msapplication-TileColor" content="#0c2433">
    <meta name="msapplication-TileImage" content="public/icons/ms-icon-144x144.png">
    <meta name="theme-color" content="#0c2433">
</head>

<body>
    <nav class="navbar sticky-top navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="<?= $host; ?>">
            <img src="public/img/logo.png?v=2" width="30" height="30" class="d-inline-block align-top" alt="Logo">
            Coronavirus infections
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup"
            aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
                <a class="nav-item nav-link" href="#measures">Basic protective measures</a>
            </div>
        </div>
    </nav>

    <div class="container text-dark text-center">
        
        <div class="jumbotron jumbotron-fluid mt-5 bg-info text-light">
            <div class="container">
                <h3 class="font-weight-bold">Coronavirus disease (COVID-19) situation reports</h3>
                <p class="lead">A pneumonia of unknown cause detected in Wuhan, China was first reported to the <br> WHO Country Office in China on 31 December 2019.</p>
                <p class="lead">The outbreak was declared a Public Health Emergency of International Concern on 30 January 2020.</p>
                <p class="lead">On 11 February 2020, WHO announced a name for the new coronavirus disease: COVID-19</p>
            </div>
        </div>

        <div class="row mb-5">
            <div class="col-sm-6 mb-2">
                <div class="card text-white bg-info">
                    <div class="card-body">
                        <h5 class="card-title"><b>Days from data tracking</b> <br> <i class="far fa-calendar-alt"></i> <?= $contagionDays; ?></h5>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 mb-2">
                <div class="card text-white bg-info">
                    <div class="card-body">
                        <h5 class="card-title"><i class="fas fa-stopwatch"></i> <b>Next update</b> <br> <?= $nextUpdate; ?></h5>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-6 mx-auto mb-3">
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>#table" method="post">
                <select name="date" class="form-control" required>
                    <option value="" selected="selected">Select by date</option>
                    <?php 
                        foreach(glob(dirname(__FILE__) . '/data/csv/reports/*') as $filename){
                            $filename = basename($filename);
                            echo "<option value='" . str_replace('.csv','', $filename) . "'>".str_replace('.csv','', $filename)."</option>";
                        }
                    ?>
                </select> 
                <a class="btn btn-secondary mt-2" href="<?= $host; ?>#table" role="button"><i class="far fa-calendar-check"></i> Last data update <?= $updateDate; ?></a>
                <button type="submit" class="btn btn-secondary mt-2"><i class="fas fa-calendar-day"></i> Show selected date</button>
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

        <canvas id="globallyChart" width="100%"></canvas>

        <div class="card text-white bg-danger mb-5 mt-5 mx-auto" style="max-width: 100%;">
            <?php 
                if (!empty($_POST['date'])) {
                    echo '<div class="card-header font-weight-bold"><i class="fas fa-globe"></i> Globally <br><i class="fas fa-history"></i> '.$_POST['date'].' <br> </div>';
                } else {
                    echo '<div class="card-header font-weight-bold"><i class="fas fa-globe"></i> Globally <br> Last data update: <br> '.$updateDate.' <br> <i class="fas fa-history"></i> Total cases</div>';
                }
            ?>
            <div class="card-body">
                <h5 class="card-title font-weight-bold">Confirmed</h5>
                <p class="card-text"><?= $sumConfirmed; ?></p>
                <h5 class="card-title font-weight-bold">Recovered</h5>
                <p class="card-text"><?= $sumRecovered; ?></p>
                <h5 class="card-title font-weight-bold">Deaths</h5>
                <p class="card-text"><?= $sumDeaths; ?></p>
                <hr>
                <h5 class="card-title font-weight-bold"><i class="fas fa-exclamation-triangle"></i> RISK ASSESSMENT</h5>
                <p class="card-text">
                    China Very High <br>
                    Regional Level Very High <br>
                    Global Level Very High
                </p>
            </div>
        </div>

        <hr style="background:#343a40">
        
        <h2 class="text-warning mb-4" id="measures">Be Ready for coronavirus</h2>
        <div class="row text-center text-lg-left">
            
            <div class="col-lg-6 col-md-12 col-12 mb-4">
                <img class="img-fluid img-thumbnail" src="public/img/flyers/be-ready-social-3.jpg" alt="Be ready for #coronavirus">
            </div>
            <div class="col-lg-6 col-md-12 col-12 mb-4">
                <img class="img-fluid img-thumbnail" src="public/img/flyers/be-ready-social-2.jpg" alt="Be ready to fight #COVID19">
            </div>
            <div class="col-lg-6 col-md-12 col-12 mb-4">
                <img class="img-fluid img-thumbnail" src="public/img/flyers/be-ready-social-1.jpg" alt="Be ready to fight #COVID19">
            </div> 
            <div class="col-lg-6 col-md-12 col-12 mb-4">
                <img class="img-fluid img-thumbnail" src="public/img/flyers/be-smart-if-you-develop.jpg" alt="Be smart if you develop #COVID19">
            </div> 
            <div class="col-lg-6 col-md-12 col-12 mb-4">
                <img class="img-fluid img-thumbnail" src="public/img/flyers/be-smart-inform.jpg" alt="Be smart inform #COVID19">
            </div> 
            <div class="col-lg-6 col-md-12 col-12 mb-4">
                <img class="img-fluid img-thumbnail" src="public/img/flyers/be-safe.jpg" alt="Be safe #COVID19">
            </div> 
            <div class="col-lg-6 col-md-12 col-12 mb-4">
                <img class="img-fluid img-thumbnail" src="public/img/flyers/be-kind-to-support.jpg" alt="Be kind to support #COVID19">
            </div> 
            <div class="col-lg-6 col-md-12 col-12 mb-4">
                <img class="img-fluid img-thumbnail" src="public/img/flyers/be-kind-to-address-stigma.jpg" alt="Be kind to address stigma #COVID19">
            </div> 
            <div class="col-lg-6 col-md-12 col-12 mb-4">
                <img class="img-fluid img-thumbnail" src="public/img/flyers/be-kind-to-address-fear.jpg" alt="Be kind toa ddress fear #COVID19">
            </div> 

        </div>

        <hr style="background:#343a40">

        <h2 class="text-warning mb-4">Protect yourself and others from getting sick</h2>
        <div class="row text-center text-lg-left">
            
            <div class="col-lg-6 col-md-12 col-12 mb-4">
                <img class="img-fluid img-thumbnail" src="public/img/flyers/blue-1.jpg" alt="Wash your hands #COVID19">
            </div>
            <div class="col-lg-6 col-md-12 col-12 mb-4">
                <img class="img-fluid img-thumbnail" src="public/img/flyers/blue-2.jpg" alt="Protect yourself and others from getting sick #COVID19">
            </div>
            <div class="col-lg-6 col-md-12 col-12 mb-4">
                <img class="img-fluid img-thumbnail" src="public/img/flyers/blue-3.jpg" alt="Protect others from getting sick #COVID19">
            </div>
            <div class="col-lg-6 col-md-12 col-12 mb-4">
                <img class="img-fluid img-thumbnail" src="public/img/flyers/blue-4.jpg" alt="Protect others from getting sick #COVID19">
            </div>

        </div>
        

        <blockquote class="blockquote mt-5 mb-4">
            <p class="mb-3 text-light font-weight-bold">Taken from the World Health Organization website for the public</p>
            <a class="link" href="https://www.who.int/" target="_blank" rel="noreferrer">World Health Organization</a>
            <footer class="blockquote-footer text-light"><b>Protection measures for persons who are in or have recently visited (past 14 days) areas where COVID-19 is spreading</b></footer>
            <div>
                <p class="text-light">
                    Follow the guidance outlined above.
                </p>
                <p class="text-light">
                    Stay at home if you begin to feel unwell, even with mild symptoms such as headache and slight runny nose, until you recover. Why? Avoiding contact with others and visits to medical facilities will allow these facilities to operate more effectively and help protect you and others from possible COVID-19 and other viruses.
                </p>
                <p class="text-light">
                    If you develop fever, cough and difficulty breathing, seek medical advice promptly as this may be due to a respiratory infection or other serious condition. Call in advance and tell your provider of any recent travel or contact with travelers. Why? Calling in advance will allow your health care provider to quickly direct you to the right health facility. This will also help to prevent possible spread of COVID-19 and other viruses.
                </p>
            </div>
        </blockquote>

        <hr style="background:#343a40">

        <blockquote class="blockquote mt-5 mb-4">
            <p class="mb-0"></p>
            <footer class="blockquote-footer">Data are taken from <strong><a href="https://data.humdata.org/dataset/novel-coronavirus-2019-ncov-cases" target="_blank">HUMANITARIAN DATA EXCHANGE</a> dataset provided by JHU CSSE</strong></footer>
            <div>
                <small class="text-muted">This website disclaims any representation and warranty regarding the data shown, including accuracy, suitability for use and marketability. <br> This is not an institutional site!</small>
            </div>
        </blockquote>

        <p class="float-right">
            <a href="#">Back to top</a>
        </p>

    </div>

    <footer class="text-muted mt-5 mb-5">
        <div class="container">
            <div>
                <small>The code of this project is open-sourced on <a href="https://github.com/kenlog/coronavirusinfections.org">Github</a> with the MIT License.</small>
            </div>
            <div>
                <small>Logo icon made by Freepik from www.flaticon.com</small>
            </div>
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
    <?php
        if (!empty($_POST['date'])) {
            $date = $_POST['date'];
        } else {
            $files = glob('data/csv/reports/*');
            $lastFile = end($files);
            $lastFile = str_replace('data/csv/reports/','',$lastFile);
            $lastFile = str_replace('.csv','',$lastFile);
            $date = $lastFile;
        }
    ?>
    <script>
        var $table = $('#table')

        $(function() {
            $('#toolbar').find('select').change(function () {
                $table.bootstrapTable('destroy').bootstrapTable({
                    exportDataType: $(this).val(),
                    exportOptions: {
                        fileName: function () {
                            return 'Situation reports (COVID-19) <?= $date; ?>'
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
                labels: ['Confirmed', 'Recovered', 'Deaths'],
                datasets: [{
                    label: 'Situation reports (COVID-19) <?= $date; ?>',
                    data: [<?= $sumConfirmed; ?>, <?= $sumRecovered; ?>, <?= $sumDeaths; ?>],
                    backgroundColor: [
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(213, 51, 66, 0.2)'
                    ],
                    borderColor: [
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(213, 51, 66, 1)'
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
