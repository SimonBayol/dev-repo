<?php include VIEW.'top-layout.php' ; ?>
<h2>Archives des concerts</h2>
<ul class="unstyled">
<?php
foreach($concerts as $concert):
?>
    <li>
        <a href='/Concerts/consultation/<?php echo $concert->getId();?>' >
            <h3><?php echo $concert->getNom(); ?></h3>
            <div><?php echo $concert->getDate()->format('d/m/Y'); ?></div>
            <div><?php echo $concert->getDescription(); ?></div>
        </a>
    </li>
<?php
endforeach;
?>
</ul>
<?php include VIEW.'bottom-layout.php' ; ?>