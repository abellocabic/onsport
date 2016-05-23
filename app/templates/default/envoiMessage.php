<?php $this->layout('layout', ['title' => 'Accueil']) ?>

<?php $this->start('main_content') ?>

<div class="container">
	<h1>Envoyer un message</h1>

	<form action="#" method="POST" class="pure-form pure-form-aligned">
		<div class="pure-control-group">
			<label for="destinataireId">Username du partenaire</label>
			<input id="destinataireId" name="destinataire" type="text">
		</div>
		<div class="pure-control-group">
			<label for="messageAEnvoyerId">Message à envoyer</label>
			<textarea name="messageAEnvoyer" id="messageAEnvoyerId" cols="60" rows="10"placeholder="Ercrivez votre message"></textarea>
		</div>
		<div class="pure-controls">           
			<button type="submit" name="btnEnvoiMessage" class="pure-button pure-button-primary">Submit</button>
		</div>
		<?php if(!empty($errors))
		{ ?>
		<div class="errors">
			<?php 
			foreach ($errors as $value) {
				?> <li> <?= $value . "<br>";?></li>
				<?php } ?>
			</div>
			<?php } ?> 

		</form>
		<pre>
			<?php var_dump($data) ;//var_dump($_SESSION ?>
		</pre>
	</div>


	<?php $this->stop('main_content') ?>