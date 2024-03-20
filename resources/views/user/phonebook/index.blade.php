@extends('user.layout.base')
@section('title','Phonebook')
@section('content')
<style>
    .button{
        float: right;

    }
    .paginate{
        float: right;
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
                  <h1 class="h4 card-title mb-lg-0">Contact List</h1>
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
                  <a href="#" id="downloadVCard" class="fs-5 mx-2 text-success"><i class="fa fa-address-card"></i></a>
                            {{--  <button id="downloadVCard"><i class="fa fa-address-card text-info"></i>
                            </button>  --}}
                            <!-- Inside your blade file -->

                    <a href="{{ route('phonebook_download') }}" class="fs-5 mx-2 text-success" download>
                                <i class="fa fa-download"></i>
                            </a>
                  <a class="btn btn-primary-soft ms-auto" href="{{route('phonebook.create')}}"> <i class="fa-solid fa-plus pe-1"></i> Create Group</a>
                </div>
              </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped table-hover mb-0" id="phone_book">
                        <thead>
                            <tr>
                                <th scope="col">{{__('#SL')}}</th>
                                <th scope="col">{{__('Name')}}</th>
                                <th scope="col">{{__('Group')}}</th>
                                <th scope="col">{{__('Contact No')}}</th>
                                <th scope="col">{{__('E-mail')}}</th>
                                <th class="white-space-nowrap">{{__('Action') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($phonebook as $p)
                            <tr>
                                <th scope="row">{{ ++$loop->index }}</th>
                                <td>{{$p->name_en}}</td>
                                <td>{{$p->phonegroup?->group_name}}</td>
                                <td>{{$p->contact_en}}</td>
                                <td>{{$p->email}}</td>
                                <td class="white-space-nowrap">
                                    <a href="{{route('phonebook.edit',encryptor('encrypt',$p->id))}}" class="text-warning">
                                        <i class="fa fa-edit"></i>
                                    </a>

                                    <a href="javascript:void()" onclick="$('#form{{$p->id}}').submit()" class="text-danger">
                                        <i class="fa fa-trash"></i>
                                    </a>
                                    <form id="form{{$p->id}}" action="{{route('phonebook.destroy',encryptor('encrypt',$p->id))}}" method="post">
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
                    <div class="paginate pt-3">
                        {{ $phonebook->links() }}
                    </div>
                </div>
            </div>
        </div>
      </div>
    </div>
  </div>
</main>

{{--  <div class="row">
    <div class="col-7">
        <div class="card">
            <h3 class="text-center m-0">Phone Book</h3>
            <!-- table bordered -->
            <div class="table-responsive">
                <div class="mb-2">
                    <button id="downloadVCard"><i class="fa-solid fa-address-card"></i>
                    </button>
                    <!-- Inside your blade file -->
                    <!-- <button class="btn btn-sm btn-primary float-end" onClick="get_print()"><i class="bi bi-file-excel"></i> Export Excel</button> -->
                    <a href="{{ route('phonebook_download') }}" class="pull-right fs-5 mx-2" download>
                        <i class="fa fa-download"></i>
                    </a>
                    <a class="pull-right fs-5" href="{{route('phonebook.create')}}" data-toggle="modal" data-target="#phonecreatModal"><i class="fa fa-plus"></i></a>
                </div>
                <table class="table table-bordered mb-0" id="phone_book">
                    <thead>
                        <tr>
                            <th scope="col">{{__('#SL')}}</th>
                            <th scope="col">{{__('Name')}}</th>
                            <th scope="col">{{__('Group')}}</th>
                            <th scope="col">{{__('Contact No')}}</th>
                            <th scope="col">{{__('E-mail')}}</th>
                            <th class="white-space-nowrap">{{__('Action') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($phonebook as $p)
                        <tr>
                            <th scope="row">{{ ++$loop->index }}</th>
                            <td>{{$p->name_en}}</td>
                            <td>{{$p->phonegroup?->group_name}}</td>
                            <td>{{$p->contact_en}}</td>
                            <td>{{$p->email}}</td>
                            <td class="white-space-nowrap">
                                <a href="{{route('phonebook.edit',encryptor('encrypt',$p->id))}}">
                                    <i class="fa fa-edit"></i>
                                </a>

                                <a href="javascript:void()" onclick="$('#form{{$p->id}}').submit()">
                                    <i class="fa fa-trash"></i>
                                </a>
                                <form id="form{{$p->id}}" action="{{route('phonebook.destroy',encryptor('encrypt',$p->id))}}" method="post">
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
    <div class="col-5">
        <div class="card p-3">
            <form action="{{route('phonebook.store')}}" method="post" class="row">
                @csrf
                <div class="col-12">
                    <select name="group_id" id="" class="form-control mb-3">
                        <option value="">Select Group</option>
                        @foreach($phonegroup as $group)
                        <option value="{{$group->id}}" {{ old('group_id')==$group->id?"selected":""}}>{{$group->group_name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-12">
                    <input type="text" class="form-control mb-3" id="Phone" name="contact_en" placeholder="Phone no">
                </div>
                <div class="col-12">
                    <input type="text" class="form-control mb-3" id="Name" name="name_en" placeholder="Name">
                </div>
                <div class="col-12">
                    <input type="email" class="form-control mb-3" id="Email" name="email" placeholder="Email">
                </div>
                <div class="col-12">
                    <button type="submit" class="btn btn-primary">Phone No Save</button>
                </div>
            </form>
        </div>
    </div>
    <div class="modal fade" id="phonecreatModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content rounded-0 border-0 p-4">
                <div class="modal-header border-0">
                    <h3 class="text-center">Phonebook</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="login">
                        <form action="{{route('phonebook.store')}}" method="post" class="row">
                            @csrf
                            <div class="col-12">
                                <select name="group_id" id="" class="form-control mb-3">
                                    <option value="">Select Group</option>
                                    @foreach($phonegroup as $group)
                                    <option value="{{$group->id}}" {{ old('group_id')==$group->id?"selected":""}}>{{$group->group_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-12">
                                <input type="text" class="form-control mb-3" id="Phone" name="contact_en" placeholder="Phone no">
                            </div>
                            <div class="col-12">
                                <input type="text" class="form-control mb-3" id="Name" name="name_en" placeholder="Name">
                            </div>
                            <div class="col-12">
                                <input type="email" class="form-control mb-3" id="Email" name="email" placeholder="Email">
                            </div>
                            <div class="col-12">
                                <button type="submit" class="btn btn-primary">Phone No Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>  --}}
<script>
    document.getElementById('downloadVCard').addEventListener('click', function() {

        var $phonebook = @json($phonebook);
        function generateVCard(phonebook) {
            var vCard = "BEGIN:VCARD\nVERSION:3.0";

            phonebook.forEach(function(contact) {
                var Name = contact.name_en;
                var Phone = contact.contact_en;
                var Email = contact.email;

                vCard += "\nFN:" + Name;
                vCard += "\nTEL:" + Phone;
                vCard += "\nEMAIL:" + Email;
                vCard += "\n";
            });
            vCard += "\nEND:VCARD";
            return vCard;
        }
        var vCardData = generateVCard($phonebook);
            var link = document.createElement('a');
            link.setAttribute('href', 'data:text/vcard;charset=utf-8,' + encodeURIComponent(vCardData));
            link.setAttribute('download', 'phonebook.vcf');
            link.click();
    });

</script>

<script>
    // function exportReportToExcel(phone_book, filename) {
    // let table = document.getElementById(phone_book);
    // TableToExcel.convert(table[2], {
    //     name: `${filename}.csv`,
    //     sheet: {
    //         name: 'Stock Report'
    //     }
    // });
    //     $("#my-content-div").html("");
    //     $('.full_page').html("");
    // }

    //     function get_print() {
    //     $('.full_page').html('<div style="background:rgba(0,0,0,0.5);width:100vw; height:100vh;position:fixed; top:0; left;0"><div class="loader my-5"></div></div>');
    //     $.get(
    //         "{{ route('phonebook.index') }}{{ ltrim(Request()->fullUrl(), Request()->url()) }}",
    //         function (data) {
    //             $("#my-content-div").html(data);
    //         }
    //     ).done(function () {
    //         exportReportToExcel('table', 'Stock Report Warehouse Wise');
    //     });
    // }
</script>
@endsection
@push('scripts')
<script src="{{asset('public/js/tableToExcel.js')}}"></script>
@endpush
