@extends('backend.layouts.app')
@section('title',trans('Shipping'))
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
                            <th scope="col">{{__('Shipping Description')}}</th>
                            <th scope="col">{{__('status')}}</th>
                            <th scope="col">{{__('Reject Note')}}</th>
                            <th class="white-space-nowrap">{{__('Action') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($shipping as $value)
                        <tr>
                            <th scope="row">{{ ++$loop->index }}</th>
                            <td>
                                {{__($value->user?->fname)}}
                                {{__($value->user?->middle_name)}}
                                {{__($value->user?->last_name)}}
                            </td>
                            <td>{{__($value->shipping_title)}}</td>
                            <td>{{__($value->shipping_description)}}</td>
                            <td>
                                @if($value->status == 1) {{__('pending') }} @elseif($value->status==2) {{__('approved') }} @else{{__('reject')}} @endif
                            </td>
                            <td>{{$value->reject_note}}</td>
                            <td class="white-space-nowrap">
                                <a href="{{route('shipping_edit',encryptor('encrypt',$value->id))}}">
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