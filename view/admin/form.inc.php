<div class="container">
	<div class="row">
		<div class="col-md-12">
			<h2 class="page-header">Ajouter une page</h2>
		</div>
	</div>
	
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
<form class="form-horizontal" id="formAjout">

<input type="hidden" name="id" id="id" value="<?= $id ?>">
<!-- Form Name -->


<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="titre">Titre : </label>  
  <div class="col-md-4">
  <input 
   		id="titre" 
   		name="titre" 
   		type="text" 
   		placeholder="Titre de la page" 
   		class="form-control input-md" 
   		required
   		value="<?= $titre ?>">
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="menuText">Menu : </label>  
  <div class="col-md-4">
  <input id="menuText" name="menuText" type="text" placeholder="Titre tel qu'il apparaît dans le menu" class="form-control input-md" required value="<?= $menuText ?>">
    
  </div>
</div>

<!-- Textarea -->
<div class="form-group">
  <label class="col-md-4 control-label" for="contenu">Contenu :</label>
  <div class="col-md-4">                     
    <textarea class="form-control" id="contenu" name="contenu" required placeholder="Votre contenu ici"><?= $contenu ?></textarea>
  </div>
</div>

<!-- Button -->
<div class="form-group">
 
  <div class="col-md-4 col-md-offset-4">
    <button 
    	id="enregistrer" name="enregistrer" 
    	class="btn btn-primary ajoutAffiche">
    	Ajouter
    </button>
    <button 
    	id="modifier" name="modifier" 
    	class="btn btn-primary modifAffiche">
    	Modifier
    </button>
    <a href="admin.php" class="btn btn-default btn-sm">Retour</a>
  </div>
  
</div>


</form>

		</div>
	</div>
	
	
	
</div>