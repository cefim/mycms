<div class="container">
	<div class="row">
		<div class="col-md-12">
			<h2 class="page-header">Liste des Pages</h2>
		</div>
	</div>
	
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<table class="table table-striped" id="tablePageListe">
				<tr>
					<th class='id'>#</th>
					<th>Titre</th>
					<th class='action'>Modifier</th>
					<th class='action'>Supprimer</th>
				</tr>
				<?= $manager->htmlTable(); ?>
			</table>
		</div>
	</div>
	
	
	
</div>