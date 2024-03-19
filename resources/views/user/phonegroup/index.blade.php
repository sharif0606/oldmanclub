@extends('user.layout.base')
@section('title','Phonebook')
@section('content')
<!-- Bordered table start -->
<style>
    .add{
        float: right;
    }
</style>
<main>
  <!-- Container START -->
    <div class="container">
        <div class="row g-4">
        <!-- Main content START -->
            <div class="col-lg-10 mx-auto">
                <div class="bg-mode p-4">
                    <div class="compose-content">
                        <div class="table-responsive">
                            <div>
                                <span class="fs-4">
                                    Group List
                                </span>
                                <a class="fs-5 add" href="{{route('phonegroup.create')}}" data-toggle="modal" data-target="#phonegroupModal"><i class="fa fa-plus"></i></a>
                            </div>
                            <table class="table table-striped mb-0" id="phone_book">
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
                                            <a href="{{route('phonegroup.edit',encryptor('encrypt',$p->id))}}" class="text-warning">
                                                <i class="fa fa-edit"></i>
                                            </a>

                                            <a href="javascript:void()" onclick="$('#form{{$p->id}}').submit()" class="text-danger">
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
            </div>
        </div>
    </div>
</main>
{{--  <div class="row">
    <div class="col-6">
        <div class="card">
            <!-- table bordered -->
            <div class="table-responsive">
                <div>
                    <h3 class="text-center">Phone Group</h3>
                    <a class="pull-right fs-5" href="{{route('phonegroup.create')}}" data-toggle="modal" data-target="#phonegroupModal"><i class="fa fa-plus"></i></a>
                </div>
                <table class="table table-striped mb-0" id="phone_book">
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
    <div class="col-6">
        <div class="card p-3">
            <form action="{{route('phonegroup.store')}}" method="post" class="row">
                @csrf
                <div class="form-group">
                    <input type="text" class="form-control mb-3" id="Phone" name="group_name" placeholder="Phone Group">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary px-3">Save</button>
                </div>
            </form>
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
                                <button type="submit" class="btn btn-primary">Phone Group Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>  --}}
@endsection

