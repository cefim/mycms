<?php

class Page {
	private $_titre;
	private $_menuText;
	private $_contenu;
	private $_id;
	private $_urlSlug;
	
	private $_message = "Hello ";
	
	public function __construct($tab){
		$this->hydrate($tab);
	}
	
	public function hydrate($tab){
		if( isset($tab['titre']) ) 		$this->_titre = $tab['titre'];
		if( isset($tab['menuText']) ) 	$this->_menuText = $tab['menuText'];
		if( isset($tab['contenu']) ) 	$this->_contenu = $tab['contenu'];
		if( isset($tab['id']) ) 		$this->_id = $tab['id'];
		if( isset($tab['urlSlug']) ) 	$this->_urlSlug = $tab['urlSlug'];
	}
	
	//getters
	public function titre(){
		return $this->_titre;
	} 
	public function menuText(){
		return $this->_menuText;
	} 
	public function contenu(){
		return $this->_contenu;
	} 
	public function id(){
		return $this->_id;
	} 
	public function urlSlug(){
		return $this->_urlSlug;
	} 
	
	
	
}