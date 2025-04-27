<script>
    function reply_reaction(replyId, event, currentReactionType, reactionId) {
        event.preventDefault();
        if (reactionId) {
            // Send AJAX request to like the comment
            $.ajax({
                url: "{{ route('reply-reaction-update') }}",
                method: 'GET', // Use PUT method for updating the reaction
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                data: {
                    reply_id: replyId,
                    reaction_type: currentReactionType, // Specify the reaction type
                    reactionId: reactionId
                },
                success: function(response) {
                    console.log(response);
                    // Update the like count on success
                    $('.reply-reaction[data-reply-id="' + replyId + '"]').empty();
                    $('.reply-reaction[data-reply-id="' + replyId + '"]').append(response.postHtml);
                },
                error: function(xhr, status, error) {
                    console.error(xhr.responseText);
                }
            })
        } else {
            // Send AJAX request to like the comment
            $.ajax({
                url: "{{ route('reply-reaction.store') }}",
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                data: {
                    reply_id: replyId,
                    reaction_type: currentReactionType // Specify the reaction type
                },
                success: function(response) {
                    console.log(response);
                    // Update the like count on success
                    $('.reply-reaction[data-reply-id="' + replyId + '"]').empty();
                    $('.reply-reaction[data-reply-id="' + replyId + '"]').append(response.postHtml);
                },
                error: function(xhr, status, error) {
                    console.error(xhr.responseText);
                }
            })
        }
    }
</script>
