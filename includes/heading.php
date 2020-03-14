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