<?php session_start(); ?>
<?php if(file_exists('./logicals/'.$keres['fajl'].'.php')) { include("./logicals/{$keres['fajl']}.php"); } ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title><?= $ablakcim['cim'] . ( (isset($ablakcim['mottó'])) ? ('|' . $ablakcim['mottó']) : '' ) ?></title>
	<link rel="stylesheet" href="./styles/stilus.css" type="text/css">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
	<?php if(file_exists('./styles/'.$keres['fajl'].'.css')) { ?><link rel="stylesheet" href="./styles/<?= $keres['fajl']?>.css" type="text/css"><?php } ?>
	<?php if(file_exists('./scripts/'.$keres['fajl'].'_header.js')) { ?><script src="./scripts/<?= $keres['fajl']?>_header.js"> </script><?php } ?>
</head>
<body>
			<header>
				<div class="row">
					<div class="col-6">
						<img src="./images/<?=$fejlec['kepforras']?>" alt="<?=$fejlec['kepalt']?>">
						<h1><?= $fejlec['cim'] ?></h1>
						<?php if (isset($fejlec['motto'])) { ?><h2><?= $fejlec['motto'] ?></h2><?php } ?>
					</div>
					<div class="col-6 text-end">
						<?php if(isset($_SESSION['login'])) { ?><h4>Bejelentkezve:</h4> <strong><?= $_SESSION['csn']." ".$_SESSION['un']." (".$_SESSION['login'].")" ?></strong><?php } ?>
					</div>
				</div>
			</header>

        
            <nav>
                <ul class="nav nav-underline justify-content-center">
					<?php foreach ($oldalak as $url => $oldal) { ?>
						<?php if(! isset($_SESSION['login']) && $oldal['menun'][0] || isset($_SESSION['login']) && $oldal['menun'][1]) { ?>
							<li class="nav-item">
							<a <?= (($oldal == $keres) ? ' class="nav-link active" aria-current="page"' : 'class="nav-link"') ?> href="<?= ($url == '/') ? '.' : ('?oldal=' . $url) ?>"><?= $oldal['szoveg'] ?></a>
							</li>
						<?php } ?>
					<?php } ?>
                </ul>
            </nav>
			
			<div class="container-fluid">
  				<div class="row align-items-start">
					<div id="content">
						<?php include("./templates/pages/{$keres['fajl']}.tpl.php"); ?>
					</div>
				</div>
			</div>
			

			<footer class="justify-content-center">
				<?php if(isset($lablec['copyright'])) { ?>&copy;&nbsp;<?= $lablec['copyright'] ?> <?php } ?>
				&nbsp;
				<?php if(isset($lablec['ceg'])) { ?><?= $lablec['ceg']; ?><?php } ?>
				<?php if(isset($lablec['legal'])) { ?>
					<br>
					<span class="legalDisclaimer"><?= $lablec['legal']; ?></span>
				<?php } ?>
			</footer>

</body>
<?php if(file_exists('./scripts/'.$keres['fajl'].'_footer.js')) { ?><script src="./scripts/<?= $keres['fajl']?>_footer.js"></script><?php } ?>
</html>
	