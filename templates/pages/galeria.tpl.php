<?php
$kepek = array();
$olvaso = opendir($MAPPA);
while (($fajl = readdir($olvaso)) !== false)
    if (is_file($MAPPA.$fajl)) {
        $vege = strtolower(substr($fajl, strlen($fajl)-4));
        if (in_array($vege, $TIPUSOK))
            $kepek[$fajl] = filemtime($MAPPA.$fajl);            
    }
closedir($olvaso);

// Űrlap ellenőrzés:
if (isset($_POST['kuld'])) {
    //print_r($_FILES);
    foreach($_FILES as $fajl) {
        if ($fajl['error'] == 4);   // Nem töltött fel fájlt
        elseif (!in_array($fajl['type'], $MEDIATIPUSOK))
            $uzenet[] = " Nem megfelelő típus: " . $fajl['name'];
        elseif ($fajl['error'] == 1   // A fájl túllépi a php.ini -ben megadott maximális méretet
                    or $fajl['error'] == 2   // A fájl túllépi a HTML űrlapban megadott maximális méretet
                    or $fajl['size'] > $MAXMERET) 
            $uzenet[] = " Túl nagy állomány: " . $fajl['name'];
        else {
            $vegsohely = $MAPPA.strtolower($fajl['name']);
            if (file_exists($vegsohely))
                $uzenet[] = " Már létezik: " . $fajl['name'];
            else {
                move_uploaded_file($fajl['tmp_name'], $vegsohely);
                $uzenet[] = ' Ok: ' . $fajl['name'];
                header("Refresh:0");
            }
        }
    }        
}



?>
<h1>Feltöltés a galériába:</h1>
<?php
    if (!empty($uzenet))
    {
        echo '<ul>';
        foreach($uzenet as $u)
            echo "<li>$u</li>";
        echo '</ul>';
    }
?>

<?php 
    if(isset($_SESSION["login"])){
    echo'
    <form action="" method="post" enctype="multipart/form-data" class="row mt-4">
        <div class="col-lg-4">
            <label>Első:
                <input type="file" name="elso" required>
            </label>
        </div>
        <div class="col-lg-4">
            <label>Második:
                <input type="file" name="masodik">
            </label>
        </div>
        <div class="col-lg-4">
            <label>Harmadik:
                <input type="file" name="harmadik">
            </label>        
        </div>
        <div class="col-lg-3 text-center mt-4 mx-auto">
            <input type="submit" name="kuld" class="btn btn-primary w-100">
        </div>
      </form> 
        ';
    }
?>

<div id="galeria" class="mt-5 container">
    <h1 class="text-center mb-5">Galéria</h1>
    <div class="row">
    <?php
    arsort($kepek);
    foreach($kepek as $fajl => $datum)
    {
    ?>
        <div class="kep col-lg-4 text-center">
            <a href="<?php echo $MAPPA.$fajl ?>">
                <img src="<?php echo $MAPPA.$fajl ?>">
            </a>            
            <h5>Név:</h5>  
            <p><?php echo $fajl; ?></p>
            <h5>Dátum:</h5>
            <p><?php echo date($DATUMFORMA, $datum); ?></p>
        </div>
    <?php
    }
    ?>
    </div>
</div>

