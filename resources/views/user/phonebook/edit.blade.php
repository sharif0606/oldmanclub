@extends('user.layout.app')
@section('title','Phonebook')
@section('content')
 
    <div class="card col-sm-6 shadow-lg">
        <div class="card-body">
            <form action="{{route('phonebook.update',encryptor('encrypt',$phonebook->id))}}" method="post" class="row">
                @csrf
                @method('Patch')
                <div class="col-12">
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
@endsection