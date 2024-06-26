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
                    // Update UI based on the selected privacy mode
                    if (response.privacyMode === 'only_me') {
                        $('[data-toggle-id="' + postId + '"]').hide(); // Hide the post
                    } else {
                        $('[data-toggle-id="' + postId + '"]').show(); // Show the post
                    }
                },
                error: function(xhr, status, error) {
                    console.error(error); // Log any errors
                }
            });
        }
    });
</script>
