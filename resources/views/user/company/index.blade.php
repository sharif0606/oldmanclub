@extends('user.layout.base')
@section('title', 'Company')
@section('content')
<style>
    table{
        /* background-color: white; */
    }
    .anchor{
        float:right;
    }
</style>
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
                  <h1 class="h4 card-title mb-lg-0">Company List</h1>
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
                  <a class="btn btn-primary-soft ms-auto w-100" href="{{route('company.create')}}"> <i class="fa-solid fa-plus pe-1"></i> Create Company</a>
                </div>
              </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped mb-0" id="phone_book">
                    <thead>
                        <tr>
                            <th scope="col">{{__('#SL')}}</th>
                            <th scope="col">{{__('QR_code')}}</th>
                            <th scope="col">{{__('Company Name')}}</th>
                            <th scope="col">{{__('Company Logo')}}</th>
                            <th scope="col">{{__('Email')}}</th>
                            <th scope="col">{{__('Phone Number')}}</th>
                            <th scope="col">{{__('Address')}}</th>
                            <th scope="col">{{__('City')}}</th>
                            <th scope="col">{{__('Status')}}</th>
                            <th class="white-space-nowrap">{{__('Action') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($company as $value)
                        <tr>
                            <th scope="row">{{ ++$loop->index }}</th>
                            <td>{{$value->qrcode}}</td>
                            <td>{{$value->company_name}}</td>
                            <td><img src="{{asset('public/uploads/company/'.$value->company_logo)}}" alt="" width="50px">
                            </td>
                            <td>{{$value->email}}</td>
                            <td>{{$value->phone_number}}</td>
                            <td>{{$value->address}}</td>
                            <td>{{$value->city}}</td>
                            <td style="color: @if($value->status==1) #FFC107 @elseif($value->status==2) #15CE73 @elseif($value->status==3) red @endif; font-weight:bold;">
                                {{ $value->status == 1 ? __('Pending') : ($value->status == 2 ? __('Accepted') : __('Rejected')) }}
                            </td>
                            <td class="white-space-nowrap">
                                @if($value->status==1)
                                    <a href="{{route('company.edit',encryptor('encrypt',$value->id))}}" class="text-warning">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                    <a href="{{route('company.show',encryptor('encrypt',$value->id))}}" class="">
                                        <i class="fa fa-eye"></i>
                                    </a>
                                    <a href="javascript:void()" onclick="$('#form{{$value->id}}').submit()" class="text-danger">
                                        <i class="fa fa-trash"></i>
                                    </a>
                                    <form id="form{{$value->id}}" action="{{route('company.destroy',encryptor('encrypt',$value->id))}}" method="post">
                                        @csrf
                                        @method('delete')
                                    </form>
                                @else
                                    <a href="{{route('company.show',encryptor('encrypt',$value->id))}}" class="">
                                        <i class="fa fa-eye"></i>
                                    </a>
                                @endif
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <th colspan="13" class="text-center">No Pruduct Found</th>
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
{{--  <div class="row">
    <div class="col-12">
        <div class="card py-4 px-2">

            <div class="table-responsive">
                <span class="fs-4">Company List</span>
                <a class="anchor px-2 fs-4" href="{{route('company.create')}}"><i class="fa fa-plus"></i></a>
            </div>
            <!-- table bordered -->
            <div class="table">
                <table class="table table-bordered table-striped mb-0" id="phone_book">
                    <thead>
                        <tr>
                            <th scope="col">{{__('#SL')}}</th>
                            <th scope="col">{{__('QR_code')}}</th>
                            <th scope="col">{{__('Company Name')}}</th>
                            <th scope="col">{{__('Company Logo')}}</th>
                            <th scope="col">{{__('Email')}}</th>
                            <th scope="col">{{__('Phone Number')}}</th>
                            <th scope="col">{{__('Address')}}</th>
                            <th scope="col">{{__('City')}}</th>
                            <th scope="col">{{__('Status')}}</th>
                            <th class="white-space-nowrap">{{__('Action') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($company as $value)
                        <tr>
                            <th scope="row">{{ ++$loop->index }}</th>
                            <td>{{$value->qrcode}}</td>
                            <td>{{$value->company_name}}</td>
                            <td><img src="{{asset('public/uploads/company/'.$value->company_logo)}}" alt="" width="50px">
                            </td>
                            <td>{{$value->email}}</td>
                            <td>{{$value->phone_number}}</td>
                            <td>{{$value->address}}</td>
                            <td>{{$value->city}}</td>
                            <td style="color: @if($value->status==1) #FFC107 @elseif($value->status==2) #15CE73 @elseif($value->status==3) red @endif; font-weight:bold;">
                                {{ $value->status == 1 ? __('Pending') : ($value->status == 2 ? __('Accepted') : __('Rejected')) }}
                            </td>
                            <td class="white-space-nowrap">
                                @if($value->status==1)
                                    <a href="{{route('company.edit',encryptor('encrypt',$value->id))}}" class="text-warning">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                    <a href="{{route('company.show',encryptor('encrypt',$value->id))}}" class="">
                                        <i class="fa fa-eye"></i>
                                    </a>
                                    <a href="javascript:void()" onclick="$('#form{{$value->id}}').submit()" class="text-danger">
                                        <i class="fa fa-trash"></i>
                                    </a>
                                    <form id="form{{$value->id}}" action="{{route('company.destroy',encryptor('encrypt',$value->id))}}" method="post">
                                        @csrf
                                        @method('delete')
                                    </form>
                                @else
                                    <a href="{{route('company.show',encryptor('encrypt',$value->id))}}" class="">
                                        <i class="fa fa-eye"></i>
                                    </a>
                                @endif
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <th colspan="13" class="text-center">No Pruduct Found</th>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>  --}}
@endsection
