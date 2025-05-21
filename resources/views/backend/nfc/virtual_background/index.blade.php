@extends('backend.layouts.app')
@section('title',trans('NFC Field'))
@section('page',trans('List'))
@section('content')

<!-- Bordered table start -->
<div class="row">
    <div class="col-12">
        <div class="card">

            <!-- table bordered -->
            <div class="table-responsive">
                <div>
                    <a class="pull-right fs-1" href="{{route('nfc-virtual-background.create')}}"><i class="fa fa-plus"></i></a>
                </div>
                <table class="table table-bordered mb-0">
                    <thead>
                        <tr>
                            <th scope="col">{{__('#SL')}}</th>
                            <th scope="col">{{__('Category Name')}}</th>
                            <th scope="col">{{__('Image')}}</th>
                            <th class="white-space-nowrap">{{__('Action') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($data as $p)
                        <tr>
                            <th scope="row">{{ ++$loop->index }}</th>
                            <td>{{$p->nfc_virtual_background_category?->category_name}}</td>
                            <td><img src="{{asset('public/uploads/nfc_virtual_background/'.$p->image)}}" alt="Image" width="100"></td>
                            <td class="white-space-nowrap">
                                <a href="{{route('nfc-virtual-background.edit',encryptor('encrypt',$p->id))}}">
                                    <i class="fa fa-edit"></i>
                                </a>
                                <a href="javascript:void()" onclick="$('#form{{$p->id}}').submit()">
                                    <i class="fa fa-trash"></i>
                                </a>
                                <form id="form{{$p->id}}" action="{{route('nfc-virtual-background.destroy',encryptor('encrypt',$p->id))}}" method="post">
                                    @csrf
                                    @method('delete')
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <th colspan="3" class="text-center">No Category Found</th>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
