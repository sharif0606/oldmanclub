@extends('backend.layouts.app')
@section('content')
    <div>
        <h2>Admin Chat</h2>
        <div>
            <div id="chat-messages">
                @foreach ($chats as $chat)
                    <div>
                        <strong>{{ $chat->client?->first_name_en }}:</strong> {{ $chat->message }}
                    </div>
                @endforeach
            </div>
            <div>
                <form id="chat-form" action="{{ route('adminchat.store') }}" method="post">
                    @csrf
                    <select name="client_id" id="client_id">
                        <option value="">Select User</option>
                        @forelse($user as $u)
                            <option value="{{$u->id}}" {{ old('client_id')==$u->id?"selected":""}}>{{ $u->first_name_en}}</option>
                        @empty
                            <option value="">No Role found</option>
                        @endforelse
                    </select>
                    <input id="message" type="text" name="message" placeholder="Type your message...">
                    <button type="submit">Send</button>
                </form>
            </div>
        </div>
    </div>
    <script src="{{ asset('resources/js/bootstrap.js') }}"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var chatForm = document.getElementById('chat-form');
            var messageInput = document.getElementById('message');
            var chatMessages = document.getElementById('chat-messages');

            chatForm.addEventListener('submit', function (event) {
                event.preventDefault();

                var message = messageInput.value.trim();

                if (message !== '') {
                    axios.post('admin/chat', { message: message })
                        .then(function (response) {
                            console.log(response)
                        })
                        .catch(function (error) {
                            console.log(error);
                        });

                    messageInput.value = '';
                }
            });

            Echo.channel('chat')
                .listen('ChatEvent', function (event) {
                    console.log(event);

                    var messageDiv = document.createElement('div');
                    messageDiv.innerHTML = '<strong>' + event.client.first_name_en + ':</strong> ' + event.message;
                    chatMessages.appendChild(messageDiv);
                });
        });
    </script>
@endsection
