<?php

class login extends Controller{
	
	private $_login;
	
	protected $DisplayLang = 'fr';
	
	public function __construct(){
		parent::__construct();

		// lier mon model
		//$this->_blog = $this->loadModel('blog_model');
		
	}

	public function index($request = null){

echo "login";
	
	}

}