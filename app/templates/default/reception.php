<?php $this->layout('layout', ['title' => 'Accueil']) ?>

<?php $this->start('main_content') ?>



<h1 id="receptionh1">Mes Messages</h1>
<div class="container" id="containeurReception">
	<div id="listeMessage">
		<?php foreach ($resultat as $key => $value) : ?>

			<a href="#"><li><?=  $value['id_partenaire']?></li></a> 
		<?php endforeach; ?>
	</div>

	<div id="afficheMessage">

		<div>
			Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
			tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
			quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
			consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
			cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
			proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
		</div>

		<article>
			Lorem ipsum dolor sit amestias, quasi eos nihil! Impedit vero quis assumenda, porro  vitae iusto natus. Omnis eum quam explicabo, alias.
		</article>

		<form action="#" method="POST" class="pure-form pure-form-aligned">

			<textarea name="sendMessage" id="sendMessageId" rows="3" ></textarea>

			<button type="submit" name="btnEnvoiMessage" class="pure-button pure-button-primary">Envoyer un message</button>

		</form>
	</div>

</div>
<pre>
	<?php print_r($resultat); ?>
</pre>

<?php $this->stop('main_content') ?>