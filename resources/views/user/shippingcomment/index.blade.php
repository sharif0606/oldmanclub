@extends('user.layout.app')
@section('title','Shipping Comment')
@section('content')
<!-- Bordered table start -->
<div class="row">
    <div class="col-12">
        <div class="card">
            <!-- table bordered -->
            <div class="table-responsive">
                <div>
                    <a class="pull-right fs-5" href="{{route('shipcomment.create')}}"><i class="fa fa-plus"></i></a>
                </div>
                <table class="table table-bordered mb-0" id="phone_book">
                    <thead>
                        <tr>
                            <th scope="col">{{__('#SL')}}</th>
                            <th scope="col">{{__('Shipping Tittle')}}</th>
                            <th scope="col">{{__('Client Message')}}</th>
                            <th scope="col">{{__('User Message')}}</th>
                            <th class="white-space-nowrap">{{__('Action') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($shippingcomment as $value)
                        <tr>
                            <th scope="row">{{ ++$loop->index }}</th>
                            <td>{{__($value->shipping?->shipping_title)}}</td>
                            <td>{{__($value->client_message)}}</td>
                            <td>{{__($value->user_message)}}</td>
                            <td class="white-space-nowrap">
                                @if($value->status !== 2)
                                
                                <a href="javascript:void()" onclick="$('#form{{$value->id}}').submit()">
                                    <i class="fa fa-trash"></i>
                                </a>
                                 @endif
                                <form id="form{{$value->id}}" action="{{route('shipcomment.destroy',encryptor('encrypt',$value->id))}}" method="post">
                                    @csrf
                                    @method('delete')
                                </form>
                               
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <th colspan="8" class="text-center">No Pruduct Found</th>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection

