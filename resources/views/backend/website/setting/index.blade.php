@extends('backend.layouts.app')
@section('title','Setting')
@section('content')
<div class="col-lg-12">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Setting List</h4>
                <div>
                    <a class="pull-right fs-1" href="{{route('setting.create')}}"><i class="fa fa-plus">Add new</i></a>
                </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-responsive-sm">
                    <thead>
                        <tr>
                            <th scope="col">{{__('#SL')}}</th>
                            <th scope="col">{{__('Header Logo')}}</th>
                            <th scope="col">{{__('Company Name')}}</th>
                            <th scope="col">{{__('Contact No')}}</th>
                            <th scope="col">{{__('E-mail')}}</th>
                            <th scope="col">{{__('Facebook')}}</th>
                            <th scope="col">{{__('Twitter')}}</th>
                            <th scope="col">{{__('LinkedLn')}}</th>
                            <th scope="col">{{__('Instagram')}}</th>
                            <th scope="col">{{__('Footer Text')}}</th>
                            <th scope="col">{{__('Footer Logo')}}</th>
                            <th scope="col">{{__('Action')}}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($data as $d)
                        <tr>
                            <td>{{ ++$loop->index }}</td>
                            <td><img width="50px" src="{{asset('public/uploads/setting/'.$d->header_logo)}}" alt=""> </td>
                            <td>{{$d->company_name}} </td>
                            <td>{{$d->contact_no_en}} </td>
                            <td>{{$d->email}} </td>
                            <td>{{$d->facebook_icon}}</td>
                            <td>{{$d->twitter_icon}} </td>
                            <td>{{$d->linkedln_icon}} </td>
                            <td>{{$d->instagram_icon}} </td>
                            <td>{{$d->footer_text}} </td>
                            <td><img width="50px" src="{{asset('public/uploads/setting/'.$d->footer_logo)}}" alt=""> </td>
                            <td>
                                <div class="d-flex">
                                    <a href="{{route('setting.edit',encryptor('encrypt',$d->id))}}">
                                        <i class="fa fa-edit mx-1"></i>
                                    </a>
                                    <form id=""
                                        action="{{ route('setting.destroy', encryptor('encrypt', $d->id)) }}"
                                        method="post">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" style="border:none">
                                            <span class=""><i class="fa fa-trash text-danger"></i></span>
                                            
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="12">No Data Found</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection