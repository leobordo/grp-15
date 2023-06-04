/* FUZNIONI PROF PER FORM VALIDATION
function getErrorHtml(elemErrors) {
    if ((typeof (elemErrors) === 'undefined') || (elemErrors.length < 1))
        return;
    var out = '<ul class="errors">';
    for (var i = 0; i < elemErrors.length; i++) {
        out += '<li>' + elemErrors[i] + '</li>';
    }
    out += '</ul>';
    return out;
}

function doElemValidation(id, actionUrl, formId) {

    var formElems;

    function addFormToken() {
        var tokenVal = $("#" + formId + " input[name=_token]").val();
        formElems.append('_token', tokenVal);
    }

    function sendAjaxReq() {
        $.ajax({
            type: 'POST',
            url: actionUrl,
            data: formElems,
            dataType: "json",
            error: function (data) {
                if (data.status === 422) {
                    var errMsgs = JSON.parse(data.responseText);
                    $("#" + id).parent().find('.errors').html(' ');
                    $("#" + id).after(getErrorHtml(errMsgs[id]));
                }
            },
            contentType: false,
            processData: false
        });
    }
    
    var elem = $("#" + id);
    if (elem.attr('type') === 'file') {
    // elemento di input type=file valorizzato
        if (elem.val() !== '') {
            inputVal = elem.get(0).files[0];
        } else {
            inputVal = new File([""], "");
        }
    } else {
        // elemento di input type != file
        inputVal = elem.val();
    }
    formElems = new FormData();
    formElems.append(id, inputVal);
    addFormToken();
    sendAjaxReq();

}

function doFormValidation(actionUrl, formId) {

    var form = new FormData(document.getElementById(formId));
    $.ajax({
        type: 'POST',
        url: actionUrl,
        data: form,
        dataType: "json",
        error: function (data) {
            if (data.status === 422) {
                var errMsgs = JSON.parse(data.responseText);
                $.each(errMsgs, function (id) {
                    $("#" + id).parent().find('.errors').html(' ');
                    $("#" + id).after(getErrorHtml(errMsgs[id]));
                });
            }
        },
        success: function (data) {
            window.location.replace(data.redirect);
        },
        contentType: false,
        processData: false
    });
}
*/
function confermaElimina() {
    var nomeSito = "My little coupony";
    var conferma = window.confirm(nomeSito + ' dice: Sei sicuro di voler eliminare l\' azienda?');
    return conferma;
    }
function confermaEliminazioneCl() {
        var nomeSito = "My little coupony";
        var conferma = window.confirm(nomeSito + ' dice: Sei sicuro di voler eliminare il cliente?');
        return conferma;
    }
function mostraNascondiRisposta(id) {
                
        var risposta = document.getElementById(id);
        if (risposta.style.display === "none") {
            risposta.style.display = "block";
        } else {
            risposta.style.display = "none";
        }
    }
function apriPopUpFaq() {
    var popup = document.getElementById("popupFaq");
    popup.style.display = "block";
    }
function apriPopUpMod(id,arg,dom,risp) {
        var idMod = id;
        var idArg =arg;
        var idDom= dom;
        var idRisp=risp
        
        
        var hiddenField = document.getElementById("name_id");
        
        hiddenField.value = idMod;
        var argomento = document.getElementById("argo");
        argomento.value= idArg;
        var domanda = document.getElementById("domanda");
        domanda.value = idDom;
        var risposta = document.getElementById("risposta");
        risposta.value=idRisp
       
        
        

        var popup = document.getElementById("popupFaqMod");
        popup.style.display = "block";
    }
function annullaPopUp() {
    var popup = document.getElementById("popupFaq");
    popup.style.display = "none";
    }
function annullaPopUpMod() {
    var popup = document.getElementById("popupFaqMod");
    popup.style.display = "none";
    }
function confermaEliminazioneOp() {
        var nomeSito = "My little coupony";
        var conferma = window.confirm(nomeSito + ' dice: Sei sicuro di voler eliminare l\'operatore?');
        return conferma;
    }
function openLink(event, url) {
        event.preventDefault(); // Impedisce il comportamento predefinito del click sul link
        window.open(url, '_blank'); // Apre il link in una nuova finestra o scheda

setTimeout(function() {
            location.reload(); // Aggiorna la pagina corrente
        }, 1000); // Ritardo di 1 secondo (puoi regolare il valore a tuo piacimento)
    } //possibile in AJAX?????
function confermaEliminazionePr() {
        var nomeSito = "My little coupony";
        var conferma = window.confirm(nomeSito + ' dice: Sei sicuro di voler eliminare la promozione?');
        return conferma;
        }
function scrollToElementPromo() {
            var element = document.getElementById("ricercaPromoStat").value;
            var scrollbar=document.getElementById(element);
            
            alert(element);
            if (element) {
            scrollbar.scrollIntoView({ behavior: 'smooth' });
            }
        }
function scrollToElementCliente() {
            var element = document.getElementById("ricercaClientiStat").value;
            var scrollbar=document.getElementById(element);
            
            alert(element);
            if (element) {
            scrollbar.scrollIntoView({ behavior: 'smooth' });
            }
        }
function apriPopUp(id)
        {
            var elemento = document.getElementById(id);
            
            if (elemento.style.display === "none") {
            elemento.style.display = "inline-block";
        } else {
            elemento.style.display = "none";
        }
    }
function apriPopUpClienti(id)
        {
            var elemento = document.getElementById("s"+id);
            
            if (elemento.style.display === "none") {
            elemento.style.display = "inline-block";
        } else {
            elemento.style.display = "none";
        }
    }
function mostraAltrePromo() {
        var altrePromo = document.getElementById("altrePromo");
        var pulsante = document.getElementById("pulsanteAltrePromo");
        altrePromo.style.display = "block";
        pulsante.style.display = "none";
      }




