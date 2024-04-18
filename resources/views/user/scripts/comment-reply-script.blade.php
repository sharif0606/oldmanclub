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
            $('.comment-item[data-comment-id="' + commentId + '"] .comment-item-nested').prepend(response.commentHtml);
            
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

</script>
