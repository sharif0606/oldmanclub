@extends('user.layout.base')
@section('title','Phonebook')
@section('content')
<main>
  <!-- Container START -->
    <div class="container">
        <div class="row g-4">
        <!-- Main content START -->
            <div class="col-lg-8 mx-auto">
                <div class="bg-mode p-4">
                    <div class="compose-content">
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
            </div>
        </div>
    </div>
</main>
@endsection
