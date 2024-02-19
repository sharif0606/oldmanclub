@extends('user.layout.app')
@section('title', 'NFC Card')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="table-responsive"><div>
                <a class="pull-right fs-1" href="{{route('company.create')}}"><i class="fa fa-plus"></i></a>
            </div>
            <!-- table bordered -->
            <div class="table-responsive">
                <table class="table table-bordered mb-0" id="phone_book">
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
                            <th scope="col">{{__('State')}}</th>
                            <th scope="col">{{__('Zip Code')}}</th>
                            <th scope="col">{{__('Description')}}</th>
                            <th scope="col">{{__('Status')}}</th>
                            <th class="white-space-nowrap">{{__('Action') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($company as $value)
                        <tr>
                            <th scope="row">{{ ++$loop->index }}</th>
                            <td>{{$value->qrcode}}</td>
                            <td>{{$value->company_name}}</td>
                            <td><img src="{{asset('public/uploads/company/'.$value->company_logo)}}" alt="">
                            </td>
                            <td>{{$value->contact_no}}</td>
                            <td>{{$value->email}}</td>
                            <td>{{$value->phone_number}}</td>
                            <td>{{$value->address}}</td>
                            <td>{{$value->city}}</td>
                            <td>{{$value->state}}</td>
                            <td>{{$value->zip_code}}</td>
                            <td>{{$value->description}}</td>
                            <td>
                                {{ $value->status == 1 ? __('Pending') : ($value->status == 2 ? __('Accepted') : __('Rejected')) }}
                            </td>
                            <td class="white-space-nowrap">
                                <a href="{{route('company.edit',encryptor('encrypt',$value->id))}}">
                                    <i class="fa fa-edit"></i>
                                </a>
                                <a href="javascript:void()" onclick="$('#form{{$value->id}}').submit()">
                                    <i class="fa fa-trash"></i>
                                </a>
                                <form id="form{{$value->id}}" action="{{route('company.destroy',encryptor('encrypt',$value->id))}}" method="post">
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