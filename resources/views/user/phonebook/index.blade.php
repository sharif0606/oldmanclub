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
<main>
    <div class="container">
        <div class="row g-4">
            <div class="col-lg-3">
                <div class="d-flex align-items-center d-lg-none">
                <button class="border-0 bg-transparent" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasSideNavbar" aria-controls="offcanvasSideNavbar">
                    <span class="btn btn-primary"><i class="fa-solid fa-sliders-h"></i></span>
                    <span class="h6 mb-0 fw-bold d-lg-none ms-2">My profile</span>
                </button>
                </div>
                @include('user.includes.profile-navbar')
            </div>
            <div class="col-md-8 col-lg-6 vstack gap-4">
            <div class="card">
                <div class="card-header border-0 pb-0">
                    <div class="row g-2">
                        <div class="col-lg-3">
                            <h1 class="h4 card-title mb-lg-0">CONTACT LIST</h1>
                        </div>
                        <div class="col-sm-6 col-lg-6 ms-auto">
                            <div class="row">
                                <div class="col-md-12 text-md-end">
                                    <a href="#" id="downloadVCard" class="fs-5 mx-2 text-success"><i class="fa fa-address-card"></i></a>
                                    <a href="{{ route('phonebook_download') }}" class="fs-5 mx-2 text-success" download><i class="fa fa-download"></i></a>
                                    {{-- <a class="btn btn-primary-soft" href="{{route('sms_send')}}">sms</a> --}}
                                    <a class="btn btn-primary-soft ms-auto" href="{{ route('phonebook.create') }}"> <i class="fa-solid fa-plus pe-1"></i> CREATE CONTACT</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="tab-content mb-0 pb-0">
                        <div class="tab-pane fade show active" id="tab-1">
                            <div class="row g-4">
                                @foreach($phonebook as $p)
                                <div class="col-sm-6 col-lg-4">
                                    {{-- <a href="{{route('phonebook.show',encryptor('encrypt',$p->id))}}" class=""> </a> --}}
                                    <div class="card">
                                        {{-- @if($p->phonegroup?->image) --}}
                                        @if($p->image)
                                        <div class="h-150px rounded-top" style="background-image: url({{asset('public/uploads/phonebook/'.$p->image)}}); background-position: center; background-size: cover; background-repeat: no-repeat;"></div>
                                        @else
                                        <div class="h-150px rounded-top" style="background-image: url({{asset('public/user/assets/images/bg/firstimg.jpg')}}); background-position: center; background-size: cover; background-repeat: no-repeat;"></div>
                                        @endif
                                        <div class="card-body text-center pt-0">
                                            {{-- <div class="avatar avatar-lg mt-n5 mb-3">
                                                <a href="#"><img class="avatar-img rounded-circle border border-white border-3 bg-white" src="{{ asset('public/user/assets/images/logo/08.svg') }}" alt=""></a>
                                            </div> --}}
                                            
                                            <h5 class="mb-0"> <a href="#">{{ $p->name_en }}</a> </h5>
                                            <h6 class="mb-0"> <a href="#">{{ $p->contact_en }}</a> </h6>
                                            <h6 class="mb-0"> <a href="#">{{ $p->email }}</a> </h6>
                                            <small> <i class="bi bi-lock pe-1"></i> {{$p->phonegroup?->group_name}}</small>
                                        </div>
                                        <div class="d-flex">
                                            <a href="{{route('phonebook.edit',encryptor('encrypt',$p->id))}}" class="btn btn-success-soft text-center w-50"><i class="fa fa-edit"></i></a>

                                            <a href="javascript:void()" onclick="$('#form{{$p->id}}').submit()" class="btn btn-danger-soft text-center w-50">
                                            <i class="fa fa-trash"></i>
                                            </a>
                                            <form id="form{{$p->id}}" action="{{route('phonebook.destroy',encryptor('encrypt',$p->id))}}" method="post" onsubmit="return confirm('Are you sure you want to delete this item?');">
                                                @csrf
                                                @method('delete')
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                            <div class="paginate pt-3">
                                {{ $phonebook->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
      </div>
    </div>
</main>

{{-- <main>
    <div class="container">
        <div class="row g-4">
            <div class="col-lg-3">
                <div class="d-flex align-items-center d-lg-none">
                    <button class="border-0 bg-transparent" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasSideNavbar" aria-controls="offcanvasSideNavbar">
                        <span class="btn btn-primary"><i class="fa-solid fa-sliders-h"></i></span>
                        <span class="h6 mb-0 fw-bold d-lg-none ms-2">My profile</span>
                    </button>
                </div>
                    @include('user.includes.profile-navbar')
            </div>
            <div class="col-md-8 col-lg-6 vstack gap-4">
                <div class="card">
                    <div class="card-header border-0 pb-0">
                        <div class="row g-2">
                            <div class="col-lg-2">
                            <h1 class="h4 card-title mb-lg-0">Contact List</h1>
                            </div>
                            <div class="col-sm-6 col-lg-6 ms-auto">
                                <a class="btn btn-primary-soft" href="{{route('sms_create')}}">sms</a>
                                <a href="#" id="downloadVCard" class="fs-5 mx-2 text-success"><i class="fa fa-address-card"></i></a>
                                    <a href="{{ route('phonebook_download') }}" class="fs-5 mx-2 text-success" download><i class="fa fa-download"></i></a>
                                <a class="btn btn-primary-soft ms-auto" href="{{route('phonebook.create')}}"> <i class="fa-solid fa-plus pe-1"></i> Create Contact</a>
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
                                            <form id="form{{$p->id}}" action="{{route('phonebook.destroy',encryptor('encrypt',$p->id))}}" method="post" onsubmit="return confirm('Are you sure you want to delete this item?');">
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
</main> --}}
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
