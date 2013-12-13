<?php include VIEW.'top-layout.php' ; ?>
<h2>Les chanteurs</h2>
<strong>Soprano:</strong>
<ul>
<?php
foreach ($chanteurs['soprano'] as $chanteur):
?>
    <li><?php echo $chanteur; ?><?php if($chanteur->getFonction() != 'aucune'){ echo '' ;};?></li>
<?php
endforeach;
?>
</ul>
<strong>Alto:</strong>
<ul>
<?php
foreach ($chanteurs['alto'] as $chanteur):
?>
    <li><?php echo $chanteur; ?></li>
<?php
endforeach;
?>
</ul>
<strong>Tenor:</strong>
<ul>
<?php
foreach ($chanteurs['tenor'] as $chanteur):
?>
    <li><?php echo $chanteur; ?></li>
<?php
endforeach;
?>
</ul>
<strong>Basse:</strong>
<ul>
<?php
foreach ($chanteurs['basse'] as $chanteur):
?>
    <li><?php echo $chanteur; ?></li>
<?php
endforeach;
?>
</ul>
<?php include VIEW.'bottom-layout.php' ; ?>