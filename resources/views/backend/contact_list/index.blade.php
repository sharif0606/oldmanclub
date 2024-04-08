@extends('backend.layouts.app')
@section('title',trans('Company'))
@section('page',trans('List'))
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="table-responsive">
                <table class="table table-bordered mb-0">
                    <thead>
                         <tr>
                            <th scope="col">{{__('#SL')}}</th>
                            <th scope="col">{{__('Name')}}</th>
                            <th scope="col">{{__('E-mail')}}</th>
                            <th scope="col">{{__('Contact')}}</th>
                            <th scope="col">{{__('Message')}}</th>
                            <th scope="col">{{__('File')}}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($data as $value)
                        <tr>
                            <th scope="row">{{ ++$loop->index }}</th>
                            <td>{{$value->name}}</td>
                            <td>{{$value->email}}</td>
                            <td>{{$value->contact_no}}</td>
                            <td>{{$value->message}}</td>
                            <td>
                                @if($value->file)
                                    <a href="{{ asset('public/uploads/contact_file/'.$value->file) }}" target="_blank" >Download</a>
                                @else
                                    <p>No file Upload</p>
                                @endif
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <th colspan="13" class="text-center">No Pruduct Found</th>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection