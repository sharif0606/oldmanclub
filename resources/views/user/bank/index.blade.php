@extends('user.layout.base')
@section('title', 'Bank')
@section('content')
<style>
    table{
        background-color: white;
    }
    .pull-right{
        float:right;
    }
</style>
<div class="row">
    <div class="col-12">
        <div class="card p-5">
            <h5 class="text-center">Bank List</h5>
            <div class="table-responsive">
                <a class="pull-right px-2 fs-4" href="{{route('bank.create')}}"><i class="fa fa-plus"></i></a>
            </div>
            <!-- table bordered -->
            <div class="table-responsive">
                <table class="table table-striped table-bordered mb-0" id="bank">
                    <thead>
                        <tr>
                            <th scope="col">{{__('#SL')}}</th>
                            <th scope="col">{{__('Bank Name')}}</th>
                            <th scope="col">{{__('Branch Name')}}</th>
                            <th scope="col">{{__('Branch Logo')}}</th>
                            <th scope="col">{{__('RTN Code')}}</th>
                            <th scope="col">{{__('SWIFT Code')}}</th>
                            <th scope="col">{{__('Email')}}</th>
                            <th scope="col">{{__('Contact No')}}</th>
                            <th scope="col">{{__('SWIFT Code')}}</th>
                            <th scope="col">{{__('Address')}}</th>
                            <th scope="col">{{__('City')}}</th>
                            <th scope="col">{{__('State')}}</th>
                            <th scope="col">{{__('Status')}}</th>
                            <th class="white-space-nowrap">{{__('Action') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($data as $value)
                        <tr>
                            <th scope="row">{{ ++$loop->index }}</th>
                            <td>{{$value->bank_name}}</td>
                            <td>{{$value->branch_name}}</td>
                            <td><img src="{{asset('public/uploads/bank/'.$value->bank_logo)}}" alt="" width="50px">
                            </td>
                            <td>{{$value->rtn_number}}</td>
                            <td>{{$value->swift_code}}</td>
                            <td>{{$value->email}}</td>
                            <td>{{$value->contact_no}}</td>
                            <td>{{$value->address}}</td>
                            <td>{{$value->city}}</td>
                            <td>{{$value->state}}</td>
                            <td>{{$value->zip_code}}</td>
                            <td style="color: @if($value->status==1) #FFC107 @elseif($value->status==2) #15CE73 @elseif($value->status==3) red @endif; font-weight:bold;">
                                {{ $value->status == 1 ? __('Pending') : ($value->status == 2 ? __('Accepted') : __('Rejected')) }}
                            </td>
                            <td class="white-space-nowrap">

                                <a href="{{route('bank.edit',encryptor('encrypt',$value->id))}}">
                                    <i class="fa fa-edit"></i>
                                </a>
                                <a href="{{route('bank.show',encryptor('encrypt',$value->id))}}" class="">
                                    <i class="fa fa-eye"></i>
                                </a>
                                <a href="javascript:void()" onclick="$('#form{{$value->id}}').submit()" class="text-danger">
                                    <i class="fa fa-trash"></i>
                                </a>
                                <form id="form{{$value->id}}" action="{{route('bank.destroy',encryptor('encrypt',$value->id))}}" method="post">
                                    @csrf
                                    @method('delete')
                                </form>
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
