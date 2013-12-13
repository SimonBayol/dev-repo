<?php include VIEW.'top-layout.php' ; ?>
    <?php
foreach ($programme as $key=> $value):
?>
<?php echo $key; ?>
<ul>
<?php
foreach ($value as $chant):
?>
    <li><?php echo $chant; ?></li>
<?php
endforeach;
?>
</ul>
<?php
endforeach;
?>
<?php include VIEW.'bottom-layout.php' ; ?>