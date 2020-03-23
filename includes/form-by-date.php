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

        <div class="col-md-6 mx-auto mb-3">
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>#table" method="post">
                <select name="date" class="form-control" required>
                    <option value="" selected="selected">Select by date</option>
                    <?php 
                        foreach($reportFolder as $filename){
                            $filename = basename($filename);
                            echo "<option value='" . str_replace('.csv','', $filename) . "'>".str_replace('.csv','', $filename)."</option>";
                        }
                    ?>
                </select> 
                <a class="btn btn-secondary mt-2" href="<?= $host; ?>#table" role="button"><i class="far fa-calendar-check"></i> <?= $updateDate; ?></a>
                <button type="submit" class="btn btn-secondary mt-2"><i class="fas fa-calendar-day"></i> Selected date</button>
            </form>
        </div>
