@extends('backend.layouts.app')
@section('title','NFC Price Section')
@section('content')
<div class="col-lg-12">
    <div class="card">
        <div class="card-header">
            <h4></h4>
                <div>
                    <a class="pull-right fs-1" href="{{route('nfccardprice.create')}}"><i class="fa fa-plus">Add new</i></a>
                </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-responsive-sm">
                    <thead>
                        <tr>
                            <th scope="col">{{__('#SL')}}</th>
                            <th scope="col">{{__('Nfc Card Name')}}</th>
                            <th scope="col">{{__('Card Price')}}</th>
                            <th scope="col">{{__('Card Title')}}</th>
                            <th scope="col">{{__('Card Feature List')}}</th>
                            <th scope="col">{{__('Payment Type')}}</th>
                            <th scope="col">{{__('Action')}}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($nfccardprice as $value)
                        <tr>
                            <td>{{ ++$loop->index }}</td>
                            <td>{{$value->nfc_card_name}} </td>
                            <td>{{$value->card_price}} </td>
                            <td>{{$value->card_title}} </td>
                            <td>{{$value->payment_type}} </td>
                            <td>{{ implode(', ', $value->card_feature_list) }} </td>
                            <td>
                                <div class="d-flex">
                                    <a href="{{route('nfccardprice.edit',encryptor('encrypt',$value->id))}}">
                                        <i class="fa fa-edit mx-1"></i>
                                    </a>
                                    <form id=""
                                        action="{{ route('nfccardprice.destroy', encryptor('encrypt', $value->id)) }}"
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