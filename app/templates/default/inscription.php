<?php $this->layout('layout', ['title' => 'Accueil']) ?>

<?php $this->start('main_content') ?>
<div id="inscription">

	<form class="pure-form pure-form-stacked formulaire" method="POST" >
		<fieldset>

			<div class="pure-g">
				<div class="pure-u-1 pure-u-md-1-3">
					<label for="nomId">Nom</label>
					<input id="nomId" name="nom" class="pure-u-23-24" type="text">
				</div>

				<div class="pure-u-1 pure-u-md-1-3">
					<label for="prenomId">Prénom</label>
					<input id="prenomId" name="prenom" class="pure-u-23-24" type="text">
				</div>

				<div class="pure-u-1 pure-u-md-1-3">
					<label for="utilsateurId">Nom d'utilisateur</label>
					<input id="utilisateurId" name="username" class="pure-u-23-24" type="text">
				</div>

				<div class="pure-u-1 pure-u-md-1-3">
					<label for="emailId">E-Mail</label>
					<input id="emailId" name="email" class="pure-u-23-24" type="email" required>

				</div>

				<div class="pure-u-1 pure-u-md-1-3">
					<label for="passwordId">Mot de Passe</label>
					<input id="passwordId" name="password" class="pure-u-23-24" type="password">
				</div>

				<div class="pure-u-1 pure-u-md-1-3">
					<label for="villeId">Ville</label>
					<input id="villeId" name="ville" class="pure-u-23-24" type="text">
				</div>

				<div class="pure-u-1 pure-u-md-1-3">
					<label for="cpId">Code-Postal</label>
					<input id="cpId" name="cp" class="pure-u-23-24" type="text">
				</div>

				<div class="pure-u-1 pure-u-md-1-3">
					<label for="state">Sport Pratiqué</label>
					<select id="state" class="pure-input-1-2">
						<option>Natation</option>
						<option>Tennis</option>
						<option>Foot-ball</option>
						<option>Running</option>
					</select>
				</div>
			</div>

			<label for="terms" class="pure-checkbox">
				<input id="terms" type="checkbox"> J'ai lu les conditions d'utilisations.
			</label>

			<button type="submit" name="btnSubmit" class="pure-button pure-button-primary">Submit</button>

			
			<?php if(!empty($errors))
			{ ?>
			<div class="errors">
				<?php 
				foreach ($errors as $value) {
					?> <li> <?= $value . "<br>";?></li>
					<?php } ?>
				</div>
				<?php } ?> 



			</fieldset>
		</form>
		<?php //var_dump($_SESSION ?>

	</div>

	<?php $this->stop('main_content') ?>