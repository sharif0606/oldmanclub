@extends('user.layout.app')
@section('title','Shipping')
@section('content')
<!-- Bordered table start -->
<div class="row">
    <div class="col-12">
        <div class="card">
            <!-- table bordered -->
            <div class="table-responsive">
                <div>
                    <a class="pull-right fs-1" href="{{route('shipping.create')}}"><i class="fa fa-plus"></i></a>
                </div>
                <table class="table table-bordered mb-0" id="phone_book">
                    <thead>
                        <tr>
                            <th scope="col">{{__('#SL')}}</th>
                            <th scope="col">{{__('Shipping Tittle')}}</th>
                            <th scope="col">{{__('Shipping Description')}}</th>
                            <th scope="col">{{__('status')}}</th>
                            <th scope="col">{{__('Reject Note')}}</th>
                            <th class="white-space-nowrap">{{__('Action') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($shipping as $value)
                        <tr>
                            <th scope="row">{{ ++$loop->index }}</th>
                            <td>{{__($value->shipping_title)}}</td>
                            <td>{{__($value->shipping_description)}}</td>
                            <td>
                                @if($value->status == 1) {{__('pending') }} @elseif($value->status==2) {{__('approved') }} @else{{__('reject')}} @endif
                            </td>
                            <td>{{$value->reject_note}}</td>
                            <td class="white-space-nowrap">
                                @if($value->status !== 2)
                                <a href="{{route('shipping.edit',encryptor('encrypt',$value->id))}}">
                                    <i class="fa fa-edit"></i>
                                </a>
                                
                                <a href="javascript:void()" onclick="$('#form{{$value->id}}').submit()">
                                    <i class="fa fa-trash"></i>
                                </a>
                                 @endif
                                <form id="form{{$value->id}}" action="{{route('shipping.destroy',encryptor('encrypt',$value->id))}}" method="post">
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

