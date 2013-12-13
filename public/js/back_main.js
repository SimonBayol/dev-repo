jQuery().ready(function(){
    $('#resetChanteur').click(function(){
        $('#idChanteur').val('');
        $('#submitChanteur').text('');
        $('#submitChanteur').append('<i class="icon icon-plus icon-white"></i> Ajouter');
    });
    $('#input_wysiwyg').cleditor();
});
updateChanteur = function(id){
    chanteur = $('#chanteur_'+id).val();
    chanteur = jQuery.parseJSON(chanteur);
    $('#idChanteur').val(chanteur['id']);
    $('#nomChanteur').val(chanteur['nom']);
    $('#prenomChanteur').val(chanteur['prenom']);
    $('#tessitureChanteur').val(chanteur['tessiture']);
    $('#fonctionChanteur').val(chanteur['fonction']);
    $('#submitChanteur').text('');
    $('#submitChanteur').append('<i class="icon icon-pencil icon-white"></i> Modifier le chanteur');
};
updateChant = function(id){
    chant = $('#chant_'+id).val();
    chant = jQuery.parseJSON(chant);
    $('#idChant').val(chant['id']);
    $('#titreChant').val(chant['titre']);
    $('#compositeurChant').val(chant['compositeur']);
    $('#programmeChant').val(chant['repertoireId']);
    $('#submitChanteur').text('');
    $('#submitChanteur').append('<i class="icon icon-pencil icon-white"></i> Modifier le chant');
};

