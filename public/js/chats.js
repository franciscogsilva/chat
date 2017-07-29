var username;

$(document).ready(function()
{
    username = $('#username').html();
    pullData();

    $(document).keyup(function(e) {
        if (e.keyCode == 13)
            sendMessage();
        else
            isTyping();
    });
});

function pullData()
{
    retrieveChatMessages();
    retrieveTypingStatus();
    setTimeout(pullData,3000);
}

function retrieveChatMessages()
{
    var _token = document.getElementsByName("_token")[0].value;

    $.ajax({
        method  : 'POST',
        url     : urlRetrieveChatMessages,
        data    : {username: username, _token:_token},
        success : function(data) {
            if (data.length > 0){
                $('#chat-window').append('<br><div>'+data+'</div><br>');
            }
        }
    });
}

function retrieveTypingStatus()
{
    var _token = document.getElementsByName("_token")[0].value;

    $.ajax({
        method  : 'POST',
        url     : urlRetrieveTypingStatus,
        data    : {username: username, _token:_token},
        success : function(data) {
            if (username.length > 0){
                $('#typingStatus').html(username+' is typing');
            }
            else{
                $('#typingStatus').html('');
            }
        }
    });
}

function sendMessage()
{
    var _token = document.getElementsByName("_token")[0].value;
    var text = $('#text').val();
    
    if (text.length > 0)
    {
        $.ajax({
            method  : 'POST',
            url     : urlSendMessage,
            data    : {text: text, username: username, _token:_token},
            success : function(data) {
                $('#chat-window').append('<br><div style="text-align: right">'+text+'</div><br>');
                $('#text').val('');
                notTyping();
            }
        });
    }
}

function isTyping()
{
    var _token = document.getElementsByName("_token")[0].value;

    $.ajax({
        method  : 'POST',
        url     : urlIsTyping,
        data    : {username: username, _token:_token}
    });
}

function notTyping()
{
    var _token = document.getElementsByName("_token")[0].value;
        
    $.ajax({
        method  : 'POST',
        url     : urlNotTyping,
        data    : {username: username, _token:_token}
    });
}