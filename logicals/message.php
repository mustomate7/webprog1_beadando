<?php 
if(isset($_POST['message']) ){
    if(isset($_SESSION['login'])){
        $userName = $_SESSION['login'];
        $name = $_SESSION['csn'] . ' ' . $_SESSION['un'];
    }else{
        $userName = 'Vendég';
        $name = 'Vendég';
    }

    if( strlen($_POST['message']) < 5 ){
        $response = 'sikertelen küldés kérem adjon meg hosszabb üzenetet (min 5)';
        $isSent = false;
    } else {
        try {
            // Kapcsolódás
            $dbh->query('SET NAMES utf8 COLLATE utf8_hungarian_ci');
            $sqlInsert = "insert into messages(messageId, userName, message, eventDatetime)
                            values(0, :userName, :message, :eventDateTime )";
            $stmt = $dbh->prepare($sqlInsert);
            $stmt->execute(array(':userName' => $userName, ':message' => $_POST['message'], ':eventDateTime' => date("Y-m-d H:i:s")));

            if($count = $stmt->rowCount()){
                $response = 'Tisztelt '. $name .', az Ön üzenete :<br>' . $_POST['message'] . '<br>' . 'sikeresen elküldve.<br>' . date("Y-m-d H:i:s");
                $isSent = true;
            } else {
                $response = "sikertelen küldés kérem próbálj újra";
                $isSent = false;
            }

        } catch (PDOException $e) {
            $errormessage = "Hiba: ".$e->getMessage();
            $isSent = false;
        }
    } 
}

?>