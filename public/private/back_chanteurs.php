<?php include(BACK_DIR.'back_top-layout.php'); ?>
<div class="row-fluid">
    <div class="span12" >
    <h2>Modification de la liste de chanteurs :</h2>
    
        <form enctype="multipart/form-data" action="/BackOffice/chanteurs" method="POST" class='form-inline'>
            <input type='text' placeholder="prénom" name="prenom" id='prenomChanteur'>
            <input type='text' placeholder="nom" name="nom" id='nomChanteur'>
            <select name='tessiture' id='tessitureChanteur'>
                <option value='soprano'>Soprano</option>
                <option value='alto'>Alto</option>
                <option value='tenor'>Tenor</option>
                <option value='basse'>Basse</option>
            </select>
            <input type='text' placeholder="fonction (optionel)" name="fonction" id='fonctionChanteur'>
            <input type ="hidden" name="id" value="" id='idChanteur'>
            <button type="reset" class="btn btn-inverse" id='resetChanteur' ><i class="icon icon-refresh icon-white"></i> Annuler</button>
            <button type="submit" class="btn btn-success" id='submitChanteur' ><i class="icon icon-plus icon-white"></i> Ajouter</button>
       </form>  
            <?php
            foreach ($chanteurs as $key => $pupitre):
            ?>
            
            <div class="alert alert-info">
                <h4><?php echo $key ; ?> :</h4>
            <ul>
                
                <?php
                foreach ($pupitre as $chanteur):
                ?>
                <li>
                    <?php echo $chanteur; ?><?php if($chanteur->getFonction() != 'aucune'){echo "<em>(".$chanteur->getFonction().")</em>";}else{ echo '' ;} ?>
                    
                    <span class="label label-info" style="cursor:pointer !important;" onClick="updateChanteur(<?php echo $chanteur->getId() ; ?>);" ><i class="icon icon-pencil icon-white"></i></span>
                    <input type='hidden' value ='<?php echo $chanteur->toJsonArray()?>' id='chanteur_<?php echo $chanteur->getId() ; ?>'>
                    <a href="/backOffice/delete_chanteur/<?php echo $chanteur->getId() ; ?>">
                        <span class="label label-important"><i class="icon icon-remove icon-white"></i></span>
                    </a>
                </li>
                <?php
                endforeach;
                ?>
            </ul>
          </div>
            <?php
            endforeach;
            ?>
    </div>
</div>
<?php include(BACK_DIR.'back_bottom-layout.php'); ?>