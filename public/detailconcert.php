<?php include VIEW.'top-layout.php' ; ?>
<?php
foreach($concerts as $concert):
?>
<h2><?php echo $concert->getNom(); ?></h2>
    <table class="table-condensed" style="width:100%">
        <tr>
            <td colspan=2 >
                <center>
                <img width="400" src="/images/photos/photo_arthemys_<?php echo $concert->getAffiche(); ?>" class="affiche-concert">
                </center>
            </td>
        </tr>
        <tr>
            <td>Le :</td><td><?php echo $concert->getDate()->format('d/m/Y'); ?></td> 
        </tr>
        <tr>
            <td>Adresse :</td><td><?php echo $concert->getAdresse(); ?></td> 
        </tr>
        <tr>
            <td>Entrée :</td><td><?php if($concert->getTarif()!=NULL ){echo $concert->getTarif()." €";}else{ echo 'Gratuite';} ?></td> 
        </tr>
        <tr>
            <td>Description :</td><td><?php echo $concert->getDescription(); ?></td> 
        </tr>
    </table>
<?php
endforeach;
?>
<?php include VIEW.'bottom-layout.php' ; ?>