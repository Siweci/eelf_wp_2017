jQuery(function($) {
    
    modifyTable();

    $("#send-message-button").click(sendMessage);
    
    
    
    
    function modifyTable() {
        
        /**
         * Modifie le markup des tableaux
         */
        
        $(".single-activites").find("table").addClass("table");
        $(".content > table").wrap("<div class='table-responsive'></div>");
    }
    
    
    
    function sendMessage(e) {
        e.preventDefault();
        
        var form = $(this).closest("form");
        var settings = {};
        
        var datas = getDatasForms(form, settings);
        
        // reset message center
        $("#message-center").removeClass().empty();
        
        console.log("datas");
        console.log(datas);
        
        // Si un robot a été pris dans le pot de miel
        if (datas.email) {
//            form[0].reset();
            $("#message-center").addClass("alert alert-success").text("Votre message a bien été envoyé");
            return;
        }
        
        
        datas.action = "send_message";
        
        // swap email and imerle
        swapParams(datas, "imerle", "email");
        
        var defSendMessage = sendDatas(datas);
        
        defSendMessage.then(function(r) {
            console.log("r_def");
            console.log(r);
            
            var options = {
                localButtonCloseCss : {
                    "position": "absolute",
                    "top": "3px",
                    "right": "9px"
                }
            };
            
            if (r.success) {
                
                var msg = "Merci de votre intérêt, votre message a bien été envoyé";
                var classe = "alert alert-success";
                
                $("#send-message-button").attr("disabled", "disabled");
                
            } else {
                
                var msg = "Désolé, une erreur s'est produite. Merci d'essayer plus tard.";
                var classe = "alert alert-danger";
                
            }
            
            showMessages(form, msg, classe, options);
        });
    }
    
    
    
    function sendDatas(datas, json = true) {
        
        /**
         * 
         */
        
        var def = $.Deferred();
        
        $.post(
                ajaxurl,
                {
                    datas: datas,
                    action: 'frontMain'
                },
                function (result) {
                    
                    if (json) {
                        
                        try {
                            
                            def.resolve ( JSON.parse(result) );
                            
                        } catch(e) {
                            
                            console.log("error formating data from sendDatas");
                            
                            def.resolve ( result );
                            
                        }
                        
                        
                    } else {
                        
                        def.resolve ( result );
                        
                    }
                    
                }
        );
        
        return def.promise();
    }

});