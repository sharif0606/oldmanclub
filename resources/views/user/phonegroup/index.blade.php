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
                    <a class="pull-right fs-1" href="{{route('phonegroup.create')}}" data-toggle="modal" data-target="#phonegroupModal"><i class="fa fa-plus"></i></a>
                </div>
                <table class="table table-bordered mb-0" id="phone_book">
                    <thead>
                        <tr>
                            <th scope="col">{{__('#SL')}}</th>
                            <th scope="col">{{__('Group Name')}}</th>
                            <th class="white-space-nowrap">{{__('Action') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($phonegroup as $p)
                        <tr>
                            <th scope="row">{{ ++$loop->index }}</th>
                            <td>{{$p->group_name}}</td>
                            <td class="white-space-nowrap">
                                <a href="{{route('phonegroup.edit',encryptor('encrypt',$p->id))}}">
                                    <i class="fa fa-edit"></i>
                                </a>
                                
                                <a href="javascript:void()" onclick="$('#form{{$p->id}}').submit()">
                                    <i class="fa fa-trash"></i>
                                </a>
                                <form id="form{{$p->id}}" action="{{route('phonegroup.destroy',encryptor('encrypt',$p->id))}}" method="post">
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
    <div class="modal fade" id="phonegroupModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content rounded-0 border-0 p-4">
                <div class="modal-header border-0">
                    <h3 class="text-center">PhoneGroup</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="login">
                        <form action="{{route('phonegroup.store')}}" method="post" class="row">
                            @csrf
                            <div class="col-12">
                                <input type="text" class="form-control mb-3" id="Phone" name="group_name" placeholder="Phone no">
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

