<?php $this->layout('layout', ['title' => 'Accueil']) ?>

<?php $this->start('css') ?>

	<link rel="stylesheet" href="<?= $this->assetUrl('/css/style.css') ?>">

<?php $this->stop('css') ?>

<?php $this->start('main_content') ?>
<h2>Prenom Nom</h2>

<div id="cont2">		
	<figure id="figcont2">
		<img src="<?= $this->assetUrl('img/1.PNG') ?>" alt="avatar" width="150%" height="150%">
		<figcaption>username</figcaption>
	</figure>
	<div id="contCont2">
		<div id="butcont2">
			<button id="messageProfil">Messages</button>
			<button>Mes amis</button>
			<a href="profilPerso"><button>Modifier mon profil</button></a>
		</div>
		<div id="butMessage2">
			<a href="reception"><button>Boite de Reception</button></a>
			<a href="envoiMessage"><button>Envoyer un message</button></a> 
		</div>
		<article id="artcont2">presentation : Blablabla Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
			tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
			quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
			consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
			cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
			proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
		</article>
	</div>


</div>

<div id="cont3">
	<li>(avec un foreach)sport + niveau</li> <div id="localisation"> nom prenom est a ... km de vous</div>
</div>

<?php $this->stop('main_content') ?>