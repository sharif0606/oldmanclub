@extends('user.layout.base')
@section('title','Phonebook')
@section('content')
    <div class="row">
        <div class="col-6">
            <div class="card">
                <!-- table bordered -->
                <div class="table-responsive">
                    <div>
                        <button id="downloadVCard"><i class="fa-solid fa-address-card"></i>
                        </button>
                        <!-- Inside your blade file -->
                        <!-- <button class="btn btn-sm btn-primary float-end" onClick="get_print()"><i class="bi bi-file-excel"></i> Export Excel</button> -->
                        <a href="{{ route('phonebook_download') }}" class="pull-right fs-5 mx-2" download>
                            <i class="fa fa-download"></i>
                        </a>
                        <a class="pull-right fs-5" href="{{route('phonebook.create')}}" data-toggle="modal" data-target="#phonecreatModal"><i class="fa fa-plus"></i></a>
                    </div>
                    <table class="table table-bordered mb-0" id="phone_book">
                        <thead>
                            <tr>
                                <th scope="col">{{__('#SL')}}</th>
                                <th scope="col">{{__('Name')}}</th>
                                <th scope="col">{{__('Group')}}</th>
                                <th scope="col">{{__('Contact No')}}</th>
                                <th scope="col">{{__('E-mail')}}</th>
                                <th class="white-space-nowrap">{{__('Action') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($data as $p)
                            <tr>
                                <th scope="row">{{ ++$loop->index }}</th>
                                <td>{{$p->name_en}}</td>
                                <td>{{$p->phonegroup?->group_name}}</td>
                                <td>{{$p->contact_en}}</td>
                                <td>{{$p->email}}</td>
                                <td class="white-space-nowrap">
                                    <a href="{{route('phonebook.edit',encryptor('encrypt',$p->id))}}">
                                        <i class="fa fa-edit"></i>
                                    </a>

                                    <a href="javascript:void()" onclick="$('#form{{$p->id}}').submit()">
                                        <i class="fa fa-trash"></i>
                                    </a>
                                    <form id="form{{$p->id}}" action="{{route('phonebook.destroy',encryptor('encrypt',$p->id))}}" method="post">
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
        <div class="col-6 card">
            <div class="card-body">
                <form action="{{route('phonebook.update',encryptor('encrypt',$phonebook->id))}}" method="post" class="row">
                    @csrf
                    @method('Patch')
                    <div class="col-12">
                        <div class="col-12">
                           <select name="group_id" id="" class="form-control mb-3">
                                <option value="">Select Group</option>
                            @foreach($phonegroup as $group)
                                <option value="{{$group->id}}" {{ old('group_id', $phonebook->group_id)==$group->id?"selected":""}}>{{$group->group_name}}</option>
                            @endforeach
                            </select>
                        </div>
                        <div class="col-12">
                            <input type="text" class="form-control mb-3" id="Phone" name="contact_en" value="{{old('contact_en',$phonebook->contact_en)}}">
                        </div>
                        <div class="col-12">
                            <input type="text" class="form-control mb-3" id="Name" name="name_en" value="{{old('contact_en',$phonebook->name_en)}}">
                        </div>
                        <div class="col-12">
                            <input type="email" class="form-control mb-3" id="Email" name="email" value="{{old('contact_en',$phonebook->email)}}">
                        </div>
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
