<?php include VIEW.'top-layout.php' ; ?>
<form  action='index.php?page=contacts' method='post' class="well ">
    <div class="row">
        <div class="span3">
            <label>Prénom / First Name</label>
            <input type="text" class="span3" placeholder="ex: Henry">
            <label>Nom / Last Name</label>
            <input type="text" class="span3" placeholder="ex: Purcell">
            <label>Adresse mail / Email adress</label>
            <input type="text" class="span3" placeholder="ex henry.purcell@baroque.uk">
            <label>Sujet&nbsp;/&nbsp;Subject
            <select id="subject" name="subject" class="span3">
            <option value="na" selected="">Choisissez/Choose:</option>
            <option value="information">Informations</option>
            <option value="Recrutement">Recrutement</option>
            <option value="autre">Autre</option>
            </select>
            </label>
        </div>
        <div class="span3 offset1">
                <button type="submit" class="btn btn-primary pull-right">Envoyer / Send</button>
        </div>
    </div>
    <div class="row">
        <div class="span7">
            <label>Message</label>
            <textarea name="message" id="message" class="input-xlarge span7" rows="10" style="resize:none !important;"  ></textarea> <!--todo mettre le style="resize :none" dans le css-->
        </div>
    </div>
</form>
<?php include VIEW.'bottom-layout.php' ; ?>