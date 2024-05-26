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
                    <a class="pull-right fs-1" href="{{route('nfc_field.create')}}"><i class="fa fa-plus"></i></a>
                </div>
                <table class="table table-bordered mb-0">
                    <thead>
                        <tr>
                            <th scope="col">{{__('#SL')}}</th>
                            <th scope="col">{{__('Name')}}</th>
                            <th scope="col">{{__('Icon')}}</th>
                            <th scope="col">{{__('Status')}}</th>
                            <th class="white-space-nowrap">{{__('Action') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($data as $p)
                        <tr>
                            <th scope="row">{{ ++$loop->index }}</th>
                            <td>{{$p->name}}</td>
                            <td>
                            @if ($p->type==1)
                                <i class="{{$p->icon}}" ></i>
                            @elseif ($p->type==2)
                            <span style="height: 50px !important;width: 50px !important;">
                                {!! $p->icon !!}
                            </span>
                            @else
                                <img src="{{asset($p->icon)}}" alt="icon" style="width: 50px;height: 50px;">
                            @endif
                            </td>
                            <td>@if($p->status==1) {{__('Show')}} @else {{__('Hide')}}
                            @endif</td>
                            <td class="white-space-nowrap">
                                <a href="{{route('nfc_field.edit',encryptor('encrypt',$p->id))}}">
                                    <i class="fa fa-edit"></i>
                                </a>
                                <a href="javascript:void()" onclick="$('#form{{$p->id}}').submit()">
                                    <i class="fa fa-trash"></i>
                                </a>
                                <form id="form{{$p->id}}" action="{{route('nfc_field.destroy',encryptor('encrypt',$p->id))}}" method="post">
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
                {{ $data->links() }}
            </div>
        </div>
    </div>
</div>
@endsection
