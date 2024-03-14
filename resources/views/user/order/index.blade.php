@extends('user.layout.base')
@section('title','Order List')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <!-- table bordered -->
            <div class="table-responsive">
                <div>
                </div>
                <table class="table table-bordered mb-0" id="phone_book">
                    <thead>
                        <tr>
                            <th scope="col">{{__('#SL')}}</th>
                            <th scope="col">{{__('Tracking No')}}</th>
                            <th scope="col">{{__('User Name')}}</th>
                            <th scope="col">{{__('Shipping Name')}}</th>
                            <th scope="col">{{__('Tax')}}</th>
                            <th scope="col">{{__('Total')}}</th>
                            <th scope="col">{{__('Discount')}}</th>
                            <th scope="col">{{__('Payable')}}</th>
                            <th scope="col">{{__('Order Status')}}</th>
                            <th class="white-space-nowrap">{{__('Action') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($order as $value)
                        <tr>
                            <th scope="row">{{ ++$loop->index }}</th>
                            <td>{{$value->tracking_no}}</td>
                            <td>{{$value->client?->fname}}</td>
                            <td>{{$value->shipping?->address}}</td>

                            <td>{{$value->tax}}</td>
                            <td>{{$value->total}}</td>
                            <td>{{$value->discount}}</td>
                            <td>{{$value->payable}}</td>
                            <td>{{$value->order_status == 1 ? __('Processing') :
                                ($value->order_status == 2 ? __('Printing') :
                                ($value->order_status == 3 ? __('Complete') :
                                ($value->order_status == 4 ? __('Delivered') : '')))}}
                            </td>
                            <td class="white-space-nowrap">
                                <a href="{{route('order_edit_sampleimg',$value->id)}}">
                                   <i class="fa fa-upload"></i>
                                </a>
                                {{--<a href="javascript:void()" onclick="$('#form{{$value->id}}').submit()">
                                    <i class="fa fa-trash"></i>
                                </a>
                                <form id="form{{$value->id}}" action="{{route('nfc_field.destroy',encryptor('encrypt',$value->id))}}" method="post">
                                    @csrf
                                    @method('delete')
                                </form>--}}
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <th colspan="13" class="text-center">No Pruduct Found</th>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
