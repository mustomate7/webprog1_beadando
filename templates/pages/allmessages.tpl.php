<?php
    try{
        $dbh->query('SET NAMES utf8 COLLATE utf8_hungarian_ci');

        $sqlSelect = "SELECT 
                        msgs.messageId, 
                        msgs.userName, 
                        msgs.message, 
                        msgs.eventDateTime,
                        users.felhasznalo,
                        users.id,
                        users.csaladi_nev,
                        users.uto_nev 
                      FROM messages msgs
                      LEFT JOIN felhasznalok users ON msgs.userName = users.felhasznalo
                      ORDER BY msgs.eventDateTime DESC";
        $sth = $dbh->prepare($sqlSelect);
        $sth->execute();
        

        if(!$count = $sth->rowCount()){
            ?>
                Nincs megtekinthető üzenet az adatbázisban. <a href="?oldal=kapcsolat">Üzenet küldéshez kattintson ide!</a>
            <?php
        } else{
            echo('<div class="row"><div class="col">');
            echo('Összesen' . $sth->rowCount() . ' darab üzenet.<br><br>');
            echo('<table class="table_msgs table table-hover">');
            echo('<thead><tr><th scope="col">#</th><th scope="col" class="col-dateTime">Dátum</th><th scope="col" class="theMessage">Üzenet</th><th scope="col" class="col-sender">küldő</th></tr></thead>');
            echo('<tbody>');
            $counter = 1;
            while( $row = $sth->fetch(PDO::FETCH_ASSOC) ){
                if($row['id'] == null){
                     $sender = $row['userName'] . '<br><span class="sender_desc">(nem regisztrált)</span>';
                } else {
                    $sender = $row['csaladi_nev'] . ' ' . $row['uto_nev'] . '<br><span class="sender_desc"> -userName: ' . $row['felhasznalo'] . '<br> - id: ' . $row['id'] . '</span>';
                }

                if($row['messageId'] % 2 == 0){
                    echo('<tr class="evenRow_msg"><th scope="row">' . $counter . '</th><td class="col-dateTime">' . $row['eventDateTime'] . '</td><td class="theMessage"><span id="msg_' . $counter . '">' . $row['message'] . '</span></td><td class="col-sender">' . $sender . '</td></tr>');
                } else {
                    echo('<tr class="oddRow_msg"><th scope="row">' . $counter . '</th><td class="col-dateTime">' . $row['eventDateTime'] . '</td><td class="theMessage"><span id="msg_' . $counter . '">' . $row['message'] . '</span></td><td class="col-sender">' . $sender . '</td></tr>');
                }

                $counter++;
            }
            echo('</tbody>');
            echo('</table>');
            echo('</div></div>');
            
        }
    }catch (PDOException $e){
        $errorMessage = 'Hiba: ' .$e->getMessage();
        echo($errorMessage);
    }
?>