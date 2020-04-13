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
        
<div class="jumbotron jumbotron-fluid mt-5 p-3 bg-info text-light">
    <div class="container">
        <h3 class="text-light font-weight-bold">Coronavirus disease (COVID-19) situation reports</h3>
        <p class="text-muted">- <i class="far fa-newspaper fa-lg"></i> Press releases from the WHO website -</p>
    </div>
</div>

<div class="mb-5">
    <!-- timeline item 1 -->
    <div class="row no-gutters">
        <div class="col-sm"> <!--spacer--> </div>
        <!-- timeline item 1 center dot -->
        <div class="col-sm-1 text-center flex-column d-none d-sm-flex">
            <div class="row h-50">
                <div class="col">&nbsp;</div>
                <div class="col">&nbsp;</div>
            </div>
            <h5 class="m-2">
                <span class="badge badge-pill bg-warning">&nbsp;</span>
            </h5>
            <div class="row h-50">
                <div class="col border-right">&nbsp;</div>
                <div class="col">&nbsp;</div>
            </div>
        </div>
        <!-- timeline item 1 event content -->
        <div class="col-sm py-2">
            <div class="card border-warning shadow bg-info">
                <div class="card-body">
                    <div class="float-right text-light small">31 December 2019</div>
                    <h4 class="card-title text-warning">World Health Organization</h4>
                    <p class="card-text text-light">A pneumonia of unknown cause detected in Wuhan, China was first reported to the WHO Country Office in China.</p>
                </div>
            </div>
        </div>
    </div>
    <!--/row-->
    <!-- timeline item 2 -->
    
    <div class="row no-gutters">
        <div class="col-sm py-2">
            <div class="card border-warning shadow bg-info">
                <div class="card-body">
                    <div class="float-right text-light small">30 January 2020</div>
                    <h4 class="card-title text-warning">World Health Organization</h4>
                    <p class="card-text text-light">The outbreak was declared a Public Health Emergency of International Concern.</p>
                </div>
            </div>
        </div>
        <div class="col-sm-1 text-center flex-column d-none d-sm-flex">
            <div class="row h-50">
                <div class="col border-right">&nbsp;</div>
                <div class="col">&nbsp;</div>
            </div>
            <h5 class="m-2">
                <span class="badge badge-pill bg-warning">&nbsp;</span>
            </h5>
            <div class="row h-50">
                <div class="col border-right">&nbsp;</div>
                <div class="col">&nbsp;</div>
            </div>
        </div>
        <div class="col-sm"> <!--spacer--> </div>
    </div>
    <!--/row-->
    <!-- timeline item 3 -->
    <div class="row no-gutters">
        <div class="col-sm"> <!--spacer--> </div>
        <div class="col-sm-1 text-center flex-column d-none d-sm-flex">
            <div class="row h-50">
                <div class="col border-right">&nbsp;</div>
                <div class="col">&nbsp;</div>
            </div>
            <h5 class="m-2">
                <span class="badge badge-pill bg-warning">&nbsp;</span>
            </h5>
            <div class="row h-50">
                <div class="col border-right">&nbsp;</div>
                <div class="col">&nbsp;</div>
            </div>
        </div>
        <div class="col-sm py-2">
            <div class="card border-warning shadow bg-info">
                <div class="card-body">
                    <div class="float-right text-light small">11 February 2020</div>
                    <h4 class="card-title text-warning">World Health Organization</h4>
                    <p class="card-text text-light">WHO announced a name for the new coronavirus disease: COVID-19.</p>
                </div>
            </div>
        </div>
    </div>
    <!--/row-->
    <!-- timeline item 4 -->
    <div class="row no-gutters">
        <div class="col-sm py-2">
            <div class="card border-warning shadow bg-info">
                <div class="card-body">
                    <div class="float-right text-light small">11 March 2020</div>
                    <h4 class="card-title text-warning">World Health Organization</h4>
                    <p class="card-text text-light">"WHO has been assessing this outbreak around the clock and we are deeply concerned both by the alarming levels of spread and severity, and by the alarming levels of inaction. We have therefore made the assessment that COVID-19 can be characterized as a pandemic."</p>
                </div>
            </div>
        </div>
        <div class="col-sm-1 text-center flex-column d-none d-sm-flex">
            <div class="row h-50">
                <div class="col border-right">&nbsp;</div>
                <div class="col">&nbsp;</div>
            </div>
            <h5 class="m-2">
                <span class="badge badge-pill bg-warning">&nbsp;</span>
            </h5>
            <div class="row h-50">
                <div class="col">&nbsp;</div>
                <div class="col">&nbsp;</div>
            </div>
        </div>
        <div class="col-sm"> <!--spacer--> </div>
    </div>
    <!--/row-->
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