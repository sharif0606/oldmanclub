@extends('backend.layouts.app')
@section('title',trans('Design Card'))
@section('page',trans('List'))
@section('content')

<!-- Bordered table start -->
<div class="row">
    <div class="col-12">
        <div class="card">
            
            <!-- table bordered -->
            <div class="table-responsive">
                {{-- <div>
                    <a class="pull-right fs-1" href="{{route('design_card.create')}}"><i class="fa fa-plus"></i></a>
                </div> --}}
                <table class="table table-bordered mb-0">
                    <thead>
                        <tr>
                            <th scope="col">{{__('#SL')}}</th>
                            <th scope="col">{{__('Design Name')}}</th>
                            <th scope="col">{{__('Image')}}</th>
                            <th scope="col">{{__('Template')}}</th>
                            <th scope="col">{{__('Created_by')}}</th>
                            <th scope="col">{{__('Updated_by')}}</th>
                            <th class="white-space-nowrap">{{__('Action') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($data as $p)
                        <tr>
                            <th scope="row">{{ ++$loop->index }}</th>
                            <td>{{$p->design_name}}</td>
                            <td>
                                {{-- <img width="50px" src="{{asset('public/uploads/cards/'.$p->image)}}" alt=""> --}}
                                {!!$p->svg!!}
                            </td>
                            <td>{{ $p->template_id == 1 ? __('Classic') : 
                                    ($p->template_id == 2 ? __('Modern') : 
                                    ($p->template_id == 3 ? __('Flat') : __('Sleek')))}}
                            </td>
                            <td>{{$p->createdBy?->name}}</td>
                            <td>{{$p->updatedBy?->name}}</td>
                            <td class="white-space-nowrap">
                                {{-- <a href="{{route('design_card.edit',encryptor('encrypt',$p->id))}}">
                                    <i class="fa fa-edit"></i>
                                </a> --}}
                                <a href="javascript:void()" onclick="$('#form{{$p->id}}').submit()">
                                    <i class="fa fa-trash"></i>
                                </a>
                                <form id="form{{$p->id}}" action="{{route('design_card.destroy',encryptor('encrypt',$p->id))}}" method="post">
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