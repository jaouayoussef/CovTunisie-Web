function verif() {
    var errors="<ul>"
    var categorie=document.querySelector("#categorie").value
    if(categorie < 1 || categorie > 3) {
        errors+=("<li>Error!! categorie entre 1 et 3</li>")
    }


    if (errors !== "<ul>") {
        document.querySelector('#erreur').style.color = 'red';
        errors += "</ul>"
        document.getElementById('erreur').innerHTML = errors;
        return false;
    } 
    else { 
        return true;   
    }
}