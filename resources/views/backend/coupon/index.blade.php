@extends('backend.layouts.app')
@section('title',trans('Coupon'))
@section('page',trans('List'))
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <!-- table bordered -->
            <div class="table-responsive">
                <a class="pull-right fs-1" href="{{route('coupon.create')}}"><i class="fa fa-plus"></i></a>
                <table class="table table-bordered mb-0">
                    <thead>
                         <tr>
                            <th scope="col">{{__('#SL')}}</th>
                            <th scope="col">{{__('Coupon code')}}</th>
                            <th scope="col">{{__('type')}}</th>
                            <th scope="col">{{__('Value')}}</th>
                            <th scope="col">{{__('Start Date')}}</th>
                            <th scope="col">{{__('End Date')}}</th>
                            <th scope="col">{{__('Max Uses')}}</th>
                            <th scope="col">{{__('Uses')}}</th>
                            <th scope="col">{{__('Status')}}</th>
                            <th class="white-space-nowrap">{{__('Action') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($coupons as $value)
                        <tr>
                            <th scope="row">{{ ++$loop->index }}</th>
                            <td>{{ $coupon->code }}</td>
                            <td>{{ $coupon->type }}</td>
                            <td>{{ $coupon->value }}</td>
                            <td>{{ $coupon->start_date }}</td>
                            <td>{{ $coupon->end_date }}</td>
                            <td style="color: @if($value->status==1) #FFC107 @else red @endif; font-weight:bold;">
                                {{ $value->status == 1 ? __('Show') : __('Hide')}}
                            </td>
                            <td class="white-space-nowrap">
                                <a href="{{route('coupon.edit',encryptor('encrypt',$value->id))}}">
                                    <i class="fa fa-edit"></i>
                                </a>
                                <a href="{{route('coupon.delete',encryptor('encrypt',$value->id))}}" class="">
                                    <i class="fa fa-eye"></i>
                                </a>
                                <!-- <a href="javascript:void()" onclick="$('#form{{$value->id}}').submit()">
                                    <i class="fa fa-trash"></i>
                                </a>
                                <form id="form{{$value->id}}" action="{{route('company.destroy',encryptor('encrypt',$value->id))}}" method="post">
                                    @csrf
                                    @method('delete')
                                </form> -->
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <th colspan="13" class="text-center">Coupon Code Not Found</th>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection