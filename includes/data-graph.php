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