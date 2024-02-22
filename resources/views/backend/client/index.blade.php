@extends('backend.layouts.app')
@section('title',trans('Users'))
@section('page',trans('List'))
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            
            <!-- table bordered -->
            <div class="table-responsive"><div>
                <a class="pull-right fs-1" href="{{route('client.create')}}"><i class="fa fa-plus"></i></a>
            </div>
                <table class="table table-bordered mb-0">
                    <thead>
                        <tr>
                            <th scope="col">{{__('#SL')}}</th>
                            <th scope="col">{{__('Name')}}</th>
                            <th scope="col">{{__('Email')}}</th>
                            <th scope="col">{{__('Contact')}}</th>
                            <th scope="col">{{__('Birth Date')}}</th>
                            <th scope="col">{{__('Address')}}</th>
                            <th scope="col">{{__('Image')}}</th>
                            <th scope="col">{{__('Address Verified')}}</th>

                            <th scope="col">{{__('Status')}}</th>
                            <th class="white-space-nowrap">{{__('Action') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($client as $p)
                        <tr>
                            <th scope="row">{{ ++$loop->index }}</th>
                            <td>{{$p->fname}}
                                {{$p->middle_name}} {{$p->last_name}}
                            </td>
                            <td>{{$p->email}}</td>
                            <td>{{$p->contact_no}}</td>
                            <td>{{ date('d-F-Y', strtotime($p->dob)) }}</td>
                            <td>{{$p->address_line_1}}</td>
                            <td><img width="50px" src="{{asset('public/uploads/client/'.$p->image)}}" alt=""></td>
                            <td style="color: @if($p->is_address_verified==1) Green @else red @endif; font-weight:bold;">@if($p->is_address_verified==1){{__('Verified')}}@else{{__('Not Verified')}}@endif</td>
                            
                            <td style="color: @if($p->status==1) Green @else red @endif; font-weight:bold;">@if($p->status == 1) {{__('Active') }} @else {{__('Inactive') }} @endif</td>
                            <!-- or <td>{{ $p->status == 1?"Active":"Inactive" }}</td>-->
                            <td class="white-space-nowrap">
                                <a href="{{route('client.edit',encryptor('encrypt',$p->id))}}">
                                    <i class="fa fa-edit"></i>
                                </a>
                                <a href="{{route('client.show',encryptor('encrypt',$p->id))}}">
                                    <i class="fa fa-eye"></i>
                                </a>
                                <a href="javascript:void()" onclick="$('#form{{$p->id}}').submit()">
                                    <i class="fa fa-trash"></i>
                                </a>
                                <form id="form{{$p->id}}" action="{{route('client.destroy',encryptor('encrypt',$p->id))}}" method="post">
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