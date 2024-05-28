@extends('backend.layouts.app')
@section('title',trans('Post'))
@section('page',trans('List'))
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <!-- table bordered -->
            <div class="table-responsive">
                <table class="table table-bordered mb-0">
                    <thead>
                        <tr>
                            <th scope="col">{{__('#SL')}}</th>
                            <th scope="col">{{__('Image')}}</th>
                            <th scope="col">{{__('Message')}}</th>
                            <th scope="col">{{__('User Name')}}</th>
                            {{-- <th class="white-space-nowrap">{{__('Action') }}</th> --}}
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($post as $value)
                        <tr>
                            <th scope="row">{{ ++$loop->index }}</th>
                            <td><img src="{{ asset('public/uploads/post/'.$value->image) }}" alt="" width="50px">
                            </td>
                            <td>{{$value->message}}</td>
                            <td>{{$value->client?->fname}} {{$value->client?->middle_name}}</td>
                            {{-- <td class="white-space-nowrap">
                                <a href="{{route('order_edit',encryptor('encrypt',$value->id))}}">
                                    <i class="fa fa-edit"></i>
                                </a>
                                <a href="javascript:void()" onclick="$('#form{{$value->id}}').submit()">
                                    <i class="fa fa-trash"></i>
                                </a>
                                <form id="form{{$value->id}}" action="{{route('nfc_field.destroy',encryptor('encrypt',$value->id))}}" method="post">
                                    @csrf
                                    @method('delete')
                                </form>
                            </td> --}}
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