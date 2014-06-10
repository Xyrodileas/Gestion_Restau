<?php

class Welcome extends Controller{

   protected $DisplayLang = 'fr';
   
	public function __construct(){
		parent::__construct();
               
	}

	public function index($lang = "fr",$request = null){
		
		//page Display language:
        //$this->view->setLanguage($lang);
		//page title:
        $data['title'] = WELCOME_TITLE;
        
		$this->view->rendertemplate('header',$data);
		//$this->view->render('bo/admin/menuV',$data);
		$this->view->render('welcome/viewWelcome',$data);
		$this->view->rendertemplate('footer',$data);

        }
    
        
}