<?php

require 'vendor/autoload.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/d3/5.7.0/d3.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
        integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <link rel="stylesheet" href="https://unpkg.com/bootstrap-table@1.16.0/dist/bootstrap-table.min.css">
    <link rel="stylesheet" href="public/css/style.css">
    <title>COVID-19</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
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
    <div class="navbar sticky-top bg-dark shadow-sm">
        <select class="form-control form-control-lg" id="nationControlSelect" onchange="location = this.value;">
            <option selected value> -- Select an Nation -- </option>
            <optgroup label="Western Pacific Region" class="bg-dark">
                <option value="#zh">China</option>
                <option value="#ko">Korea</option>
                <option value="#jp">Japan</option>
                <option value="#sg">Singapore</option>
            </optgroup>
        </select>
    </div>
    <div class="container-fluid text-light text-center">
        <blockquote class="blockquote mt-5">
            <p class="mb-0">Coronavirus disease (COVID-19) situation reports</p>
            <footer class="blockquote-footer">Data are taken from <strong>World Health Organization</strong></footer>
        </blockquote>
        <div class="card text-white bg-danger mb-3 mt-3 mx-auto" style="max-width: 20rem;">
            <div class="card-header font-weight-bold">Globally <br> 10 AM CET 09 March 2020* <br> Total and new cases in last 24 hours</div>
            <div class="card-body">
                <h5 class="card-title font-weight-bold">Confirmed</h5>
                <p class="card-text">109 578</p>
                <h5 class="card-title font-weight-bold">New</h5>
                <p class="card-text">3994 </p>
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
        <div class="mt-5">
            <h3 class="text-info">Western Pacific Region</h3>
        </div>
        <div class="mt-5" id="zh">
            <h1>China</h1>
            <canvas id="chartChina" width="400"></canvas>
        </div>
        <div class="mt-5" id="ko">
            <h1>Korea</h1>
            <canvas id="chartKorea" width="400"></canvas>
        </div>
        <div class="mt-5" id="jp">
            <h1>Japan</h1>
            <canvas id="chartJapan" width="400"></canvas>
        </div>
        <div class="mt-5" id="sg">
            <h1>Singapore</h1>
            <canvas id="chartSingapore" width="400"></canvas>
        </div>
    </div>

    <div class="container">
      <table 
        id="table"
        class="table table-hover table-sm"
        data-toggle="table"
        data-buttons-align="right"
        data-show-fullscreen="true"
        data-buttons-class="primary"
        data-show-columns="true"
        data-search="true"
        data-filter-control="true"
        data-show-search-button="true"
        data-search-align="left"
        data-show-search-clear-button="true">
        <thead class="thead-light">
          <tr>
            <th data-field="state" data-filter-control="input">Province/State</th>
            <th data-field="country" data-filter-control="input">Country/Region</th>
            <th>Last Update</th>
            <th>Confirmed</th>
            <th>Deaths</th>
            <th>Recovered</th>
          </tr>
        </thead>
        <tbody>
        <?php 
          $csvFile = new Keboola\Csv\CsvReader(
            'data/csv/03-08-2020.csv',
            ',',
            '"',
            '',
            1
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
            <p>Data are taken from <strong>World Health Organization</strong></p>
            <small>The code of this project is open-sourced on Github with the MIT License.</small>
        </div>
    </footer>

    <script>Chart.defaults.global.defaultFontColor = '#f7f7f7';</script>
    <script src="public/js/china.js"></script>
    <script src="public/js/korea.js"></script>
    <script src="public/js/japan.js"></script>
    <script src="public/js/singapore.js"></script>

    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
        crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/bootstrap-table@1.16.0/dist/bootstrap-table.min.js"></script>
    <script src="https://unpkg.com/bootstrap-table@1.16.0/dist/extensions/filter-control/bootstrap-table-filter-control.min.js"></script>
</body>

</html>
