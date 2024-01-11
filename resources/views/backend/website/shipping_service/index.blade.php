@extends('backend.layouts.app')
@section('title','Shipping Service')
@section('content')
<div class="col-lg-12">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Shipping Header</h4>
                <div>
                    <a class="pull-right fs-1" href="{{route('shippingservice.create')}}"><i class="fa fa-plus">Add new</i></a>
                </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-responsive-sm">
                    <thead>
                        <tr>
                            <th scope="col">{{__('#SL')}}</th>
                            <th scope="col">{{__('Icon')}}</th>
                            <th scope="col">{{__('Service Title')}}</th>
                            <th scope="col">{{__('Description')}}</th>
                            <th scope="col">{{__('Action')}}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($service as $value)
                        <tr>
                            <td>{{ ++$loop->index }}</td>
                            <td><img width="50px" src="{{asset('public/uploads/shipping/'.$value->service_image)}}" alt=""></td>
                            <td>{{$value->service_title}} </td>
                            <td>{{$value->service_description}} </td>
                            <td>
                                <div class="d-flex">
                                    <a href="{{route('shippingservice.edit',encryptor('encrypt',$value->id))}}">
                                        <i class="fa fa-edit mx-1"></i>
                                    </a>
                                    <form id=""
                                        action="{{ route('shippingservice.destroy', encryptor('encrypt', $value->id)) }}"
                                        method="post">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" style="border:none">
                                            <span class=""><i class="fa fa-trash text-danger"></i></span>
                                            
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="12">No Data Found</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection