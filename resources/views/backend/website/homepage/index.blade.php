@extends('backend.layouts.app')
@section('title','Home Page')
@section('content')
<div class="col-lg-12">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Table Bordered</h4>
                <div>
                    <a class="pull-right fs-1" href="{{route('homepage.create')}}"><i class="fa fa-plus">Add new</i></a>
                </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-responsive-sm">
                    <thead>
                        <tr>
                            <th scope="col">{{__('#SL')}}</th>
                            <th scope="col">{{__('Service Text')}}</th>
                            <th scope="col">{{__('Special Text')}}</th>
                            <th scope="col">{{__('Special Image')}}</th>
                            <th scope="col">{{__('Special Link')}}</th>
                            <th scope="col">{{__('Golebal Network Text')}}</th>
                            <th scope="col">{{__('Golebal Network Image')}}</th>
                            <th scope="col">{{__('Customer Feedback')}}</th>
                            <th scope="col">{{__('Action')}}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($homepage as $h)
                        <tr>
                            <td>{{ ++$loop->index }}</td>
                            <td>{{$h->service_section_text}} </td>
                            <td>{{$h->special_offer_text}} </td>
                            <td><img width="50px" src="{{asset('public/uploads/homepage/'.$h->special_offer_image)}}" alt=""> </td>
                            <td>{{$h->special_offer_link}}</td>
                            <td>{{$h->global_network_text}} </td>
                            <td>{{$h->customer_feedback_text}} </td>
                            <td><img width="50px" src="{{asset('public/uploads/homepage/'.$h->global_network_image)}}" alt=""> </td>
                            
                            <td>
                                <div class="d-flex">
                                    <a href="{{route('homepage.edit',encryptor('encrypt',$h->id))}}">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                    <form id=""
                                        action="{{ route('homepage.destroy', encryptor('encrypt', $h->id)) }}"
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