@extends('user.layout.base')
@section('title','Phonebook')
@section('content')
<main>
  <!-- Container START -->
    <div class="container">
        <div class="row g-4">
        <!-- Main content START -->
            <div class="col-lg-6 mx-auto">
                <div class="bg-mode p-4">
                    <p class="fs-4 text-center">Add New Contact</p>
                    <div class="compose-content">
                        <form action="{{route('phonebook.store')}}" method="post" class="row">
                            @csrf
                            <div class="col-12">
                                <select name="group_id" id="" class="form-control mb-3">
                                    <option value="">Select Group</option>
                                    @foreach($phonegroup as $group)
                                    <option value="{{$group->id}}" {{ old('group_id')==$group->id?"selected":""}}>{{$group->group_name}}</option>
                                    @endforeach
                                </select>
                            </div>
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
  <!-- Container END -->
</main>
@endsection
