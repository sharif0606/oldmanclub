<script>
    $(document).ready(function() {
        $('.reply-form').on('submit', function(e) {
            e.preventDefault(); // Prevent the default form submission
            
            //To Get Last Comment ID
            var commentId = $(this).find('input[name="comment_id"]').data('comment-id');

            // Serialize the form data
            var formData = new FormData($(this)[0]);
            console.log(formData);
            // Append CSRF token to form data
            formData.append('_token', '{{ csrf_token() }}');

            // Store the reply form reference
            var replyForm = $(this);

            // Submit the form via AJAX
            $.ajax({
                type: 'POST',
                url: "{{ route('reply.store') }}",
                data: formData,
                processData: false,
                contentType: false,
                success: function(response) {
                    console.log(response);
                    // Check if the comment already exists in the container
                    $('.comment-item[data-comment-id="' + commentId + '"] .comment-item-nested').prepend(response.commentHtml);
                    //$('.comments-container').find('.comment-item[data-comment-id="' + commentId + '"] .comment-item-nested').prepend(response.commentHtml);

                    // Clear the form fields
                    replyForm.find('textarea[name="content"]').val('');

                    // Hide the reply form
                    replyForm.hide();
              
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
