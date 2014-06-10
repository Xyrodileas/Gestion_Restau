<?php
class view_fo_user_creatAccount extends Controller{
	protected $DisplayLang = 'fr';
	
	public function __construct(){
		parent::__construct();
			
	}
	public function index($request = null){
	//TODO: a modifier 
	
		$this->view->setLanguage("fr");
		$data['title'] = 'Welcome';
		$this->view->rendertemplate('header',$data);
		$this->view->render('welcome/welcome',$data);
		$this->view->rendertemplate('footer',$data);
		//$this->view->lang=$this->DisplayLang;
		
	}
}