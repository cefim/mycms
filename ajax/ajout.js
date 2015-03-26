$(document).ready(function(){
	//JQuery pour l'ajout de Pages
	
	//Liste des éléments HTML
	var $form 		= $('#formAjout');
	var $titre 		= $form.find('#titre');
	var $menuText 	= $form.find('#menuText');
	var $contenu 	= $form.find('#contenu');
	var $submitButton = $form.find('#enregistrer');

	
	//Liste des évènements
	$form.submit(ajouter);
	
	
	//Liste des fonctions
	function ajouter(event){
		//Le fichier n'est plus rechargé au submit
		event.preventDefault();
		
		//Récupération des données tapées
		var titreData 		= $titre.val();
		var menuTextData 	= $menuText.val();
		var contenuData 	= $contenu.val();
		
		console.log(titre);
		console.log(menuText);
		console.log(contenu);
		
		var url = 'ajax/ajouter.php';	
		var postSend = {
			titre : 	titreData,
			menuText : 	menuTextData,
			contenu : 	contenuData
		};
		
		$.post(
			url,
			postSend,
			postDone
		);

		
	}
	
	function postDone(data){
		console.log(data);
		console.log('yo');
	}
	
});