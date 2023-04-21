function msgLenWarn(){
    var inputArea_uezenet = document.getElementById("inputArea_uezenet").value;
    var msgLenWarn = document.getElementById("msgLenWarn");
    if(inputArea_uezenet.length < 5){
        msgLenWarn.innerHTML = 'minimum 5 karakteres üezenet szükséges.'
    } else if(inputArea_uezenet.length >= 5 && inputArea_uezenet.length <= 4000) {
        var remaining = 4000 - inputArea_uezenet.length;
        msgLenWarn.innerHTML = remaining + ' (max 4000)'
    } else {
        msgLenWarn.innerHTML = 'Az üzenet túl hosszú! (max 4000)'
    }
}