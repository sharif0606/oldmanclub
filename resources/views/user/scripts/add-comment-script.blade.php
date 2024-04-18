<script>
    $(document).ready(function() {
        $('.comment-form').on('submit', function(e) {
            e.preventDefault(); // Prevent the default form submission
            //alert('ok');

             //To Get Post ID
             var postId = $(this).find('input[name="post_id"]').data('post-id');
            //alert(postId)
            

            // Serialize the form data
            var formData = new FormData($(this)[0]);
            // Append CSRF token to form data
            formData.append('_token', '{{ csrf_token() }}');

            // Submit the form via AJAX
            $.ajax({
                type: 'POST',
                url: "{{ route('post-comment.store') }}",
                data: formData,
                processData: false,
                contentType: false,
                success: function(response) {
                    // Check if the comment already exists in the container
                    
                    /*if(firstCommentId)
                    $('#comments-container').find('.comment-item[data-comment-id="' +firstCommentId + '"]').prepend(response.commentHtml);
                    else{*/
                        $('.comments-container').find('.comment-wrap[data-post-id="' +postId + '"]').prepend(response.commentHtml);
                        //alert('.comment-wrap[data-post-id="' +postId + '"]');
                    //}
                    

                    // Clear the form fields
                    $('.comment-form textarea[name="content"]').val('');

                    // Display a success message (optional)
                    // You can handle success feedback as per your requirements
                    //alert('Comment added successfully!');
                },
                error: function(xhr, status, error) {
                    // Handle any errors (optional)
                    // You can display an error message or take other actions
                    alert('Error adding comment: ' + error);
                }
            });


        });
    });
</script>
