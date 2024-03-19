@extends('user.layout.base')
@section('title','Phone Group')
@section('content')
    <div class="row">
        <div class="col-6">
            <div class="card">
                <!-- table bordered -->
                <div class="table-responsive">
                    <div>
                        <h3 class="text-center">Phone Group</h3>
                        {{-- <a class="pull-right fs-5" href="{{route('phonegroup.create')}}" data-toggle="modal" data-target="#phonegroupModal"><i class="fa fa-plus"></i></a> --}}
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
                            @forelse($data as $p)
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
            <div class="card shadow-lg">
                <div class="card-body">
                    <form action="{{route('phonegroup.update',encryptor('encrypt',$phonegroup->id))}}" method="post" class="row">
                        @csrf
                        @method('Patch')
                        <div class="col-12">
                            <div class="col-12">
                                <input type="text" class="form-control mb-3" id="Phone" name="group_name" value="{{old('group_name',$phonegroup->group_name)}}">
                            </div>
                            <div class="col-12">
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
