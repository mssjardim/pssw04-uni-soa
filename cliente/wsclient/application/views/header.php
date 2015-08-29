<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="Content-Type" context="text/html; charset=utf-8">
<meta name="viewport"
	content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">

<meta name="description" content="">

<title>LembrarWS</title>

<link
	href="<?php echo base_url('includes/bootstrap/css/bootstrap.min.css') ?>"
	rel="stylesheet">
<link href="<?php echo base_url('includes/bootstrap/css/theme.css') ?>"
	rel="stylesheet">
</head>
<body>

	<!-- Fixed navbar -->
	<nav class="navbar navbar-default navbar-fixed-top">
		<div class="container">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed"
					data-toggle="collapse" data-target="#navbar" aria-expanded="false"
					aria-controls="navbar">
					<span class="sr-only">Toggle navigation</span> <span
						class="icon-bar"></span> <span class="icon-bar"></span> <span
						class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="#">LembrarWS</a>
			</div>
			<div id="navbar" class="navbar-collapse collapse">
				<ul class="nav navbar-nav">
					<li class="active"><a href="#">Home</a></li>
					<li class="dropdown"><a href="#" class="dropdown-toggle"
						data-toggle="dropdown" role="button" aria-haspopup="true"
						aria-expanded="false">Lembrete <span class="caret"></span></a>
						<ul class="dropdown-menu">
							<li><a href="#">Dia</a></li>
							<li><a href="#">Semana</a></li>
							<li><a href="#">M&ecirc;s</a></li>
							<li role="separator" class="divider"></li>
							<li class="dropdown-header">Ano</li>
							<li><a href="#">2015</a></li>
							<li><a href="#">2014</a></li>
						</ul></li>
				</ul>
			</div>
			<!--/.nav-collapse -->
		</div>
	</nav>