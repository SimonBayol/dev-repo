<?php 
$page = $_SESSION['page'];

if($page['controller']=='Accueil'){ ?>
<ul class="nav nav-tabs">
    <li class="active"><a href="#">Choeur de Chambre Artnémys: accueil</a></li>
</ul>
<!--<p class="topmarge60"></p>-->
<?php } ?>
<?php if($page['controller']=='Biographie' OR $page['controller']=='Direction' OR $page['controller']=='Chanteurs'){ ?>
<ul class="nav nav-tabs">
    <li class="<?php if($page['controller']=='Biographie'){ echo 'active' ;}?>"><a href="/Biographie">biographie</a></li>
    <li class="<?php if($page['controller']=='Direction'){ echo 'active' ;}?>"><a href="/Direction">direction</a></li>
    <li class="<?php if($page['controller']=='Chanteurs'){ echo 'active' ;}?>"><a href="/Chanteurs">les chanteurs</a></li>
</ul>
<?php } ?>
<?php if($page['controller']=='Repertoire' ){ ?>
<ul class="nav nav-tabs">
    <li class="<?php if($page['controller']=='Repertoire' && $page['method']=='action'){ echo 'active' ;}?>"><a href="/Repertoire">répertoire complet</a></li>
    <li class="<?php if($page['controller']=='Repertoire' && $page['method']=='programme'){  echo 'active' ;}?>"><a href="/Repertoire/programme">par programme</a></li>
    
</ul>
<?php } ?>
<?php if($page['controller']=='Medias'){ ?>
<ul class="nav nav-tabs">
    <li class="disabled <?php if($page['method']=='videos'){ echo 'active' ;}?>"><a href="/Medias/videos">vidéos</a></li>
    <li class="<?php if($page['method']=='photos'){ echo 'active' ;}?>"><a href="/Medias/photos">photos</a></li>
</ul>
<?php } ?>
<?php if($page['controller']=='Productions'){ ?>
<ul class="nav nav-tabs">
    <?php
      $dao=new \dao\MySqlDao;
      $allprod = $dao->getAllProduction();
      foreach($allprod as $prod){
    ?>
    <li class="<?php if(isset($_GET['name'])){if($_GET['name']==$prod){ echo 'active' ;}}?>"><a href="/Productions/production/<?php echo $prod; ?>"><?php echo $prod; ?></a></li>
    <?php
      }
    ?>
</ul>
<?php } ?>
<?php if($page['controller']=='Concerts' ){ ?>
<ul class="nav nav-tabs">
    <li class="<?php if($page['method']=='a_venir'){ echo 'active' ;}?>"><a href="/Concerts/a_venir">à venir</a></li>
    <li class="<?php if($page['method']=='archive') { echo 'active' ;}?>"><a href="/Concerts/archive">archives</a></li>
    <?php if($page['method']=='consultation') : ?>
    <li class="active"><a href="#">détail du concert</a></li>
    <?php
    endif;
    ?>
</ul>
<?php } ?>
<?php if($page['controller']=='Contacts' || $page['controller']=='Recrutement'){ ?>
<ul class="nav nav-tabs">
    <li class="<?php if($page['controller']=='Contacts'){ echo 'active' ;}?>"><a href="/Contacts">nous contacter</a></li>
    <li class="<?php if($page['controller']=='Recrutement'){ echo 'active' ;}?>"><a href="/Recrutement">recrutement</a></li>
</ul>
<?php } ?>