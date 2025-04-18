<script>
    function submitReplyForm(event, form) {
        event.preventDefault(); // Prevent the default form submission

        // Get the comment ID from the form data attribute
        var commentId = $(form).data('comment-id');

        // Serialize the form data
        var formData = new FormData(form);
        
        // Append CSRF token to form data
        formData.append('_token', '{{ csrf_token() }}');

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
                //alert(commentId);
                $('.comment-item[data-comment-id="' + commentId + '"] .reply-item-nested').prepend(response.commentHtml)
                // Clear the form fields
                $('textarea', form).val('');
                
                // Hide the reply form
                $(form).hide();
            },
            error: function(xhr, status, error) {
                // Handle any errors (optional)
                alert('Error adding comment: ' + error);
            }
        });
    }
    $(document).ready(function() {
        // Event listener for keydown on the textarea within reply forms
        $('.reply-form textarea[name="content"]').on('keydown', function(e) {
            if ((e.keyCode === 13 || e.keyCode === 108) && !e.shiftKey) {  // Check if Enter key is pressed
                e.preventDefault(); // Prevent line break
                var form = $(this).closest('form')[0]; // Get the form element
                submitReplyForm(e, form); // Submit the reply form
            }
        });
    });
    function checkKey(e,s){
        if ((e.keyCode === 13 || e.keyCode === 108) && !e.shiftKey) {  // Check if Enter key is pressed
                e.preventDefault(); // Prevent line break
                var form = $(s).closest('form')[0]; // Get the form element
                submitReplyForm(e, form); // Submit the reply form
            }
    }
</script>
