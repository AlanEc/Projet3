function toggleForm(idCommentaire){
    var formulaire = document.getElementById('formulaire-' + idCommentaire);
    if(formulaire.style.display == 'none') {
        formulaire.style.display = 'block';
    } else {
        formulaire.style.display = 'none';
    }

}