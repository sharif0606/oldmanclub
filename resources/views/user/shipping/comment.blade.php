@extends('user.layout.base')
@section('title','Shipping')
@section('content')
<div class="row">
    <div class="col-sm-6">
        <div class="card p-3">
            <h3>Shipping Title : {{$shipping->shippingdetail->shipping_title}}</h3>
            <table>
                <tr>
                    <th>Client Comment</th>
                </tr>
                @foreach($ship_comment as $comment)
                <tr>
                    <td>{{$comment->body}}</td>
                </tr>
                @endforeach
            </table>

            <form action="{{ route('shipp_comment_store', $shipping->id) }}" method="post">
                @csrf
                <div class="form-group">
                    <textarea name="body" id="" class="form-control"></textarea>
                </div>
                <button type="submit">Add Comment</button>
            </form>
        </div>
    </div>
</div>

@endsection
