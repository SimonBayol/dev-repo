<?php $page = $_SESSION['page']; ?>
<div class="asidenav">
         
                    <ul class="nav nav-tabs nav-stacked overlaybackground colordarkgray" >
                        <li class=" <?php if($page['controller']=='Accueil'){ echo 'active' ;}?>" ><a  href="/Accueil">accueil<i class="icon icon-home pull-right"></i></a>
			</li>
			<li class=" <?php if($page['controller']=='Biographie' OR $page['controller']=='Direction' OR $page['controller']=='Chanteurs'){ echo 'active' ;}?>" ><a href="#"  class="ascenseur" >le choeur<i class="icon-chevron-down pull-right"></i></a>
				<ul id="ssmenu1" class="nav nav-pills nav-stacked" >
					<li class="onze"><a href="/Biographie">biographie</a></li>
					<li class="onze"><a href="/Direction">direction du choeur</a></li>
					<li class="onze"><a href="/Chanteurs">les chanteurs</a></li>
				</ul>
			</li>
			<li class=" <?php if($page['controller']=='Repertoire' OR $page['controller']=='by_siecle' OR $page['controller']=='archives'){ echo 'active' ;}?>" ><a href="#"  class="ascenseur" >répertoire<i class="icon-chevron-down pull-right"></i></a>
				<ul id="ssmenu2" class="nav nav-pills nav-stacked " >
                                    <li><a href="/Repertoire">répertoire complet</a></li>
                                    <li><a href="/Repertoire/programme">par programme</a></li>
				</ul>
			</li>
			<li class=" <?php if($page['controller']=='Medias'){ echo 'active' ;}?>" ><a href="#" class="ascenseur"  >médias<i class="icon-chevron-down pull-right"></i></a>
				<ul id="ssmenu3" class="nav nav-pills nav-stacked ">
					<li class="disabled"><a href="/Medias/videos">vidéos</a></li>
					<li><a href="/Medias/photos">photos</a></li>
				</ul>
			</li>
                        <li class=" <?php if($page['controller']=='productions'){ echo 'active' ;}?>" ><a href="#" class="ascenseur"   >productions<i class="icon-chevron-down pull-right"></i></a>
				<ul id="ssmenu4" class="nav nav-pills nav-stacked ">
				<?php
                                $dao=new \dao\MySqlDao;
                                $allprod = $dao->getAllProduction();
                                    foreach($allprod as $prod){
                                ?>
					<li><a href="/Productions/production/<?php echo $prod ?>"><?php echo $prod; ?></a></li>
                                <?php
                                }
                                ?>
				</ul>
			</li>
                        <li class=" <?php if($page['controller']=='Concerts' ){ echo 'active' ;}?>" ><a href="#" class="ascenseur"   >concerts<i class="icon-chevron-down pull-right"></i></a>
			
				<ul id="ssmenu5" class="nav nav-pills nav-stacked ">
					<li><a href="/Concerts/a_venir">à venir</a></li>
					<li><a href="/Concerts/archive">archives</a></li>
				</ul>
			
			<li class=" <?php if($page['controller']=='Contacts' || $page['controller']=='Recrutement'){ echo 'active' ;}?>" ><a href="#" class="ascenseur"   >contacts<i class="icon-chevron-down pull-right"></i></a>
				<ul id="ssmenu6" class="nav nav-pills nav-stacked ">
					<li><a href="/Contacts">nous contacter</a></li>
					<li><a href="/Recrutement">recrutement</a></li>
				</ul>
                        </li>
		</ul>
	
   </div>