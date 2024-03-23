@extends('user.layout.base')
@section('title','Phonebook')
@section('content')
<main>
  <!-- Container START -->
    <div class="container">
        <div class="row g-4">
        <!-- Main content START -->
            <div class="col-lg-8 mx-auto">
                <div class="bg-mode p-4">
                    <p class="fs-4">Purchase SMS package</p>
                    <div class="compose-content">
                        <form action="{{ route('purchase.store') }}" method="post" class="row">
                            @csrf
                            <div class="col-12">
                                <select name="smspackage_id" id="smspackage_id" class="form-control mb-3">
                                    <option value="">Select Package</option>
                                    @foreach($sms as $s)
                                        <option value="{{ $s->id }}" data-sms-count="{{ $s->number_of_sms }}">{{ $s->title }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-12">
                                <input type="text" class="form-control mb-3" id="number_of_sms" name="number_of_sms" placeholder="Number of sms" readonly>
                            </div>
                            <div class="col-12">
                                <input type="text" class="form-control mb-3" id="validity_count" name="validity_count" placeholder="Validity Count">
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary px-3">Purchase</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
  <!-- Container END -->
</main>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $("#smspackage_id").change(function() {
            var selectedOption = $(this).find(":selected");
            var smsCount = selectedOption.data("sms-count");
            $("#number_of_sms").val(smsCount);
        });
    });
    $(document).ready(function() {
        $("#smspackage_id").change(function() {
            var selectedOption = $(this).find(":selected");
            var createdAt = selectedOption.data("created-at");
            var packageCreatedAt = new Date(createdAt);
            var currentDate = new Date();
            var differenceInMilliseconds = currentDate.getTime() - packageCreatedAt.getTime();
            var differenceInDays = Math.floor(differenceInMilliseconds / (1000 * 60 * 60 * 24));
            $("#validity_count").val(differenceInDays);
        });
    });

</script>
@endsection