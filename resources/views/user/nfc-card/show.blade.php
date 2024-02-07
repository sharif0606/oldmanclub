@extends('user.layout.app')
@section('title', 'NFC Card Preview')
@push('styles')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
@endpush
@section('content')
    <!-- Bordered table start -->
    <div class="row">
        <div class="col-6 offset-3">
            <div class="card">
                @include('user.nfc-template.sleek-template')
            </div>
        </div>
    </div>
@endsection
