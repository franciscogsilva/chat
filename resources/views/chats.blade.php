<!DOCTYPE html>
<html>
<head>
    <title>Chats</title>
    <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('css/chats.css')}}" rel="stylesheet">
</head>
<body>

    <div class="col-lg-4 col-lg-offset-4">
        <h1 id="greeting">Hello, <span id="username">{{ $username }}</span></h1>

        <div id="chat-window" class="col-lg-12">

        </div>
        <div class="col-lg-12">
            <div id="typingStatus" class="col-lg-12" style="padding: 15px"></div>
            {{ csrf_field() }}
            <input type="text" id="text" class="form-control col-lg-12" autofocus="" onblur="notTyping()">
        </div>
    </div>

    <script type="text/javascript" >
        var urlRetrieveChatMessages    = "{{ route('retrieveChatMessages') }}";
        var urlRetrieveTypingStatus    = "{{ route('retrieveTypingStatus') }}";
        var urlSendMessage             = "{{ route('sendMessage') }}";
        var urlIsTyping                = "{{ route('isTyping') }}";
        var urlNotTyping               = "{{ route('notTyping') }}";
    </script>
    <script src="{{asset('js/jquery-3.2.0.js')}}"></script>
    <script src="{{asset('js/chats.js')}}"></script>
</body>
</html>