<?php include VIEW.'top-layout.php' ; ?>
<h3><?php echo $recrutement->getTitre() ; ?></h3>
<p><?php echo $recrutement->getContenu() ; ?></p>
<div>
    <h4>Nous recrutons actuellement:</h4>
    <ul class="">
<?php 
$table = $recrutement->getDetail();
	for($i=0;$i<sizeof($table);$i++) // sizeof() renvoie le nombre d'éléments du tableau
	{
		if($table[$i]!=0){
			switch($i)
			{
				case 0: 
					echo '<li><strong>'.$table[$i].'</strong>&nbsp;Soprano'.'</li>';
					break;
				case 1: 
					echo '<li><strong>'.$table[$i].'</strong>&nbsp;Alto'.'</li>';
					break;
				case 2: 
					echo '<li><strong>'.$table[$i].'</strong>&nbsp;Tenor'.'</li>';
					break;
				case 3: 
					echo '<li><strong>'.$table[$i].'</strong>&nbsp;Basse'.'</li>';
				break;
				 default:
				echo "Nous ne recherchons pas de chanteur pour l'instant.";
			}

		}
	} 
?>
    </ul>
    
</div>
<?php

?>
<?php include VIEW.'bottom-layout.php' ; ?>