@extends('backend.layouts.app')
@section('title',trans('Printing Service'))
@section('page',trans('List'))
@section('content')

<!-- Bordered table start -->
<div class="row">
    <div class="col-12">
        <div class="card">
            
            <!-- table bordered -->
            <div class="table-responsive">
                <div>
                    <a class="pull-right fs-1" href="{{route('print_service.create')}}"><i class="fa fa-plus"></i></a>
                </div>
                <table class="table table-bordered mb-0">
                    <thead>
                        <tr>
                            <th scope="col">{{__('#SL')}}</th>
                            <th scope="col">{{__('Service Name')}}</th>
                            <th scope="col">{{__('Service Details')}}</th>
                            <th scope="col">{{__('Quantity')}}</th>
                            <th scope="col">{{__('Price')}}</th>
                            <th scope="col">{{__('Image')}}</th>
                            <th class="white-space-nowrap">{{__('Action') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($data as $p)
                        <tr>
                            <th scope="row">{{ ++$loop->index }}</th>
                            <td>{{$p->service_name}}</td>
                            <td>{!!$p->service_details!!}</td>
                            <td>{{$p->qty}}</td>
                            <td>{{$p->price}}</td>
                            <td>
                                @if($p->featuredImage)
                                    <img src="{{ asset('public/uploads/printimages/' . $p->featuredImage->image) }}" alt="Featured Image" width="50px">
                                @else
                                    No Featured Image
                                @endif
                            </td>
                            <td class="white-space-nowrap">
                                <a href="{{route('print_service.edit',encryptor('encrypt',$p->id))}}">
                                    <i class="fa fa-edit"></i>
                                </a>
                                <a href="{{route('print_service.show',encryptor('encrypt',$p->id))}}">
                                    <i class="fa fa-eye"></i>
                                </a>
                                <a href="{{route('uploadimage',encryptor('encrypt',$p->id))}}">
                                    <i class="fas fa-file-upload"></i>
                                </a>
                                <a href="javascript:void()" onclick="$('#form{{$p->id}}').submit()" class="text-danger">
                                    <i class="fa fa-trash"></i>
                                </a>
                                <form id="form{{$p->id}}" action="{{route('print_service.destroy',encryptor('encrypt',$p->id))}}" method="post">
                                    @csrf
                                    @method('delete')
                                </form>
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