@extends('user.layout.app')

@section('content')
    <div>
        <h2> User Chat</h2>
        <div>
            <div id="chat-messages">
                @foreach ($chats as $chat)
                    <div>
                        <strong>{{ $chat->user?->name_en }}:</strong> {{ $chat->message }}
                    </div>
                @endforeach
            </div>
            <div>
                <form id="chat-form" action="{{route('userchat_store') }}" method="post">
                    @csrf
                    <input id="message" type="text" name="message" placeholder="Type your message...">
                    <button type="submit" class="btn btn-primary">Send</button>
                </form>
            </div>
        </div>
    </div>

    <script src="{{ asset('js/bootstrap.js') }}"></script>
    
<script>
    document.addEventListener('DOMContentLoaded', function () {
        var chatForm = document.getElementById('chat-form');
        var messageInput = document.getElementById('message');
        var chatMessages = document.getElementById('chat-messages');

        chatForm.addEventListener('submit', function (event) {
            event.preventDefault();

            var message = messageInput.value.trim();

            if (message !== '') {
                axios.post('/user/chat', { message: message })
                    .then(function (response) {
                        console.log(response)
                    })
                    .catch(function (error) {
                        console.log(error)
                    });

                messageInput.value = '';
            }
        });

        Echo.channel('chat')
            .listen('ChatEvent', function (event) {
                console.log(event);
                var messageDiv = document.createElement('div');
                messageDiv.innerHTML = '<strong>' + event.user.name_en + ':</strong> ' + event.message;
                chatMessages.appendChild(messageDiv);
            });
    });
</script>

@endsection
