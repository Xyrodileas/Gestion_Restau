<?php

class Admin_model extends Model {

    //put your code here
    public function __construct() {
        parent::__construct();
    }

    //public function test($email){echo "SELECT mdp FROM " . PREFIX . " utilisateur where email = $email";}
    
    public function getPassWord($email) {
        $data = $this->_db->select("SELECT mdp FROM " . PREFIX . " utilisateur where email = :email", 
                                    array(':email' => "$email"));
        
        echo '<br> mp :'.$data[0];
        
        //return $data;
        
  /*              $link = mysqli_connect("localhost","root", "", "restau");



		
			$usr = mysqli_real_escape_string($link, $usr);
    		$pas = hash('sha256', mysqli_real_escape_string($link, $pas)); // On hash le mot de passe en sha256

			$sql = mysqli_query($link, "SELECT * FROM utilisateur 
        							WHERE email='$usr' AND mdp='$pas'
        								LIMIT 1"); 
			if (mysqli_connect_errno()) {
			    printf("Échec de la connexion : %s\n", mysqli_connect_error());
			    exit();
			}

			//$query = "select * from UTILISATEUR where email='".$_POST['email']."' AND password='".$_POST['password']."';";
			//if(mysqli_num_rows($sql) == 1){
		        $row = mysqli_fetch_array($sql);        
    */   
    }
    
    public function getUserRol($email) {
        $data = $this->_db->select("select role from " . PREFIX . " utilisateur where email = :email", 
                                    array(':email' => $email));
         return $data[0]->role;
    }

}
