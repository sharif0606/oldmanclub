@extends('user.layout.base')
@section('title','SMS List')
@section('content')
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
                  <h1 class="h4 card-title mb-lg-0">Send sms list</h1>
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
                                    {{-- <a href="{{route('phonegroup.edit',encryptor('encrypt',$p->id))}}" class="text-warning">
                                        <i class="fa fa-edit"></i>
                                    </a>

                                    <a href="javascript:void()" onclick="$('#form{{$p->id}}').submit()" class="text-danger">
                                        <i class="fa fa-trash"></i>
                                    </a>
                                    <form id="form{{$p->id}}" action="{{route('phonegroup.destroy',encryptor('encrypt',$p->id))}}" method="post">
                                        @csrf
                                        @method('delete')
                                    </form> --}}
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