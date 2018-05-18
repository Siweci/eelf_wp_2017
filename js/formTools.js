
function validForm(form, s) {
    
    jQuery("#message-center").html("");
        
    var valid = true;
    var error = [];

    error.push( "Merci de corriger les erreurs suivantes :" );

    error.push("<ul>");

    /* Vérifie que les champs required ne sont pas vides */
    form.find("input:required:not(:disabled), select:required:not(:disabled), textarea:required:not(:disabled)").each(function() {
        var $inp = jQuery(this);
        var $group = $inp.closest(".form-group");
        
        // reset
        resetFieldError($group);
        
        // supprime les espaces, les espaces insécables, les retours chariot
        var f = $inp.val().replace(/ |<p>&nbsp;<\/p>|\n|\r|(\n\r)/g,"");
        
        // teste la longueur de la chaîne filtrée
        var l = f.length;

        if (l === 0) {
            var name = $inp.attr("name");
            var label = jQuery("label[for = '" +name +"']").text();
            
            // supprime les ":" éventuels
            label = label.replace(" : ", "");

            
            // affiche le message d'erreur
            showFieldError($group, $inp, "Ce champ est obligatoire");
            
            error.push("<li>le champ " +label + " est obligatoire</li>");
            valid = false;
        }

    });

    // correspondance des emails
//    var error_email = checkEmail();
//    
//    if (error_email) {
//        valid = false;
//        error.push("<li>" +error_email +"</li>");
//    }


    error.push("</ul>");
    
    
    // prise en compte des résultats de jquery.validate()
//    if ( !form.valid() ) {
//        valid = false;
//    }
    
//    console.log(form.valid());
    
    /* Vérifie les emails */
    if (jQuery("#imerle").length != 0) {
        
        var $inp = jQuery("#imerle");
        var $group = $inp.closest(".form-group");

        // reset
        resetFieldError($group);

        var pattern = new RegExp( /^[+a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/i );
        if (!pattern.test($inp.val())) {

            // affiche le message d'erreur
            showFieldError($group, $inp, "Merci de vérifier le format de votre adresse email");

            valid = false;

        }
        
    }
    
    
        
    return valid;

}

function getDatasForms(f, s) {
    
    /**
     * @param {string} f Le nom du formulaire
     * @param {object} s pour settings
     * @returns {object} empty | toutes les données du formulaire
     * @type type
     */
        
    var datas = {};

    // teste les conditions de validation du formulaire
    // basic les champs required
    var valid = validForm(f, s);
    console.log(valid);
    if (!valid) return false;
                

    /* récupère les valeurs du formulaire */
    var input = getInputValues(f);
    var select = getSelectedValues(f);
    var textarea = getTextareaValues(f);
//    var hidden = getHiddenValues(f);

    // regroupe les valeurs dans un objet datas
    var datas = jQuery.extend({}, input, select, textarea);
    

    return datas;    
}; // getDatasForm


function getInputValues(form) {

    var input = {};
    
    jQuery(form).find("input:not(:disabled)").each(function(){
        var $inp = jQuery(this);
        
        var id = $inp.attr("name");
        var val = $inp.val().trim();

        input[id] = val;
    });

    return input;
}


function getSelectedValues(form) {

    var select = {};

    jQuery(form).find("select:not(:disabled)").each(function(){
        var $inp = jQuery(this);
        
        var id = $inp.attr("name");
        
        var id_val = id +"_val";
        var val = jQuery("option:selected", $inp).val();
        
        var id_txt = id +"_txt";
        var texte = jQuery("option:selected", $inp).text();
        

        select[id_val] = val;
        select[id_txt] = jQuery.trim(texte);

    });
    console.log("select");
    console.log(select);
    return select;
}


function getTextareaValues(form) {
    
    var textarea = {};
        
    form.find("textarea:not(:disabled)").each(function() {
        var $inp = jQuery(this);
        
        var id = $inp.attr("id");
        var val = $inp.val();
        
        val = jQuery.trim(val);
        val = val.replace(/\n/g,"<br/>");
        
        textarea[id] = val;
        
    });
    
    return textarea;
}

function resetFieldError($group) {
    $group.removeClass("has-error");
    $group.find(".field-message").remove();
}

function showFieldError($group, $inp, texte) {
    $group.addClass("has-error");
    
    jQuery("<span>", {
        class: "field-message text-danger",
        text: texte,
        style: "font-size: smaller"
    }).insertAfter($inp);
}

function showMessages(form, msg, classe, options) {
    
    
    var options = (typeof options !== 'undefined') ? options : {};
    
    var defaults = {
        messageCenterId: "#message-center",
        localButtonCloseCss: {
            "position": "absolute",
            "top": "0",
            "right": "18px"
        }
    };
    
    var o = jQuery.extend({}, defaults, options);
    
    
    
    var $messageCenter = jQuery(o.messageCenterId);
    
    if ($messageCenter.length === 1) {
        
        // reset
        $messageCenter
                .removeClass()
                .empty();
        
        // ajoute le message
        $messageCenter
                .addClass(classe)
                .text(msg)
                .css("margin-top: 15px");
        
        // ajoute le bouton close
        var localButtonClose = jQuery("<button>", {
            type: "button",
            class: "close",
            "data-dismiss": "alert",
            "aria-label": "Close"
        }).appendTo( jQuery($messageCenter) );
        
        jQuery("<span>", {
            "aria-hidden": "true",
            html: "&times"
        }).appendTo( jQuery(localButtonClose) );

        localButtonClose.css(o.localButtonCloseCss);
        
    } else {
        
        // fait un reset
        jQuery("#message-center").remove();
        
        
        // ajoute le message center au formulaire
        jQuery("<div>", {
            id: "message-center",
            class: "text-center " + classe,
            text: msg,
            css: {
                "position": "relative",
                "margin-top": "15px"                
            }
        }).appendTo(form);
        
        // ajoute le bouton close
        var localButtonClose = jQuery("<button>", {
            type: "button",
            class: "close",
            "data-dismiss": "alert",
            "aria-label": "Close"
        }).appendTo( jQuery("#message-center") );
        
        jQuery("<span>", {
            "aria-hidden": "true",
            html: "&times"
        }).appendTo( jQuery(localButtonClose) );

        localButtonClose.css(o.localButtonCloseCss);
    }
    
}