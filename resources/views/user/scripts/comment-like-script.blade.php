<script>
    function reaction(commentId, event, currentReactionType,button) {
        event.preventDefault();
        //alert('ok');

        // Send AJAX request to like the comment
        $.ajax({
            url: "{{ route('comment-reaction.store') }}",
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            data: {
                comment_id: commentId,
                reaction_type: currentReactionType // Specify the reaction type
            },
            success: function(response) {
                // Update the like count on success
                $('.like-count[data-comment-id="' + commentId + '"]').text(response.likeCount);
                $(button).hide(); // Hide the clicked button
            },
            error: function(xhr, status, error) {
                console.error(xhr.responseText);
            }
        })
    }
</script>
