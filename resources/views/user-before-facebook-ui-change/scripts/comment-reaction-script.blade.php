<script>
    function comment_reaction(commentId, event, currentReactionType, reactionId) {
        event.preventDefault();
        if (reactionId) {
            // Send AJAX request to like the comment
            $.ajax({
                url: "{{ route('comment-reaction-update') }}",
                method: 'GET', // Use PUT method for updating the reaction
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                data: {
                    comment_id: commentId,
                    reaction_type: currentReactionType, // Specify the reaction type
                    reactionId: reactionId
                },
                success: function(response) {
                    console.log(response);
                    // Update the like count on success
                    $('.comment-reaction[data-comment-id="' + commentId + '"]').empty();
                    $('.comment-reaction[data-comment-id="' + commentId + '"]').append(response.postHtml);
                },
                error: function(xhr, status, error) {
                    console.error(xhr.responseText);
                }
            })
        } else {
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
                    console.log(response);
                    // Update the like count on success
                    $('.comment-reaction[data-comment-id="' + commentId + '"]').empty();
                    $('.comment-reaction[data-comment-id="' + commentId + '"]').append(response.postHtml);
                },
                error: function(xhr, status, error) {
                    console.error(xhr.responseText);
                }
            })
        }
    }
</script>
