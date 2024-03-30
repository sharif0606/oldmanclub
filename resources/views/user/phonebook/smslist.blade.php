@extends('user.layout.base')
@section('title','SMS List')
@section('content')
<style>
    
    .paginate{
        float: right;
    }
</style>
<div class="row g-4">
      <div class="col-lg-3">
          <div class="d-flex align-items-center d-lg-none">
              <button class="border-0 bg-transparent" type="button" data-bs-toggle="offcanvas"
                  data-bs-target="#offcanvasSideNavbar" aria-controls="offcanvasSideNavbar">
                  <span class="btn btn-primary"><i class="fa-solid fa-sliders-h"></i></span>
                  <span class="h6 mb-0 fw-bold d-lg-none ms-2">My profile</span>
              </button>
          </div>
          @include('user.includes.profile-navbar')
      </div>
      <div class="col-md-8 col-lg-6 vstack gap-4">
          <div class="card">
              <div class="card-header d-sm-flex text-center align-items-center justify-content-between border-0 pb-0">
                  <h4 class="card-title h4">SMS List</h4>
                  <a class="btn btn-primary-soft" href="{{ route('sms_create') }}">
                    <i class="fa-solid fa-plus pe-1"></i>Send SMS</a>
              </div>
              <div class="card-body">
                  <div class="mb-0 pb-0">
                      <div class="row g-3">
                          <div class="card col-sm-12 shadow-lg">
                              <div class="card-body">
                                  <div class="table-responsive">
                                    <table class="table mb-0" id="phone_book">
                                        <thead>
                                            <tr>
                                                <th scope="col">{{__('#SL')}}</th>
                                                {{-- <th scope="col">{{__('Name')}}</th> --}}
                                                <th scope="col">{{__('Phone Number')}}</th>
                                                <th scope="col">{{__('Message')}}</th>
                                                {{-- <th class="white-space-nowrap">{{__('Action') }}</th> --}}
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse($data as $p)
                                            <tr>
                                                <th scope="row">{{ ++$loop->index }}</th>
                                                {{-- <td>{{$p->phonebook?->name_en}}</td> --}}
                                                <td>{{$p->contact_no}}</td>
                                                <td>{{$p->message_body}}</td>
                                                {{-- <td class="white-space-nowrap">
                                                    <a href="{{route('phonegroup.edit',encryptor('encrypt',$p->id))}}" class="text-warning">
                                                        <i class="fa fa-edit"></i>
                                                    </a>

                                                    <a href="javascript:void()" onclick="$('#form{{$p->id}}').submit()" class="text-danger">
                                                        <i class="fa fa-trash"></i>
                                                    </a>
                                                    <form id="form{{$p->id}}" action="{{route('phonegroup.destroy',encryptor('encrypt',$p->id))}}" method="post">
                                                        @csrf
                                                        @method('delete')
                                                    </form>
                                                </td> --}}
                                            </tr>
                                            @empty
                                            <tr>
                                                <th colspan="8" class="text-center">No Pruduct Found</th>
                                            </tr>
                                            @endforelse
                                        </tbody>
                                    </table>
                                    <div class="paginate pt-3 ms-auto">
                                        {{ $data->links() }}
                                    </div>
                                </div>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>
</div>


{{-- <main>
  <div class="container">
    <div class="row g-4">
      <div class="col-md-8 col-lg-6 vstack gap-4">
          <div class="card">
            <div class="card-header border-0 pb-0">
              <div class="row g-2">
                <div class="col-lg-2">
                  <h1 class="h4 card-title mb-lg-0">Send sms list</h1>
                </div>
                  <div class="col-sm-6 col-lg-3 ms-auto">
                  <a class="btn btn-primary-soft ms-auto w-100" href="{{ route('sms_create') }}"> <i class="fa-solid fa-plus pe-1"></i>Send sms</a>
                </div>
              </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped mb-0" id="phone_book">
                        <thead>
                            <tr>
                                <th scope="col">{{__('#SL')}}</th>
                                <th scope="col">{{__('Phone Number')}}</th>
                                <th scope="col">{{__('Message')}}</th>
                                <th class="white-space-nowrap">{{__('Action') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($data as $p)
                            <tr>
                                <th scope="row">{{ ++$loop->index }}</th>
                                <td>{{$p->contact_no}}</td>
                                <td>{{$p->message_body}}</td>
                                <td class="white-space-nowrap">
                                    <a href="{{route('phonegroup.edit',encryptor('encrypt',$p->id))}}" class="text-warning">
                                        <i class="fa fa-edit"></i>
                                    </a>

                                    <a href="javascript:void()" onclick="$('#form{{$p->id}}').submit()" class="text-danger">
                                        <i class="fa fa-trash"></i>
                                    </a>
                                    <form id="form{{$p->id}}" action="{{route('phonegroup.destroy',encryptor('encrypt',$p->id))}}" method="post">
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
</main> --}}
@endsection