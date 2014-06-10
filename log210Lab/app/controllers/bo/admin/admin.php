<?php
class Admin extends Controller {
	protected $DisplayLang = 'fr';
	public function __construct() {
		parent::__construct ();
	}
	public function test($id) {
		echo (" <br /> Welcome controler : " . $id . " <br /> ");
	}
	
	public function index($error=null){
               //TODO: gestion des erreurs
                $data['loginError']=$error;
        	$this->view->rendertemplate('header',$data);
		$this->view->render('bo/admin/loginPg',$data);
		$this->view->rendertemplate('footer',$data);
		
	}
	
	public function login($loginerror=null) {
		
                
		if (session::get('loggin')==true){
			url::redirect('admin');
                        
                }
                if(isset($_POST['submit'])){

                    $email=$_POST['email'];
                    $password=$_POST['password'];
                    
                      
                    $admin=$this->loadModel('/bo/admin/admin_model');
                   // $admin->test($email);
                    $admin->getPassWord($email);
                    /*
                    echo "Bien venu $admin->getUserRol($email)";  
                     echo "-> $admin->getPassWord($email)";  
                   
                    
                   if ($password==sha1($admin->getPassWord($password))){
                      
                        session::set('loggin', true);
                        session::set('user', $email);
                    }else{
                        $url= DIR.'admin/index/loginerror';
                        header( "Location: $url");
                    }
                    //$data['test']= $email.'<br />'.$password; 
                */}
                /*
                $this->view->rendertemplate('header',$data);
		$this->view->render('bo/admin/viewAdmin',$data);
		$this->view->rendertemplate('footer',$data);
		*/
	}
        
	public function showLogin($login, $pass) {
		echo (" <br /> Welcome controler : " . $id . " <br /> ");
	}
	public function connect($login, $pass) {
		echo (" <br /> Welcome controler : " . $id . " <br /> ");
	}
	
	public function logout() {
		echo (session::display());
		session::destroy();                
                header( "Location:".DIR);
	}
	
}