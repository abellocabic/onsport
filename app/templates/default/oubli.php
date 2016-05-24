<?php $this->layout('layout', ['title' => 'Accueil']) ?>

<?php $this->start('css') ?>

	<link rel="stylesheet" href="<?= $this->assetUrl('/css/style.css') ?>">

<?php $this->stop('css') ?>

<?php $this->start('main_content') ?>
<div id="formOubli">
	<form id="divFormOubli" class="pure-form pure-form-stacked formulaire" method="POST">
		<fieldset>
			<div class="pure-u-1 pure-u-md-1-3">
				<label for="emailId">Entrer votre E-mail</label>
				<input id="emailId" name="emailOubli" class="pure-u-23-24" type="email" required>
			</div>

			<button type="submit" name="btnOubli" class="pure-button pure-button-primary">Envoyer un nouveau Mot de Passe</button>
		</fieldset>
	</form>


</div>

<?php $this->stop('main_content') ?>