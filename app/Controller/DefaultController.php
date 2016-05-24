<?php

namespace Controller;



use \W\Controller\Controller;

use \W\Security\AuthentificationManager;
use \W\Manager\UserManager;


class DefaultController extends Controller
{

	/**
	 * Page d'accueil par défaut
	 */
	public function home()
	{	
		$this->show('default/home');
	}

	public function inscription()
	{
		$errors = [];
		$data = [];
		if (isset($_POST['btnSubmit'])) {
			$m = new UserManager;
			if ($m->emailExists( $_POST['email'] )) {
				$errors[] = "Désolé mais cet email existe déjà !!!";
			}

			if ($m->usernameExists($_POST['username'])) {
				$errors[] = "Désole mais ce nom d'utilisateur est déjà prit !!!";
			}
			if (empty($_POST['nom'])) {
				
				$errors[] = "vous avez oublié de remplir le champs NOM";
			}
			if (empty($_POST['prenom'])) {
				
				$errors[] = "vous avez oublié de remplir le champs PRENOM";
			}
			if (empty($_POST['username'])) {
				
				$errors[] = "vous avez oublié de remplir le champs NOM D'UTILISATEUR";
			}
			if (empty($_POST['password'])) {
				
				$errors[] = "vous avez oublié de remplir le champs MOT DE PASSE";
			}
			if (empty($_POST['ville'])) {
				
				$errors[] = "vous avez oublié de remplir le champs VILLE";
			}
			if (empty($_POST['cp'])) {
				
				$errors[] = "vous avez oublié de remplir le champs CODE POSTAL";
			}
			if (empty($errors)) {
				$password = password_hash($_POST['password'], PASSWORD_DEFAULT);
				$data = ['username' => $_POST['username'], 'email' => $_POST['email'], 'password' => $password,
				'role' => "", 'nom'=> $_POST['nom'], 'prenom' => $_POST['prenom'], 
				'ville' => $_POST['ville'], 'cp' => $_POST['cp']];

				$m->insert($data);
			}
		}
		$this->show('Default/inscription', ['errors' => $errors, 'data' => $data]);
	}

	public function login()
	{	
		if (isset($_POST['btnLogin'])) {

			$am = new AuthentificationManager();
			$um = new UserManager();
			if ($am->isValidLoginInfo($_POST['emailLogin'], $_POST['passwordLogin'])) {
				$user = $um->getUserByUsernameOrEmail($_POST['emailLogin']);
				$am->logUserIn($user);
				
				$_SESSION['id'] = $user['id'];
				$this->redirectToRoute('home');

			}else{
				$this->redirectToRoute('erreur');
			}			
		}

	}

	public function erreur()
	{
		$this->show('default/erreur');
	}

	public function logout(){
		$am = new AuthentificationManager;
		$am->logUserOut();
		$this->redirectToRoute('home');
	}

	public function profil(){
		$this->show('default/profil');
	}

	public function envoiMail ($destinataire, $body){
		$mail = new PHPMailer;

		$mail->isSMTP();
		$mail->Debugoutput = 'html';
		$mail->Host = 'smtp.gmail.com';
		$mail->Port = 587;
		$mail->SMTPSecure = 'tls';
		$mail->SMTPAuth = true;
		$mail->Username = "exercicephp@gmail.com";
		$mail->Password = "phpexo26";
		$mail->setFrom('exercicephp@gmail.com', 'First Last');
		$mail->addAddress($destinataire, 'John Doe');
		$mail->Subject = 'PHPMailer GMail SMTP test';
		$mail->Body = $body;
		if (!$mail->send()) {
			echo "Mailer Error: " . $mail->ErrorInfo;
		} else {
			echo "Message sent!";
		}

	}

	public function oubli() {
		$am = new UserManager();
		if (isset($_POST['btnOubli'])) {

			if ($am->emailExists($_POST['emailOubli'])){

				$user = $am->getUserByUsernameOrEmail($_POST['emailOubli']);
				echo $user['id'];

				$id = $user['id'];
				$token = md5( uniqid(rand(), true ));
				$dt = date("Y-m-d H:i:s", strtotime("+1 day"));
				
				$data = ['user_id' => $id, 'token' => $token, 'date_validite' => $dt];

				//$m->insert($data);
				

			//echo "<a href=\"reinit.php?id=" .$id."&token=" .$token. " \">Lien</a>";
				//echo "un email vous a été envoyé";
				//envoiMail($_POST['email'], "<a href=\"reinit.php?id=" .$id."&token=" .$token. " \">Lien</a>");
			} //echo "Désolé mais cet email est inconnu";



		}
		$this->show('Default/oubli');
	}



	public function envoiMessage(){
		$um = new UserManager();
		$errors = [];
		$data = [];

		if (isset($_POST['btnEnvoiMessage'])) {
			if (!empty($_POST['destinataire']) && !empty($_POST['messageAEnvoyer'])) {
				$user = $_SESSION['user']['id'];
				$destinataire = $um->getUserByUsernameOrEmail($_POST['destinataire']);
				$destinataire = $destinataire['id'];
				$message = $_POST['messageAEnvoyer'];
				$date = date("Y-m-d H:i:s");	
				$data = ['id_user' => $user, 'message' => $message, 'id_partenaire' => $destinataire, 'date' => $date];
				$am->setTable('messages');
				$am->insert($data);
				


				
				

			}else{
				$errors = ['Les champs n\'ont pas été correctment remplis'];
			}			
		}
		$this->show('Default/envoiMessage', ['errors' => $errors, 'data' => $data]);
	}

	public function reception(){
		
		$m = new \Manager\MessageManager(); //

		$resultat = $m->testy();
		

		$this->show('Default/reception', ['resultat' => $resultat]);
	}

	public function profilPerso(){
		$um = new UserManager();

		$tab = $um->find($_SESSION['user']['id']);
		
		$data = [];
		$username = '';
		$prenom = '';
		$name = '';
		$email = '';
		$ville = '';
		$cp = '';


		if (isset($_POST['btnModifProfil'])) {
			if (empty($_POST['usernameU'])) {
				$username = $_SESSION['user']['username'];
			}else{
				$username = $_POST['usernameU'];
			}
			if (empty($_POST['prenomU'])) {
				$prenom = $_SESSION['user']['prenom'];
			}else{
				$prenom = $_POST['prenomU'];
			}
			if (empty($_POST['nameU'])) {
				$nom = $_SESSION['user']['nom'];
			}else{
				$nom = $_POST['nom'];
			}
			if (empty($_POST['emailU'])) {
				$email = $_SESSION['user']['email'];
			}else{
				$email = $_POST['emailU'];
			}
			if (empty($_POST['villeU'])) {
				$ville = $_SESSION['user']['ville'];
			}else{
				$ville = $_POST['villeU'];
			}
			if (empty($_POST['cpU'])) {
				$cp = $_SESSION['user']['cp'];
			}else{
				$cp = $_POST['cpU'];
			}
		}

		$data = 
		['username' => $username, 
		'email' => $email,
		'nom' => $name,
		'prenom' => $prenom,
		'ville' => $ville,
		'cp' => $cp
		];

		$um->update($data, $_SESSION['user']['id']);




		$this->show('Default/profilPerso', ['tab' => $tab]);



	}
}