@extends('backend.layouts.app')
@section('title',trans('Comment'))
@section('page',trans('List'))
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <!-- table bordered -->
                <table class="table table-bordered mb-0">
                    <thead>
                        <tr>
                            <th scope="col">{{__('#SL')}}</th>
                            <th scope="col">{{__('User Name')}}</th>
                            <th scope="col">{{__('Shipping Tittle')}}</th>
                            <th scope="col">{{__('User Message')}}</th>
                            <th scope="col">{{__('Admin Message')}}</th>
                            <th class="white-space-nowrap">{{__('Action') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($comment as $value)
                        <tr>
                            <th scope="row">{{ ++$loop->index }}</th>
                            <td>
                                {{__($value->shipping?->user?->first_name_en)}}
                                {{__($value->shipping?->user?->middle_name_en)}}
                                {{__($value->shipping?->user?->last_name_en)}}
                            </td>
                            <td>{{__($value->shipping?->shipping_title)}}</td>
                            <td>{{__($value->client_message)}}</td>
                            <td>{{__($value->user_message)}}</td>
                            <td class="white-space-nowrap">
                                <a href="{{route('comment_edit',encryptor('encrypt',$value->id))}}">
                                    <i class="fa fa-edit"></i>
                                </a>
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
@endsection