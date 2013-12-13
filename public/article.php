<?php include VIEW.'top-layout.php' ; ?>
<h2><?php echo $article->getTitre(); ?></h2>
<?php if($_SESSION['page']['controller'] == 'Accueil') : ?>
<a href="<?php echo $article->getImageFull(); ?>"><img src="<?php echo $article->getImageFull(); ?>" class="affiche-accueil"></a>
<?php else: ?>
<a href="<?php echo $article->getImageFull(); ?>"><img src="<?php echo $article->getImageFull(); ?>" class="affiche-concert"></a>
<?php endif; ?>
<br>
<!--<p class="article" >-->
    <?php echo $article->getTexte(); ?>
<!--</p>-->
<?php include VIEW.'bottom-layout.php' ; ?>