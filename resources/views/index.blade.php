<!DOCTYPE html>
<html lang="en">
<head>
  <title>Chat Laravel Pusher | Edlin App</title>
  <link rel="icon" href="https://assets.edlin.app/favicon/favicon.ico"/>
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- JavaScript -->
  <script src="https://js.pusher.com/7.2/pusher.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
  <!-- End JavaScript -->

  <!-- CSS -->
  <link rel="stylesheet" href="{{asset('public/style.css')}}">
  <!-- End CSS -->

</head>

<body>
	<div class="chat">
		<div class="top">
		<img src="https://assets.edlin.app/images/rossedlin/03/rossedlin-03-100.jpg" alt="Avatar">
		<div>
		  <p>Ross Edlin</p>
		  <small>Online</small>
		</div>
		</div>
		
		<div class="messages">
			 @include('receive', ['message' => "Hey! What's up!  👋"])
		</div>
		
		<div class="bottom">
			<form>
				<input type="text" id="message" name="message" placeholder="Enter message..." autocomplete="off">
				<button type="submit"></button>
			</form>
		</div>
	</div>

</body>
	<script>
	var appUrl = "{{ config('app.url') }}";
	const pusher = new Pusher('{{config('broadcasting.connections.pusher.key')}}',{cluster:'ap2'});

	const channel = pusher.subscribe('public');
	//Receive Message
	channel.bind('chat',function(data){
		$.post(appUrl+"/receive",{
			_token:'{{csrf_token()}}',
			message:data.message
		})
		.done(function(res){
			console.log(res);
			$(".messages > .message ").last().after(res);
			$(document).scrollTop($(document).height());
		});
	});	
	//Broadcast Message
	
	$("form").submit(function(event){
		event.preventDefault();
		$.ajax({
			url:appUrl+"/broadcast",
			method:'POST',
			headers:{
				'X-Socket-Id': pusher.connection.socket_id
			},
			data:{
				_token:'{{csrf_token()}}',
				 message: $("form #message").val(),
			}
		}).done(function(res){
			console.log(res);
			$(".messages > .message ").last().after(res);
			$("form #message").val('');
			$(document).scrollTop($(document).height());
		});
	});
	</script>
</html>