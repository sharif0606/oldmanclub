@extends('frontend.layouts.app')
@section('title', 'Old Club Man')
@section('body-attr', 'style="background-color: #ebebf2;"')
@section('content')
   
    <!-- Cart Section Starts Here -->
    
    <!-- Cart Section Ends Here -->
@endsection

@push('scripts')
    <script>
        function qty_increment(inc) {
            var qty_inc = $('.qty_' + inc).val();
            alert(qty_inc);
            //add_to_cart(inc, 'inc')
        }

        function qty_decrement(dec) {
            var qty_dec = $('.qty_' + dec).val();
            //add_to_cart(dec, 'dec');
        }

        function add_to_cart(id, op) {
            var data = '';
            var type = '';
            $.ajax({
                dataType: "json",
                url: '{{ route('addto_cart', "'+id+'") }}',
                method: "get",
                data: {
                    quantity: $('.qty_' + i).val(),
                    op: op
                },
                success: function(response) {
                    type = response.type;
                    toastr.options = {
                        "closeButton": true,
                        "progressBar": true
                    }
                },
                error: function(request, error) {
                    console.log(arguments);
                    console.log("Error:" + error);
                },
                complete: function() {
                    hideLoadingSpinner();
                    $('.cart-calc').hide();
                }
            });
        }
        $(document).ready(function() {
            /*$(".remove-from-cart").click(function(e) {
                e.preventDefault();
                var ele = $(this);
                if (confirm("Are you sure want to remove?")) {
                    $.ajax({
                        url: '{{ route('remove.from.cart') }}',
                        method: "DELETE",
                        data: {
                            _token: '{{ csrf_token() }}',
                            id: ele.data('id') // Use data-id attribute
                        },
                        success: function(response) {
                            window.location.reload();
                        }
                    });
                }
            });

            $('.quantity-buttons button').click(function(e) {
                e.preventDefault();
                var action = $(this).data('action');
                var id = $(this).data('id');
                var currentQuantity = parseInt($('.quantity[data-id="' + id + '"]').text());
                var newQuantity = action === 'increase' ? currentQuantity + 1 : Math.max(currentQuantity - 1, 1); // Ensure quantity is never below 1
                $('.quantity[data-id="' + id + '"]').text(newQuantity);

                // Send AJAX request to update session data
                $.ajax({
                    url: '{{ route('update.cart') }}',
                    method: 'POST',
                    data: {
                        id: id,
                        quantity: newQuantity
                    },
                    success: function(response) {
                        console.log(response); // Handle success response
                    },
                    error: function(xhr) {
                        console.log(xhr.responseText); // Handle error response
                    }
                });
            });*/
        });
    </script>
@endpush
