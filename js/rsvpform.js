$(document).ready(function() {
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
                        <input name='nom-"+nb+"' id='nom-"+nb+"' type='text' size='30' maxlength='30' />\n\
                    </p>            \n\
                    <p>\n\
                        <label for='prenom-"+nb+"' class='left'>Prénom :</label>\n\
                        <input name='prenom-"+nb+"' id='prenom-"+nb+"' type='text' size='30' maxlength='30' />\n\
                    </p>            \n\
                    <p>\n\
                        <label for='age-"+nb+"' class='left'>Âge :</label>\n\
                        <input name='age-"+nb+"' id='age-"+nb+"' type='number' min='1' max='117' />\n\
                    </p>\n\
                    <p>\n\
                        <label for='alimentation-"+nb+"' class='left'>Restrictions alimentaires :</label>\n\
                        <select name='alimentation-"+nb+"[]' id='alimentation-"+nb+"'>\n\
                            <option value='Aucune'>Aucune</option>\n\
                            <option value='Végétarien'>Végétarien</option>\n\
                            <option value='Sans porc'>Sans porc</option>\n\
                            <option value='Halal'>Halal</option>\n\
                        </select>\n\
                    </p>\n\
                    <p>\n\
                       <label for='musique-"+nb+"' class='left'>Styles de musique souhaités :</label>\n\
                        <select name='musique[]"+nb+"' id='alimentation-"+nb+"'>\n\
                            <option value='Disco'>Disco</option>\n\
                            <option value='Variété française'>Variété française</option>\n\
                            <option value='Pop'>Pop</option>\n\
                            <option value='Deep house'>Deep house</option>\n\
                            <option value='Rock'>Rock</option>\n\
                        </select>\n\
                    </p>        \n\
                </div>");
    });
    
    $("#moins").click(function(){
        nb--;
        $("#nbguests").val(nb);
        $("#nbguests-cache").val(nb);
        $(".instance-reponse:last-child").remove();
    });
});