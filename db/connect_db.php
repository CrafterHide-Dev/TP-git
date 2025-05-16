<?php
	// Déclaration d'une nouvelle classe
	class connexionDB {
		private $host    = 'localhost';
		private $name    = 'tpgit';
		private $user    = 'root';
		private $pass    = '';
		private $connexion;
										
		function __construct($host = null, $name = null, $user = null, $pass = null){
			if($host != null){
				$this->host = $host;
				$this->name = $name;
				$this->user = $user;
				$this->pass = $pass;
			}
			try{
				$this->connexion = new PDO('mysql:host=' . $this->host . ';dbname=' . $this->name,
					$this->user, $this->pass, array(PDO::MYSQL_ATTR_INIT_COMMAND =>'SET NAMES UTF8', 
					PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING));
			}catch (PDOException $e){
				echo 'Erreur : Impossible de se connecter à la BDD ! <br><br>'.$e;
				die();
			}
		}
		
		public function query($sql, $data = array()){
			$req = $this->connexion->prepare($sql);
			$req->execute($data);
			return $req;
		}
		
		public function prepare($sql, $data = array()){
			$req = $this->connexion->prepare($sql);
			$req->execute($data);
		}
	}
	
	// Faire une connexion à votre fonction
	$BDD = new connexionDB();

	/*

	$req_utilisateurs = $BDD->query('SELECT * FROM utilisateurs');

	foreach ($req_utilisateurs as $utilisateur) {
		$utilisateur['id'];
	}

	*/
?>