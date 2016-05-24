<?php $this->layout('layout', ['title' => 'login']) ?>

<?php $this->start('css') ?>

    <link rel="stylesheet" href="<?= $this->assetUrl('css/sport.css') ?>">

<?php $this->stop('css') ?>

<?php
$this->start('nav');

    include '../app/templates/partials/nav.php';

$this->stop('nav');

?>

<?php $this->start('main_content') ?>


<div id="navbar" class="navbar-collapse collapse">
	
	<?php if(!isset($_SESSION['user']))
	{ ?>
	<form class="navbar-form navbar-right" method="POST" action="<?= $this->url('login')?>">

		<div class="form-group">
			<input type="text" placeholder="Email" name="emailLogin" class="form-control">
		</div>
		<div class="form-group">
			<input type="password" name="passwordLogin" placeholder="Password" class="form-control">
		</div>
		<button type="submit" class="btn btn-success" name="btnLogin">Login</button>
		<div id="inForm"> 
			<legend><a href="oubli">Mot de passe oublié ?</a></legend>
			<a class="btn btn-primary" href="inscription">S'inscrire</a></button>
		</div>

	</form> 

	<?php }else{?>
	<span id="bonjour">
		<?= "Bonjour " . $_SESSION['user']['username'];?>
	</span>
	<a href="<?= $this->url('logout')?>"><button class="btn btn-danger" name="btnLogout" >Deconnexion</button></a>

	<?php
}
?>
</div><!--/.navbar-collapse -->

    <!-- Selection de Sport -->
     <?php   include '../app/templates/partials/sports.php'; ?>


<?php $this->stop('main_content') ?>

