@extends('backend.layouts.app')
@section('title',trans('SMS Service'))
@section('page',trans('List'))
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            
            <!-- table bordered -->
            <div class="table-responsive"><div>
                <a class="pull-right fs-1" href="{{route('sms.create')}}"><i class="fa fa-plus"></i></a>
            </div>
                <table class="table table-bordered mb-0">
                    <thead>
                        <tr>
                            <th scope="col">{{__('#SL')}}</th>
                            <th scope="col">{{__('Package Type')}}</th>
                            <th scope="col">{{__('Title')}}</th>
                            <th scope="col">{{__('Number Of Sms')}}</th>
                            <th scope="col">{{__('Validity')}}</th>
                            <th scope="col">{{__('Price')}}</th>
                            <th scope="col">{{__('Discount')}}</th>
                            <th scope="col">{{__('Discount Price')}}</th>
                            <th scope="col">{{__('Image')}}</th>
                            <th scope="col">{{__('Status')}}</th>
                            <th class="white-space-nowrap">{{__('Action') }}</th>
                        </tr>
                    </thead>
                    <tbody>                                              
                        @forelse($sms as $p)
                        <tr>
                            <th scope="row">{{ ++$loop->index }}</th>
                            <td>
                                @if($p->package_type==1){{ 'Regular' }} @else{{ 'Validity' }} @endif
                            </td>
                            <td>{{$p->title}}</td>
                            <td>{{$p->number_of_sms}}</td>
                            <td>{{$p->validity_days}}</td>
                            <td>{{$p->price}}</td>
                            <td>{{$p->discount}}%</td>
                            <td>{{$p->discount_price}}</td>
                            <td>
                                <img src="{{ asset('public/uploads/sms/'.$p->image) }}" alt="" width="50px">
                            </td>
                            <td>@if($p->status == 1) {{__('Active') }} @else {{__('Inactive') }} @endif</td>
                            <!-- or <td>{{ $p->status == 1?"Active":"Inactive" }}</td>-->
                            <td class="white-space-nowrap">
                                <a href="{{route('sms.edit',encryptor('encrypt',$p->id))}}">
                                    <i class="fa fa-edit"></i>
                                </a>
                                <a href="javascript:void()" onclick="$('#form{{$p->id}}').submit()">
                                    <i class="fa fa-trash"></i>
                                </a>
                                <form id="form{{$p->id}}" action="{{route('sms.destroy',encryptor('encrypt',$p->id))}}" method="post">
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