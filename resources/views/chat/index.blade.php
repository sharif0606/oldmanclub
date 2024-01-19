
    <div id="app">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Chat Interface</div>
                    <div class="card-body">
                        <div id="chat-messages">
                            <ul>
                                @foreach($chats as $chat)
                                    <li>
                                        @if($chat->user_id)
                                            <strong>{{ $chat->user->name }}</strong>:
                                        @elseif($chat->client_id)
                                            <strong>{{ $chat->client->first_name_en }}</strong>:
                                        @endif
                                        {{ $chat->message }}
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                        <div>
                            <input type="text" v-model="message" @keyup.enter="sendMessage" class="form-control" placeholder="Type your message...">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="{{ asset('js/app.js') }}"></script>
