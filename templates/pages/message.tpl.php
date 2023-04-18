<?php
    if(isset($isSent)){ ?>
        <h1><?= $response ?></h1>
            <?php if(!$isSent) { ?>
                   <a href="index.php?oldal=message">Próbálja újra!</a>
            <?php }
        } 
?>