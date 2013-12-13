<?php include(BACK_DIR.'back_top-layout.php'); ?>
<?php // var_dump($repertoire) ; ?>
<div class="row-fluid">
    <div class="span12" >
    <h2>Modification du repertoire :</h2>
        <table class="table table-hover">
                    <tr >
                        <th>Titre :</th>
                        <th>Compossiteur :</th>
                        <th>Repertoire :</th>
                        <th>Action :</th>
                    </tr>
                <?php foreach ($repertoire as $chant): ?>
                <tr>
                    <td><?php echo $chant->getTitre(); ?></td>
                    <td><em><?php echo $chant->getCompositeur()?></em></td>
                    <td><strong><?php echo $chant->getRepertoire()?></strong></td>
                    <td>
                        <span class="label label-info" style="cursor:pointer !important;" onClick="updateChant(<?php echo $chant->getId() ; ?>);" ><i class="icon icon-pencil icon-white"></i></span>
                        <input type='hidden' value ='<?php echo $chant->toJsonArray()?>' id='chant_<?php echo $chant->getId() ; ?>'>
                        <a href="/backOffice/delete_chant/<?php echo $chant->getId() ; ?>">
                            <span class="label label-important"><i class="icon icon-remove icon-white"></i></span>
                        </a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </table>
          <form enctype="multipart/form-data" action="/BackOffice/repertoire" method="POST" class='form-actions'>
            <h4>Ajouter ou modifier un chant:</h4>
            <input type='text' placeholder="titre" name="titre" id='titreChant' class='input-xlarge'>
            <input type='text' placeholder="compositeur" name="compositeur" id='compositeurChant' class='input-xxlarge'>
            <br>
            <label for ='programmeChant'>Programme(s):</label>
            <select name='programme[]' id='programmeChant' multiple>
                <option value='aucun'>(aucun programme)</option>
                <?php foreach ($productions as $prod) : ?>
                <option value='<?php echo $prod['id']; ?>'><?php echo $prod['nom']; ?></option>
               <?php endforeach ; ?>
            </select>
            <input type ="hidden" name="id" value="" id='idChant'>
            <br><br>
            <button type="reset" class="btn btn-inverse" id='resetChanteur'><i class="icon icon-refresh icon-white"></i> Annuler</button>
            <button type="submit" class="btn btn-success" id='submitChanteur' ><i class="icon icon-plus icon-white"></i> Ajouter</button>
       </form>  
    </div>
</div>
<?php include(BACK_DIR.'back_bottom-layout.php'); ?>