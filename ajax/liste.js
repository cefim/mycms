$(document).ready(function(){
	
	console.log ('youhou les copains');
	
	//Liste des éléments HTML
	var $supprimer =	$('.action-supprimer');
	var $modifier =		$('.action-modifier');
	
	//Liste des évènements
	$supprimer.click(supprimer);
	$modifier.click(modifier);
	
	//Liste des fonctions
	function supprimer(){
		
		var idPage = $(this).data('id');
		var url ='ajax/supprimer.php';
		
		$.post(
			url,
			{id : idPage},
			supprimerDone
		);
		
		
	}
	
	function supprimerDone(retour){

		location.reload();
	}
	
	
	function modifier(){
		
	}
	
	
});