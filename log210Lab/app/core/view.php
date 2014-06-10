<?php

class View {
	public function __construct() {
		
		switch (session::get("lang")){
			case "fr":
				require("app/resource/lang/fr_lang.php");
			case "eng":
				require("app/resource/lang/eng_lang.php");
			default:
				require("app/resource/lang/fr_lang.php");
		}
	}
  /*  public function setLanguage($lang){
        switch ($lang){
        	case "fr":
        		require("app/resource/lang/fr_lang.php");
            case "eng":
                require("app/resource/lang/eng_lang.php");       
            default:
                require("app/resource/lang/fr_lang.php");     
            }
        }
    */    
    public function render($path,$data = false, $error = false){
		require "app/views/$path.php";
	}

    public function rendertemplate($path,$data = false){
		require "app/templates/".Session::get('template')."/$path.php";
	}

}