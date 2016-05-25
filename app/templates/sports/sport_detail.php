<?php $this->layout('layout', ['title' => $sinfo[0]["nom"]]) ?>

<?php $this->start('css') ?>

<link rel="stylesheet" href="<?= $this->assetUrl('/css/sport.css') ?>">

<?php $this->stop('css') ?>

<?php 

$this->start('nav');

include '../app/templates/partials/nav.php';

$this->stop('nav');

?>



<?php $this->start('main_content') ?>

<div class="container">
	<div class="row">
		<div class="col-lg-12 text-center">
			<h2 class="section-heading"><?=  $sinfo[0]["nom"] ;?></h2>
			<h3 class="section-subheading text-muted">Voici nos joueurs</h3>
		</div>
	</div>
</div>

<pre>
	<?php print_r($sportifs) ; ?>
</pre>

<?php if (!empty($sportifs)) : ?>
	<div class="container center-flex">
		<? foreach ($sportifs as $key => $value) : ?>
		<div class="col-lg-8">
			<div class="row sport_list">
				<div class="col-lg-6">
					<a href="#"><h2 class=""><?= $value['username'] ?> </h2></a>
					<p> <?= $value['prenom']." ".$value['nom']?> </p>
					<p> <?= $value['ville']." ".$value['cp'] ?> </p>
				</div>
				<div class="col-lg-5 center-flex">
					<p> <?= $value['disponibilite'] ?></p>
					<a href="" class="btn btn-primary">Contacter</a>
				</div>
			</div>
		</div>
	<? endforeach ; ?>
<?php endif ; ?>
</div>




<?php $this->stop('main_content') ?>


<?php $this->start('script') ?>


<script src="<?= $this->assetUrl('/js/main.js') ?>"></script>


<?php $this->stop('script') ?>


