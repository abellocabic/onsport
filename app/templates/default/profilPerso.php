<?php $this->layout('layout', ['title' => 'Accueil']) ?>

<?php $this->start('css') ?>

<link rel="stylesheet" href="<?= $this->assetUrl('/css/style.css') ?>">

<?php $this->stop('css') ?>

<?php $this->start('main_content') ?>

<h2>Mon Profil</h2>
<div class="container">
	<form action="#" method="POST" class="pure-form pure-form-aligned">
		<div class="pure-control-group">
			<label for="usernameIdU">Username</label>
			<input id="usernameIdU" type="text" name="usernameU" value="<?=$tab['username']?>">
		</div>

		<div class="pure-control-group">
			<label for="prenomIdU">Prénom</label>
			<input id="prenomIdU" name="prenomU" type="text" value="<?=$tab['prenom']?>">
		</div>

		<div class="pure-control-group">
			<label for="nameIdU">Nom</label>
			<input id="nameIdU" name="nameU" type="text" value="<?=$tab['nom']?>">
		</div>

		<div class="pure-control-group">
			<label for="emailIdU">Email</label>
			<input id="emailIdU" name="emailU" type="text" value="<?=$tab['email']?>">
		</div>

		<div class="pure-control-group">
			<label for="villeIdU">Ville</label>
			<input id="villeIdU" name="villeU" type="text" value="<?=$tab['ville']?>">
		</div>

		<div class="pure-control-group">
			<label for="cpIdU">Code Postal</label>
			<input id="cpIdU" name="cpU" type="text" value="<?=$tab['cp']?>">
		</div>

		<div class="pure-controls">
			<button type="submit" name="btnModifProfil" class="pure-button pure-button-primary">Enregistrer les Modifications</button>
		</div>
	</form>
</div>
<pre>
	<?php print_r($tab);  ?>
	
</pre>
<?php $this->stop('main_content') ?>