@extends('user.layout.app')
@section('title','Phonebook')
@section('content')
    <!-- <div class="modal fade" id="phone_editModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content rounded-0 border-0 p-4">
                <div class="modal-header border-0">
                    <h3>Update Phonebook</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="login"> -->
                        
                    <form action="{{route('phonebook.update',$phonebook->id)}}" method="post" class="row">
                        @csrf
                        @method('Patch')
                        <div class="col-6">
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
                    <!-- </div>
                </div>
            </div>
        </div>
    </div> -->
@endsection