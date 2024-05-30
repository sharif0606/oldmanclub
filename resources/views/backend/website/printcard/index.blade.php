@extends('backend.layouts.app')
@section('title','Printing Card')
@section('content')
<div class="col-lg-12">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title"></h4>
            <div>
                <a class="pull-right fs-1" href="{{route('printcard.create')}}"><i class="fa fa-plus">Add new</i></a>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-responsive-sm">
                    <thead>
                        <tr>
                            <th scope="col">{{__('#SL')}}</th>
                            <th scope="col">{{__('Title')}}</th>
                            <th scope="col">{{__('Image')}}</th>
                            <th scope="col">{{__('Action')}}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($printcard as $value)
                        <tr>
                            <td>{{ ++$loop->index }}</td>
                            <td>{{$value->title}} </td>
                            <td><img width="50px" src="{{asset('public/uploads/printservice/'.$value->image)}}"
                                    alt="">
                            </td>
                            <td>
                                <div class="d-flex">
                                    <a href="{{route('printcard.edit',encryptor('encrypt',$value->id))}}">
                                        <i class="fa fa-edit mx-1"></i>
                                    </a>
                                    <form id=""
                                        action="{{ route('printcard.destroy', encryptor('encrypt', $value->id)) }}"
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