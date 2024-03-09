@extends('user.layout.app')
@section('title','Phone Group')
@section('content')
 
    <div class="card col-sm-6 shadow-lg">
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
@endsection