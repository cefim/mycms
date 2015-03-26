$(document).ready(function(){
	//JQ Stuff pour modifier des pages
	
	//Liste des éléments HTML
	var $form 		= $('#formAjout');
	var $titre 		= $form.find('#titre');
	var $menuText 	= $form.find('#menuText');
	var $contenu 	= $form.find('#contenu');
	var $submitButton = $form.find('#modifier');
	var $id 		= $form.find('#id');
	

	//Event
	$form.submit(modifier);
	
	//Function
	function modifier(event){
		event.preventDefault();
		console.log ('Clic OK')
		
		//Récupération des données tapées
		var titreData 		= $titre.val();
		var menuTextData 	= $menuText.val();
		var contenuData 	= $contenu.val();
		var idData			= $id.val();
		
		var url= "ajax/modifier.php";
		var postSend = {
			titre : titreData,
			menuText : menuTextData,
			contenu : contenuData,
			id : idData
		};
		
		$.post(
			url,
			postSend,
			postDone);
		
		
	}
	
	function postDone(data){
		console.log('Chuis arrivé jusque là.');
		console.log(data);
	}
	
});