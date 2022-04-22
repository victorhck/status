<?php

$start = microtime(true);

require('conf.php');
require('info.php');

?>

<html>
<head>
	<title>status</title>
	<link href="css/status.css" rel="stylesheet" type="text/css" />
</head>

<body>

	<div id="sidebar">

		<div class="title">servicios</div>
		<ul id="services">
<?php

foreach ($services as $name)
{

?>
			<li><?php echo $name; ?></li>
<?php

}

?>
		</ul>
<?php

if ($servers_list)
{

?>

		<div class="title">servidores</div>
		<ul id="servers">
<?php

	foreach ($servers as $name)
	{

?>
			<li><?php echo $name; ?></li>
<?php

	}

?>
		</ul>
<?php

}

?>

	</div>

	<div id="main">

		<div class="title">uptime</div>
		<div id="uptime" class="box">
			<div>
				<span id="uptime-days" class="value"><?php echo $uptime_days; ?></span> días, 
				<span id="uptime-hours" class="value"><?php echo $uptime_hours; ?></span> horas, 
				<span id="uptime-minutes" class="value"><?php echo $uptime_minutes; ?></span> minutos y
				<span id="uptime-seconds" class="value"><?php echo $uptime_seconds; ?></span> segundos
			</div>
		</div>

		<div class="title">carga de cpu</div>
		<div id="cpu" class="box">
			<ul>
				<li><span id="cpuload-1" class="value"><?php echo $cpu['1']; ?></span> (media del último 1 minuto)</li>
				<li><span id="cpuload-5" class="value"><?php echo $cpu['5']; ?></span> (media de los últimos 5 minutos)</li>
				<li><span id="cpuload-15" class="value"><?php echo $cpu['15']; ?></span> (media de los últimos 15 minutos)</li>
			</ul>
		</div>

		<div class="title">uso de memoria</div>
		<div id="meminfo" class="box">
			<div>
				<span id="mem-usage" class="value"><?php echo ($mem['total'] - $mem['free']); ?></span> /
				<span id="mem-total"><?php echo $mem['total']; ?></span> <?php echo $mem_multiple; ?>
				(<span id="mem-cached" class="value"><?php echo $mem['cached']; ?></span> <?php echo $mem_multiple; ?> en caché)
				<progress id="mem" value="<?php echo ($mem['total'] - $mem['free']); ?>" max="<?php echo $mem['total']; ?>"></progress>
			</div>
		</div>

		<div class="title">espacio del disco</div>
		<div id="diskinfo" class="box">
			<div>
				<span id="disk-usage" class="value"><?php echo ($disk['total'] - $disk['free']); ?></span> /
				<span id="disk-total"><?php echo $disk['total']; ?></span> <?php echo $disk_multiple; ?>
				<progress id="disk" value="<?php echo ($disk['total'] - $disk['free']); ?>" max="<?php echo $disk['total']; ?>"></progress>
			</div>
		</div>

		<div class="title">software</div>
		<div id="software" class="box">
			<ul>
				<li>Hostname del servidor: <span class="value"><?php echo gethostname(); ?></span></li>
				<li>IP del servidor: <span class="value"><?php echo $_SERVER['SERVER_ADDR']; ?></span></li>
				<li>Sistema operativo: <span class="value"><?php echo $distro; ?></span></li>
				<li>Servidor web: <span class="value"><?php echo $webserver; ?></span></li>
				<li>CPU: <span class="value"><?php echo $cpu_model; ?></span></li>
			</ul>
		</div>

		<div id="footer">
			página generada en <?php echo (microtime(true) - $start); ?> segundos // <a href="http://github.com/lfiore/status/">status es un script de lfiore</a>
		</div>

	</div>

	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js" type="text/javascript"></script>
	<script src="js/status.js" type="text/javascript"></script>

</body>
</html>
