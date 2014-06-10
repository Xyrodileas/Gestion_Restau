<?php
class LangRouter extends Controller{
	 
	public function __construct(){
		parent::__construct();
	}

	public function index($lang = "fr",$activeUrl = null){
            
           $activeUrl = str_replace(SERV_NAME,"",$activeUrl);
             $activeUrl = DIR.$activeUrl;
           
            echo $activeUrl;
            Session::set("lang", $lang);
            header( "Location: $activeUrl");	
            
	}

}