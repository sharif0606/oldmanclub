@extends('backend.layouts.app')
@section('title','Customer Feedback')
@section('content')
<div class="col-lg-12">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Customer Feedback List</h3>
                <div>
                    <a class="pull-right fs-1" href="{{route('printcus_feedback.create')}}"><i class="fa fa-plus">Add new</i></a>
                </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-responsive-sm">
                    <thead>
                        <tr>
                            <th scope="col">{{__('#SL')}}</th>
                            <th scope="col">{{__('Customer Name')}}</th>
                            <th scope="col">{{__('Customer Image')}}</th>
                            <th scope="col">{{__('Message')}}</th>
                            <th scope="col">{{__('Action')}}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($customerfeedback as $value)
                        <tr>
                            <td>{{ ++$loop->index }}</td>
                            <td>
                                {{$value->client?->fname}}  
                                {{$value->client?->middle_name}}  
                                {{$value->client?->last_name}}  
                            </td>
                            <td><img src="{{asset('public/uploads/client/'.$value->client?->image)}}" class="img-fluid rounded-circle" alt="">
                               
                            </td>
                            <td>{{$value->customer_message}} </td>
                            <td>
                                <div class="d-flex">
                                    <a href="{{route('printcus_feedback.edit',encryptor('encrypt',$value->id))}}">
                                        <i class="fa fa-edit mx-1"></i>
                                    </a>
                                    <form id=""
                                        action="{{ route('printcus_feedback.destroy', encryptor('encrypt', $value->id)) }}"
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
                            <td colspan="6">No Data Found</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection