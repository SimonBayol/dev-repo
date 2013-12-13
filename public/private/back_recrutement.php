<?php include(BACK_DIR.'back_top-layout.php'); ?>
<div class="row-fluid">
    <div class="span12" >
        <h2>Modification du recrutement :</h2>
        <form enctype="multipart/form-data" action="/BackOffice/recrutement" method="POST" class='form-inline'>
            <input type="submit" value='Modifier le recrutement' class="btn btn-warning btn-large pull-right" >
            <input type='hidden' name='id' value='<?php echo $recrutement->getId(); ?>'>
            <input type='checkbox' name='urgence' id='urgence' value="1" checked class="checkbox">
            <label for='urgence'>&nbsp;<strong>Alerte au premier plan? </strong><em>(oui par défaut)</em></label>
            
            <br>
            <label for="input_wysiwyg"><strong>Texte :</strong></label>
            <textarea name="contenu" id="input_wysiwyg" style="width:100%;height:150px;margin-top: 20px;"><?php echo $recrutement->getContenu(); ?></textarea>
            <br><br>
            <table class="table table-condensed">
                <tr>
                    <th>Tessiture</th>
                    <th>Nb de chanteur recruté</th>
                </tr>
                <tr>
                    <td><label for="soprano">Soprano :</label></td>
                    <td><input id="soprano" type="number" name="soprano" value="<?php echo $detail[0];  ?>"></td>
                </tr>
                <tr>
                    <td><label for="alto">Alto :</label></td>
                    <td><input id="alto" type="number" name="alto" value="<?php echo $detail[1];  ?>"></td>
                </tr>
                <tr>
                    <td><label for="tenor">Tenor :</label></td>
                    <td><input id="tenor" type="number" name="tenor" value="<?php echo $detail[2];  ?>"></td>
                </tr>
                <tr>
                    <td><label for="basse">Basse :</label></td>
                    <td><input id="basse" type="number" name="basse" value="<?php echo $detail[3];  ?>"></td>
                </tr>
            </table>
        </form>
    </div>
</div>
<?php include(BACK_DIR.'back_bottom-layout.php'); ?>