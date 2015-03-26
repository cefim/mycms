<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>My CMS</title>
	<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootswatch/3.3.4/yeti/bootstrap.min.css">
	<link rel="stylesheet" href="view/front/style/style.css">
	
</head>
<body>

<div class="container">
	<div class="row">
		<header class="col-md-4">
			<h1><a href="index.php">Mon Mini CMS à Moi</a></h1>
		</header>
		<div class="col-md-8 navbar-container">
		<nav>
			<ul class="nav nav-pills">
				<?= $manager->menu( $pageActive->id() )  ?>
			</ul>	
		</nav>
			
			
					

			
		</div>
	</div>
</div>