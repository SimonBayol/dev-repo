<?php 
$dao = new \dao\MySqlDao;
$fonds = $dao->getAllBackgrounds();
if(isset($fonds) && $fonds!=NULL)
{
	foreach($fonds as $n)
	{
		$chemins[] = $n->getUrl();	
	}
	$chemin = $chemins[mt_rand(0, (sizeof($chemins)-1 ))];	
?>
<img id="bgimg" src='/images/photos/<?php echo $chemin; ?>' alt='<?php echo $chemin; ?>' />
<?php
}
?>
