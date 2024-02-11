@extends('user.layout.app')
@section('title', 'NFC Card')
@section('content')
    <!-- Bordered table start -->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <!-- table bordered -->
                <div class="table-responsive">
                    <div>
                        <a class="pull-right fs-1" href="{{ route('nfc_card.create') }}"><i class="fa fa-plus"></i></a>
                        <a class="pull-right fs-1" href="{{ route('nfc_card.index') }}">NFC Card</a>
                    </div>
                    <table class="table table-bordered mb-0" id="phone_book">
                        <thead>
                            <tr>
                                <th scope="col">{{ __('#SL') }}</th>
                                <th scope="col">{{ __('Card Name') }}</th>
                                <th scope="col">{{ __('Card Type') }}</th>
                                <th scope="col">{{ __('Qr Code') }}</th>
                                <th class="white-space-nowrap">{{ __('Action') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            {{-- $nfc_cards --}}
                            @forelse($nfc_cards as $value)
                                <tr>
                                    <th scope="row">{{ ++$loop->index }}</th>
                                    <td>{{ __($value->card_name) }}</td>
                                    <td>
                                        @if ($value->card_type == 1)
                                            {{ __('Wrok') }}
                                        @else
                                            {{ __('Personal') }}
                                        @endif
                                    </td>
                                    <td>{!! QrCode::size(100)->generate(Request::url()) !!}</td>
                                    <td class="white-space-nowrap">
                                        @if ($value->status !== 2)
                                            <a href="{{ route('nfc_card.show', encryptor('encrypt', $value->id)) }}">
                                                <i class="fa fa-eye"></i>
                                            </a>
                                            <a href="{{ route('nfc_card.edit', encryptor('encrypt', $value->id)) }}">
                                                <i class="fa fa-edit"></i>
                                            </a>

                                            <a href="javascript:void()" onclick="$('#form{{ $value->id }}').submit()">
                                                <i class="fa fa-trash"></i>
                                            </a>
                                        @endif
                                        <form id="form{{ $value->id }}"
                                            action="{{ route('nfc_card.destroy', encryptor('encrypt', $value->id)) }}"
                                            method="post">
                                            @csrf
                                            @method('delete')
                                        </form>

                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <th colspan="8" class="text-center">No NFC Card Found</th>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
