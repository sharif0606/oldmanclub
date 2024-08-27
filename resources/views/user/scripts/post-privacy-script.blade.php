<script>
    $(document).ready(function() {
        $(document).on('click', 'a[data-privacy-mode="only_me"]', function(e) {
            e.preventDefault();
            var postId = $(this).data('privacy-post-id'); // Get the post ID
            updatePrivacyMode(postId, 'only_me'); // Call function to update privacy mode
        });

        // Event delegation for "Public" option
        $(document).on('click', 'a[data-privacy-mode="public"]', function(e) {
            e.preventDefault();
            var postId = $(this).data('privacy-post-id'); // Get the post ID
            updatePrivacyMode(postId, 'public'); // Call function to update privacy mode
        });

        // Event delegation for "Public" option
        $(document).on('click', 'a[data-privacy-mode="report"]', function(e) {
            e.preventDefault();
            var postId = $(this).data('privacy-post-id'); // Get the post ID
            updatePrivacyMode(postId, 'is_report'); // Call function to update privacy mode
        });


        // Function to update privacy mode via AJAX
        function updatePrivacyMode(postId, privacyMode) {
            $.ajax({
                url: "{{ url('/') }}"+'/user/post/' + postId, // Specify the URL directly
                type: 'PUT', // Use PUT method for update
                data: {
                    _token: '{{ csrf_token() }}', // Add CSRF token if needed
                    _method: 'PUT', // Laravel uses a hidden _method field to emulate PUT and DELETE requests
                    post_id: postId, // Include the post ID in the request data if needed
                    privacy_mode: privacyMode
                },
                success: function(response) {
                    console.log(response);
                    var postId = response.postId;
                    var $dropdownItem = $('a[data-privacy-post-id="' + postId + '"]');

                    if (response.privacyMode === 'only_me') {
                        // Update the span with the privacy mode icon
                        $('div[data-toggle-id="' + postId + '"] span.public')
                            .removeClass('public')
                            .addClass('only')
                            .html('<i class="bi bi-lock"></i>');
                            toastr.success('Privacy mode updated to Only Me');
                        // Update the dropdown menu
                        $dropdownItem
                            .attr('data-privacy-mode', 'public')
                            .html('<i class="bi bi-globe fa-fw pe-2"></i> Public');
                    } else if (response.privacyMode === 'public') {
                        // Update the span with the privacy mode icon
                        $('div[data-toggle-id="' + postId + '"] span.only')
                            .removeClass('only')
                            .addClass('public')
                            .html('<i class="bi bi-globe"></i>');
                            toastr.success('Privacy mode updated to Public');
                        // Update the dropdown menu
                        $dropdownItem
                            .attr('data-privacy-mode', 'only_me')
                            .html('<i class="bi bi-x-circle fa-fw pe-2"></i> Only Me');
                    } else if (response.privacyMode === 'is_report') {
                        alert('Post reported successfully');
                    }
                    toastr.options = {
                        "positionClass": "toast-bottom-left",
                        "closeButton": true,
                        "progressBar": true,
                        "timeOut": "5000",
                    };
                },
                error: function(xhr, status, error) {
                    console.error(error); // Log any errors
                }
            });
        }
    });
</script>
