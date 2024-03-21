@extends('user.layout.base')
@section('title','Shipping')
@section('content')
<style>
    table{
        /* background-color: white; */
    }
    .anchor{
        float:right;
    }
</style>
<!-- Bordered table start -->
<main>
  <!-- Container START -->
  <div class="container">
    <div class="row g-4">
      <!-- Main content START -->
      <div class="col-md-8 col-lg-6 vstack gap-4">
          <!-- Card START -->
          <div class="card">
            <!-- Card header START -->
            <div class="card-header border-0 pb-0">
              <div class="row g-2">
                <div class="col-lg-2">
                  <!-- Card title -->
                  <h1 class="h4 card-title mb-lg-0">Shipping List</h1>
                </div>
                {{--  <div class="col-sm-6 col-lg-3 ms-lg-auto">
                  <!-- Select Groups -->
                  <select class="form-select js-choice choice-select-text-none" data-search-enabled="false">
                    <option value="AB">Alphabetical</option>
                    <option value="NG">Newest group</option>
                    <option value="RA">Recently active</option>
                    <option value="SG">Suggested</option>
                  </select>
                </div>  --}}
                  <div class="col-sm-6 col-lg-3 ms-auto">
                  <!-- Button modal -->
                  <a class="btn btn-primary-soft ms-auto w-100" href="{{route('shipping.create')}}"> <i class="fa-solid fa-plus pe-1"></i> Create shipping</a>
                </div>
              </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped mb-0" id="phone_book">
                        <thead>
                            <tr>
                                <th scope="col">{{__('#SL')}}</th>
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
                                <td>{{__($value->shippingdetail?->shipping_title)}}</td>
                                <td>{{__($value->shippingdetail?->shipping_description)}}</td>
                                <td>
                                    @if($value->status == 1) {{__('pending') }} @elseif($value->status==2) {{__('approved') }} @else{{__('reject')}} @endif
                                </td>
                                <td>{{$value->reject_note}}</td>
                                <td class="white-space-nowrap">
                                    @if($value->status !== 2)
                                    <a href="{{route('shipping.edit',encryptor('encrypt',$value->id))}}" class="text-warning">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                    <a href="{{route('shipp_comment',encryptor('encrypt',$value->id))}}">
                                        comment
                                    </a>

                                    <a href="javascript:void()" onclick="$('#form{{$value->id}}').submit()" class="text-danger">
                                        <i class="fa fa-trash"></i>
                                    </a>
                                    @endif
                                    <form id="form{{$value->id}}" action="{{route('shipping.destroy',encryptor('encrypt',$value->id))}}" method="post">
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
    </div>
  </div>
</main>

@endsection

