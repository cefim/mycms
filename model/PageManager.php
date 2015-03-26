<?php

class PageManager {
	
	private $_db;
	private $_table = 'page';
	
	public function __construct(){
		$this->setDb();
	}
	
	public function create(Page $page){
		try{
			
			$db_query = "INSERT 
							INTO $this->_table 
							SET
								titre 		= :titre,
								menuText 	= :menuText,
								contenu 	= :contenu,
								urlSlug 	= ''
								";

			$st = $this->_db->prepare($db_query);


			$st->bindValue(':titre', 	$page->titre());
			$st->bindValue(':menuText', $page->menuText());
			$st->bindValue(':contenu',  $page->contenu());


			$st->execute();
		
		}catch(Exception $e){
			return $e;
		}
		
	}
	
	public function read($id){
		//Pour 1 page
		//Récupération des infos depuis le DB, 
		//Puis création de la page
		//Requête
		
		//Si id est vide, j'utilise $firstId
		if( empty($id) ) $id = $this->firstId();
				
		$db_query = "SELECT * FROM $this->_table WHERE id = $id";
		
		//Préparation et exécution de la requête
		$st = $this->_db->prepare($db_query);
		$st->execute();
		
		//Transformation du résultat en tableau PhP
		$pageArray = $st->fetch(PDO::FETCH_ASSOC);
		
		$page = new Page($pageArray);
		
		return $page;

	}
	
	public function readList(){
		//Pour récupérer l'ensemble des pages
		//Sera utilisé pour générer :
		   // Le menu
		   // Le tableau des pages dans l'Admin
		
		$db_query = "SELECT * FROM $this->_table ORDER BY id";
		
		//Préparation et exécution de la requête
		$st = $this->_db->prepare($db_query);
		$st->execute();
		
		//Let's make this good ol'Array
		return $st->fetchAll(PDO::FETCH_ASSOC);
		
		/*Le tableau obtenu est de ce type:
		array(
			array(
				'titre'=>'Titre de la page',
				...),
			array(
				'titre'=>'Titre de la deuxième page')
		)
		
		*/

	}
	
	public function update($tab){
		//$success = false;
		
			
			$id 		= $tab['id'];
			$titre 		= $tab['titre'];
			$menuText 	= $tab['menuText'];
			$contenu 	= $tab['contenu'];

			$db_query = "UPDATE $this->_table
				SET 
					titre = :titre,
					menuText = :menuText,
					contenu = :contenu
				WHERE
					id = :id
					";

			$st = $this->_db->prepare($db_query);


			$st->bindValue(':tite', 	$titre);
			$st->bindValue(':menuText', $menuText);
			$st->bindValue(':contenu',  $contenu);
			$st->bindValue(':id',  		$id);

			$success = $st->execute();

		
		return $success;
	}
	
	
	public function delete($id){
		
		//Requête
		$db_query = "DELETE from $this->_table WHERE id=$id";
		//Préparation et exécution de la requête
		$st = $this->_db->prepare($db_query);
		$st->execute();
		
	}
	
	//Pour créer un menu
	public function menu($idPageActive){
		//Récupération du contenu vachement rapide:
		$pages = $this->readList();
		
		$output = "";
		
		foreach($pages as $page){
			$menuPage = new Page($page);
			
			$activeClass = ($menuPage->id() == $idPageActive) ?
					"class='active'":
					"";
			
			$id = $menuPage->id();
			$menuText = $menuPage->menuText();
			
			$output .="<li $activeClass >";
				$output .= "<a href='?page=$id'>";
				$output .= $menuText;
				$output .= "</a>";
			$output .="</li>";
		}
		
		return $output;
		
	}
	public function htmlTable(){
		//Récupération du contenu vachement rapide:
		$pages = $this->readList();
		
		$output="";
		
		foreach ($pages as $page){
			$tablePage = new Page($page);
			
			$id = 		$tablePage->id();
			$titre = 	$tablePage->titre();
			
			$output .="<tr>";
				$output .="<td>$id</td>";
				$output .="<td>$titre</td>";
				$output .="<td>";
					$output .="<a href='admin.php?admin=modif&id=$id' 
								class='btn btn-warning action-modifier'>
									<i class='glyphicon glyphicon-pencil'></i>
									Modifier
								</a>";
				$output .="</td>";
				$output .="<td>";
					$output .="<button 
								class='btn btn-danger action-supprimer' 
								data-id='$id'>
									<i class='glyphicon glyphicon-trash'></i>
									Supprimer
								</button>";
				$output .="</td>";
			$output .="</tr>";
		}
		
		return $output;
	}
	
	public function setDb(){
		$connect = new Base();
		$this->_db = $connect->db();
	}
	
	public function firstId(){
		
		//Requête SQL pour obtenir l'id du premier enregistrement
		
		$db_query = "SELECT id FROM $this->_table LIMIT 0,1";
		
		//Préparation et exécution de la requête
		$st = $this->_db->prepare($db_query);
		$st->execute();
		
		//Let's make this good ol'Array
		$output = $st->fetch(PDO::FETCH_ASSOC);
		return $output['id'];
		// return 
	}
	
}