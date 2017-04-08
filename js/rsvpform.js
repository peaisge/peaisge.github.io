$(document).ready(function () {
    $("#rep").click(function(){
        $("#formulaire").toggle();
    });

    var nb = 1;
    $("#plus").click(function(){
        nb++;
        $("#nbguests").val(nb);
        $("#nbguests-cache").val(nb);
        $("#zone-dyn-form").append(
                "<br><br>\n\
                 <div class='instance-reponse'>\n\
                    <p>                \n\
                        <label for='nom-"+nb+"' class='left'>Nom :</label>\n\
                        <input name='nom[]' id='nom-"+nb+"' type='text' size='30' maxlength='30' />\n\
                    </p>            \n\
                    <p>\n\
                        <label for='prenom-"+nb+"' class='left'>Prénom :</label>\n\
                        <input name='prenom[]' id='prenom-"+nb+"' type='text' size='30' maxlength='30' />\n\
                    </p>            \n\
                    <p>\n\
                        <label for='age-"+nb+"' class='left'>Âge :</label>\n\
                        <input name='age[]' id='age-"+nb+"' type='number' min='1' max='17' />\n\
                    </p>\n\
                    <p>\n\
                        <label class='left'>Je serai présent :</label>\n\
                        <input name='mairie[]' type='checkbox' />\n\
                        <label for='mairie'>Mairie</label>\n\
                        <input name='messe[]' type='checkbox' />\n\
                        <label for='messe'>Messe</label>\n\
                        <input name='diner[]' type='checkbox' />\n\
                        <label for='diner'>Dîner</label>\n\
                        <input name='brunch[]' type='checkbox' />`\n\
`                       <label for='brunch'>Brunch</label>\n\
                    </p>\n\
                    <p>\n\
                        <label for='alimentation-"+nb+"' class='left'>Restrictions alimentaires :</label>\n\
                        <select name='alimentation[]' id='alimentation-"+nb+"'>\n\
                            <option value='aucune'>Aucune</option>\n\
                            <option value='vegetarien'>Végétarien</option>\n\
                            <option value='sansporc'>Sans porc</option>\n\
                            <option value='halal'>Halal</option>\n\
                            <option value='autre'>Autre (préciser)</option>\n\
                        </select>\n\
                    </p>\n\
                    <p>\n\
                       <label class='left'>Styles de musique souhaités :</label>\n\
                       <input name='disco[]' type='checkbox' />\n\
                       <label for='disco'>Disco</label>\n\
                       <input name='variete[]' id='variété' type='checkbox' />\n\
                       <label for='variété'>Variété française</label>\n\
                       <input name='pop[]' id='pop' type='checkbox' />\n\
                       <label for='pop'>Pop actuelle</label>\n\
                       <input name='classique[]' id='classique' type='checkbox' />\n\
                       <label for='classique'>Danse classique</label>\n\
                       <input name='house[]' id='house' type='checkbox' />\n\
                       <label for='house'>Deep house</label>\n\
                       <input name='rock[]' id='rock' type='checkbox' />\n\
                       <label for='rock'>Rock</label>\n\
                       <input name='autre[]' id='autre' type='checkbox' />\n\
                       <label for='autre'>Autre (préciser)</label>\n\
                    </p>        \n\
                </div>");
    });
    
    $("#moins").click(function(){
        nb--;
        $("#nbguests").val(nb);
        $("#nbguests-cache").val(nb);
        $(".instance-reponse:last-child").remove();
    });
})
        ;