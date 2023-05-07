

var messagesCount = document.getElementsByClassName("theMessage").length -1;
var originalMsgs = [];
var msgsFolded = [];
for(var i = 1; i < messagesCount; i++){
    var e_id = "msg_" + i;
    var currentMsg = document.getElementById(e_id).innerHTML;
    originalMsgs.push(currentMsg);
    msgsFolded.push(false);
    if(currentMsg.length > 100){
        var shortMsg = currentMsg.substring(0,100)
        var btn = '<br> <a class="readerBtn" onclick="msgReader(' + i + ')" id="msgButton' + i + '">több...</a> ';
        document.getElementById(e_id).innerHTML = shortMsg + "..." + btn;
        msgsFolded[i] = true;
    }

    var ms = document.getElementById(e_id).innerHTML;
}

function msgReader(_messageNumber){
    if(msgsFolded[_messageNumber]){
        var e_id = "msg_" + _messageNumber;
        var btn = '<br> <a class="readerBtn" onclick="msgReader(' + _messageNumber + ')" id="msgButton' + _messageNumber + '">kevesebb...</a> ';
        document.getElementById(e_id).innerHTML = originalMsgs[_messageNumber-1] + btn;
        msgsFolded[_messageNumber] = false;
    } else {
        var e_id = "msg_" + _messageNumber;
        var btn = '<br> <a class="readerBtn" onclick="msgReader(' + _messageNumber + ')" id="msgButton' + _messageNumber + '">több...</a> ';
        document.getElementById(e_id).innerHTML = originalMsgs[_messageNumber-1].substring(0,100) + "..." + btn;
        msgsFolded[_messageNumber] = true;
    }
}