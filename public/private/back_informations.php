<?php include(BACK_DIR.'back_top-layout.php'); ?>
<div class="row-fluid">
    <div class="span12" >
    <h2>Modification des informations : <em><?php echo $name ; ?></em></h2>
        <form enctype="multipart/form-data" action="/BackOffice/informations/<?php echo $name ; ?>" method="POST" class='form-inline'>
            <input type="submit" value='Modifier' class="btn btn-warning btn-large pull-right" >
            <input type="hidden" value="<?php echo $article->getImage();  ?>" name="image" >
            <div class="control-group">
                <label for="text">Titre :</label>
                <input id="text" type="text" name="titre" value="<?php echo $article->getTitre();  ?>">
            </div>
            <div class="control-group">
                <label for="images">Images :</label>
                <select id="images" name="image" >
                    <?php foreach ($images['photos'] as $image) : ?>
                        <option value="<?php echo $image->getUrl(); ?>"><?php echo $image->getUrl(); ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="control-group">
                <label for="input_wysiwyg">Contenu :</label>
                <textarea id="input_wysiwyg" name="contenu" style="width:100%;height:400px;"><?php echo $article->getTexte();  ?></textarea>
            </div>

        </form>
    </div>
</div>
<?php include(BACK_DIR.'back_bottom-layout.php'); ?>