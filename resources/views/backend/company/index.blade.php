@extends('backend.layouts.app')
@section('title',trans('Company'))
@section('page',trans('List'))
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <!-- table bordered -->
            <div class="table-responsive">
                <table class="table table-bordered mb-0">
                    <thead>
                         <tr>
                            <th scope="col">{{__('#SL')}}</th>
                            <th scope="col">{{__('QR_code')}}</th>
                            <th scope="col">{{__('Company Name')}}</th>
                            <th scope="col">{{__('Company Logo')}}</th>
                            <th scope="col">{{__('Contact No')}}</th>
                            <th scope="col">{{__('Email')}}</th>
                            <th scope="col">{{__('Phone Number')}}</th>
                            <th scope="col">{{__('Address')}}</th>
                            <th scope="col">{{__('City')}}</th>
                            <th scope="col">{{__('Status')}}</th>
                            <th class="white-space-nowrap">{{__('Action') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($data as $value)
                        <tr>
                            <th scope="row">{{ ++$loop->index }}</th>
                            <td>{{$value->qrcode}}
                                <!-- @if (!empty($value->qrcode))
                                    {!! DNS2D::getBarcodeHTML($value->qrcode, 'QRCODE') !!}
                                @endif -->
                            </td>
                            <td>{{$value->company_name}}</td>
                            <td><img src="{{asset('public/uploads/company/'.$value->company_logo)}}" alt="" width="50px">
                            </td>
                            <td>{{$value->contact_no}}</td>
                            <td>{{$value->email}}</td>
                            <td>{{$value->phone_number}}</td>
                            <td>{{$value->address}}</td>
                            <td>{{$value->zip_code}}</td>
                            <td style="color: @if($value->status==1) #FFC107 @elseif($value->status==2) #15CE73 @elseif($value->status==3) red @endif; font-weight:bold;">
                                {{ $value->status == 1 ? __('Pending') : ($value->status == 2 ? __('Accepted') : __('Rejected')) }}
                            </td>
                            <td class="white-space-nowrap">
                                <a href="{{route('company_edit',encryptor('encrypt',$value->id))}}">
                                    <i class="fa fa-edit"></i>
                                </a>
                                <a href="{{route('company_show',encryptor('encrypt',$value->id))}}" class="">
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
