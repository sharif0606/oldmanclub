@extends('backend.layouts.app')
@section('title',trans('Shipping Status'))
@section('page',trans('List'))
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <!-- table bordered -->
            <div class="table-responsive"><div>
                <a class="pull-right fs-1" href="{{route('shipstatus.create')}}"><i class="fa fa-plus"></i></a>
            </div>
                <table class="table table-bordered mb-0">
                    <thead>
                        <tr>
                            <th scope="col">{{__('#SL')}}</th>
                            <th scope="col">{{__('User Name')}}</th>
                            <th scope="col">{{__('Shipping Name')}}</th>
                            <th scope="col">{{__('Shipping Address')}}</th>
                            <th scope="col">{{__('Delivery Address')}}</th>
                            <th scope="col">{{__('Shipping Method')}}</th>
                            <th class="white-space-nowrap">{{__('Action') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($shipstatus as $value)
                        <tr>
                            <th scope="row">{{ ++$loop->index }}</th>
                            <td>
                                {{__($value->shipping?->user?->first_name_en)}}
                                {{__($value->shipping?->user?->middle_name_en)}}
                                {{__($value->shipping?->user?->last_name_en)}}
                            </td>
                            <td>{{__($value->shipping?->shipping_title)}}</td>
                            <td>{{__($value->shipping_address)}}</td>
                            <td>{{__($value->delivery_address)}}</td>
                            <td>{{__($value->shipping_method)}}</td>
                            <td class="white-space-nowrap">
                                <a href="{{route('shipstatus.edit',encryptor('encrypt',$value->id))}}">
                                    <i class="fa fa-edit"></i>
                                </a>
                                <a href="javascript:void()" onclick="$('#form{{$value->id}}').submit()">
                                    <i class="fa fa-trash"></i>
                                </a>
                                <form id="form{{$value->id}}" action="{{route('shipstatus.destroy',encryptor('encrypt',$value->id))}}" method="post">
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