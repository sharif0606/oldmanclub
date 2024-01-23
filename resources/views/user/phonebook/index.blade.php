@extends('user.layout.app')
@section('title','Phonebook')
@section('content')
<!-- Bordered table start -->
<div class="row">
    <div class="col-12">
        <div class="card">
            
            <!-- table bordered -->
            <div class="table-responsive">
                <div>
                    <!-- Inside your blade file -->
                    <a href="{{ route('phonebook_download') }}" class="pull-right fs-1 mx-2" download>
                        <i class="fa fa-download"></i>
                    </a>
                    <a class="pull-right fs-1" href="{{route('phonebook.create')}}" data-toggle="modal" data-target="#phonecreatModal"><i class="fa fa-plus"></i></a>
                </div>
                <table class="table table-bordered mb-0">
                    <thead>
                        <tr>
                            <th scope="col">{{__('#SL')}}</th>
                            <th scope="col">{{__('Name')}}</th>
                            <th scope="col">{{__('Contact No')}}</th>
                            <th scope="col">{{__('E-mail')}}</th>
                            <th class="white-space-nowrap">{{__('Action') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($phonebook as $p)
                        <tr>
                            <th scope="row">{{ ++$loop->index }}</th>
                            <td>{{$p->name_en}}</td>
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
    <div class="modal fade" id="phonecreatModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content rounded-0 border-0 p-4">
                <div class="modal-header border-0">
                    <h3 class="text-center">Phonebook</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="login">
                        <form action="{{route('phonebook.store')}}" method="post" class="row">
                            @csrf
                            <div class="col-12">
                                <input type="text" class="form-control mb-3" id="Phone" name="contact_en" placeholder="Phone no">
                            </div>
                            <div class="col-12">
                                <input type="text" class="form-control mb-3" id="Name" name="name_en" placeholder="Name">
                            </div>
                            <div class="col-12">
                                <input type="email" class="form-control mb-3" id="Email" name="email" placeholder="Email">
                            </div>
                            <div class="col-12">
                                <button type="submit" class="btn btn-primary">Phone No Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection