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
         
        <canvas id="globallyChart" width="100%"></canvas>

        <div class="row">
                <div class="col-sm-12 mb-3 mt-5 mx-auto">
                        <div class="card text-white bg-danger">
                        <div class="card-header">
                            <h4 class="card-title font-weight-bold"><i class="fas fa-procedures"></i> Covid-19 Situation Report on World</h4>
                        </div>
                        <div class="card-body">
                        <?php 
                            if (!empty($_POST['date'])) {
                                echo '<h5 class="font-weight-bold"><i class="fas fa-calendar-day"></i> '.$_POST['date'].' </h5>';
                            } else {
                                echo '<h5 class="font-weight-bold"><i class="fas fa-calendar-day"></i> '.$updateDate.' </h5>';
                            }
                        ?>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 mb-3">
                    <div class="card text-white bg-info">
                        <div class="card-header">
                            <h3 class="card-title font-weight-bold">CONFIRMED CASES</h3>
                        </div>
                        <div class="card-body">
                            <h3 class="card-title font-weight-bold"><?= number_format($sumConfirmed); ?></h3>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 mb-3">
                    <div class="card text-white bg-info">
                        <div class="card-header">
                            <h3 class="card-title font-weight-bold">RECOVERED CASES</h3>
                        </div>
                        <div class="card-body">
                            <h3 class="card-text font-weight-bold"><?= number_format($sumRecovered); ?></h3>
                        </div>
                        <div class="card-footer text-muted">
                            <h4 class="card-text"><?= $this->percentage($sumRecovered,$sumConfirmed,1); ?></h4> 
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 mb-3">
                    <div class="card text-white bg-info">
                        <div class="card-header">
                            <h3 class="card-title font-weight-bold">DEATHS CASES</h3>
                        </div>
                        <div class="card-body">
                            <h3 class="card-text font-weight-bold"><?= number_format($sumDeaths); ?></h3>
                        </div>
                        <div class="card-footer text-muted">
                            <h4 class="card-text"><?= $this->percentage($sumDeaths,$sumConfirmed,1); ?></h4> 
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 mb-3">
                    <div class="card text-white bg-danger">
                        <div class="card-header">
                            <h4 class="card-title font-weight-bold"><i class="fas fa-exclamation-triangle"></i> RISK ASSESSMENT</h4>
                        </div>
                        <div class="card-body">
                            <h5>
                                Global Level Very High
                            </h5>
                        </div>
                    </div>
                </div>
        </div>
