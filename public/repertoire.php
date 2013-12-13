<?php include VIEW.'top-layout.php' ; ?>
Repertoire:
<ul>
<?php
foreach ($chants as $chant):
?>
    <li><?php echo $chant; ?></li>
<?php
endforeach;
?>
</ul>
<?php include VIEW.'bottom-layout.php' ; ?>