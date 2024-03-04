@extends('user.layout.app')
@section('title','Shipping')
@section('content')
<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <h3>{{$shipping->shipping_title}}</h3>
            <table>
                <tr>
                    <th>Client Comment</th>
                    <th>Admin Comment</th>
                </tr>
                @foreach($shipping as $comment)
                <tr>
                    <td>{{$comment?->client_message}}</td>
                    <td>{{$comment?->user_message}}</td>
                </tr>
                @endforeach
            </table>
        </div>
    </div>
</div>
@endsection