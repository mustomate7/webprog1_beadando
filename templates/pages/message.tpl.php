<?php
    if(isset($isSent)){ ?>
        <?= $response ?>
            <br><br>
            <?php if(!$isSent){ ?>
                   <a href="index.php?oldal=kapcsolat">Próbálja újra!</a>
            <?php } else { ?>
                    <a href="index.php?oldal=allmessages">Tekintse meg az összes üzenetet!</a>
            <?php }
        } 
?>