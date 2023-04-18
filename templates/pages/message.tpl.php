<?php
    if(isset($isSent)){ ?>
        <h1><?= $response ?></h1>

            <?php if(!$isSent){ ?>
                   <a href="index.php?oldal=kapcsolat">Próbálja újra!</a>
            <?php } else { ?>
                    <a href="index.php?oldal=allmessages">Tekintse meg az összes üzenetet!</a>
            <?php }
        } 
?>