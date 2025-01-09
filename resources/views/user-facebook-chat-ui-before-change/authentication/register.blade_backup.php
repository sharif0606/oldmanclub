@extends('backend.layouts.appAuth')
@section('title', 'Sign Up')
@section('content')
    <style>
        .step {
            display: none;
        }
    </style>
    <div class="card">
        <div class="card-body">
            <form id="registrationForm" method="post">
                @csrf
                <div class="step" id="step1">
                    @include('user.authentication.registration.step1')
                </div>
                <div class="step" id="step2">
                    @include('user.authentication.registration.step2')
                </div>
                <div class="step" id="step3">
                    @include('user.authentication.registration.step3')
                </div>
            </form>
        </div>
    </div>
    <!-- Include jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <script>
        $(document).ready(function() {
            var currentStep = 0;
            var steps = $('.step');

            // Show the first step initially
            $(steps[currentStep]).show();

            $('.next').click(function() {
                var fname = $('#fname').val();
                var middle_name = $('#middle_name').val();
                var last_name = $('#last_name').val();
                var dob = $('#dob').val();
                var contact_no = $('#contact_no').val();
                var email = $('#email').val();
                var password = $('#password').val();
                var password_confirmation = $('#password_confirmation').val();
                var address_line_1 = $('#address_line_1').val();
                var address_line_2 = $('#address_line_2').val();
                var country_id = $('#country_id option:selected').val();
                var city_id = $('#city_id option:selected').val();
                var state_id = $('#state_id option:selected').val();
                var zip = $('#zip option:selected').val();
                if (currentStep === 0) {
                    // Step 1
                    $.ajax({
                        type: 'POST',
                        url: "{{ route('clientregister.store') }}",
                        data: {
                            '_token': $('input[name=_token]').val(),
                            'fname': fname,
                            'middle_name': middle_name,
                            'last_name': last_name,
                            'dob': dob,
                        },
                        success: function(response) {
                            console.log(response);
                            if (response.success) {
                                // Redirect or show success message
                                window.location.href = '/registration/success';
                            } else {
                                if (response.errors.fname) {
                                    $('#fname-error').text(response.errors.fname[0]);
                                } else {
                                    $('#fname-error').text('');
                                    proceedToNextStep();
                                }
                                if (response.errors.middle_name) {
                                    $('#middle_name-error').text(response.errors.middle_name[
                                        0]);
                                } else {
                                    $('#last_name-error').text('');
                                    proceedToNextStep();
                                }
                                if (response.errors.last_name) {
                                    $('#last_name-error').text(response.errors.last_name[0]);
                                } else {
                                    $('#last_name-error').text('');
                                    proceedToNextStep();
                                }
                                if (response.errors.dob) {
                                    $('#dob-error').text(response.errors.dob[0]);
                                } else {
                                    $('#dob-error').text('');
                                    proceedToNextStep();
                                }


                            }
                        }
                    });
                } else if (currentStep === 1) {
                    $.ajax({
                        type: 'POST',
                        url: "{{ route('clientregister.store') }}",
                        data: {
                            '_token': $('input[name=_token]').val(),
                            'fname': fname,
                            'middle_name': middle_name,
                            'last_name': last_name,
                            'dob': dob,
                            'contact_no': contact_no,
                            'email': email,
                            'password': password,
                            'password_confirmation': password_confirmation,
                        },
                        success: function(response) {
                           
                            if (response.success) {
                                // Redirect or show success message
                                window.location.href = '/registration/success';
                            } else {
                                if (response.errors.contact_no) {
                                    $('#contact_no-error').text(response.errors.contact_no[0]);
                                } else {
                                    $('#contact_no-error').text('');
                                }
                                if (response.errors.email) {
                                    $('#email-error').text(response.errors.email[0]);
                                } else {
                                    $('#email-error').text('');
                                }
                                if (response.errors.password) {
                                    $('#password-error').text(response.errors.password[0]);
                                } else {
                                    $('#password-error').text('');
                                }
                                if(response.errors.contact_no || response.errors.email[0] || response.errors.password[0]){
                                    proceedToNextStep();
                                }
                            }
                        }
                    })
                } else if (currentStep === 3) {
                    $.ajax({
                        type: 'POST',
                        url: "{{ route('clientregister.store') }}",
                        data: {
                            '_token': $('input[name=_token]').val(),
                            'fname': fname,
                            'middle_name': middle_name,
                            'last_name': last_name,
                            'dob': dob,
                            'contact_no': contact_no,
                            'password': password,
                            'password_confirmation': password_confirmation,
                            'country_id': country_id,
                            'city_id': city_id,
                            'state_id': state_id,
                            'zip_code': zip_code,
                        },
                        success: function(response) {
                            console.log(response);
                            if (response.success) {
                                // Redirect or show success message
                                window.location.href = '/registration/success';
                            }
                        }

                    })
                }/* else {
                    proceedToNextStep();
                }*/
            });

            function proceedToNextStep() {
                if (validateStep(currentStep)) {
                    alert(currentStep)
                    $(steps[currentStep]).hide();
                    currentStep++;
                    $(steps[currentStep]).show();
                }
            }

            function validateStep(step) {
                var isValid = true;
                $(steps[step]).find('input, textarea').each(function() {
                    if ($(this).prop('required') && !$(this).val()) {
                        isValid = false;
                        $('#' + $(this).attr('id') + '-error').text('This field is required.');
                        return false; // break out of loop early
                    } else {
                        $('#' + $(this).attr('id') + '-error').text('');
                    }
                });
                return isValid;
            }

            $('.prev').click(function() {
                $(steps[currentStep]).hide();
                currentStep--;
                $(steps[currentStep]).show();
            });

        });
    </script>
@endsection
