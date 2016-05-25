<?php $this->layout('layout', ['title' => 'Accueil']) ?>

<?php $this->start('css') ?>

<link rel="stylesheet" href="<?= $this->assetUrl('/css/style.css') ?>">

<?php $this->stop('css') ?>

<?php $this->start('main_content') ?>



<h1 id="receptionh1">Mes Messages</h1>
<div class="container" id="containeurReception">
	<div id="listeMessage">
		<?php foreach($resultat as $value) : ?>
			<a class="chat" href="#" data-uid="<?= $value['id_user'] ?>" data-pid="<?= $value['id_partenaire'] ?>"><li><?=  $value['id_partenaire']?></li></a> 
		<?php endforeach; ?>
	</div>
	
	<div id="afficheMessage">

		<div id="affMessage">
			
		</div>

		<form action="#" method="POST" class="pure-form pure-form-aligned">

			<textarea name="sendMessage" id="sendMessageId" rows="3" ></textarea>

			<button type="submit" name="btnEnvoiMessage" class="pure-button pure-button-primary">Envoyer un message</button>

		</form>
	</div>

</div>
<pre>
	<?php //print_r($resultat); ?>
</pre>

<?php $this->stop('main_content') ?>

<?php $this->start('javascripts') ?>
<script>
//on fait un apel ajax quand le doc est chargé
$('.chat').on('click', function() {
	$this = $(this);
	var uid = $this.data('uid');
	var pid = $this.data('pid');

	$.ajax({
		url: 'http://localhost/onsport/public/messages',
		type: 'POST',
		//dataType: 'json',
		data: ({uid: uid, pid: pid})
	})
	.success(function(data) {
		$('#affMessage').text(data);
	});
});

</script>
<?php $this->stop('javascripts') ?>