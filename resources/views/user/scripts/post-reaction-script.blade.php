<script>
    function post_reaction(postId, event, currentReactionType, reactionId) {
        event.preventDefault();
        if (reactionId) {
            // Send AJAX request to like the comment
            $.ajax({
                url: "{{ route('post-reaction-update') }}",
                method: 'GET', // Use PUT method for updating the reaction
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                data: {
                    post_id: postId,
                    reaction_type: currentReactionType, // Specify the reaction type
                    reactionId: reactionId
                },
                success: function(response) {
                    console.log(response);
                    // Update the like count on success
                    $('.post-reaction[data-post-id="' + postId + '"]').empty();
                    $('.post-reaction[data-post-id="' + postId + '"]').append(response.postHtml);
                    // Initialize tooltips with hover trigger
                    $('[data-bs-toggle="tooltip"]').tooltip({
                        trigger: 'hover'
                    });
                },
                error: function(xhr, status, error) {
                    console.error(xhr.responseText);
                }
            })
        } else {
            // Send AJAX request to like the comment
            $.ajax({
                url: "{{ route('post-reaction.store') }}",
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                data: {
                    post_id: postId,
                    reaction_type: currentReactionType // Specify the reaction type
                },
                success: function(response) {
                    console.log(response);
                    // Update the like count on success
                    $('.post-reaction[data-post-id="' + postId + '"]').empty();
                    $('.post-reaction[data-post-id="' + postId + '"]').append(response.postHtml);
                    // Initialize tooltips with hover trigger
                    $('[data-bs-toggle="tooltip"]').tooltip({
                        trigger: 'hover'
                    });
                },
                error: function(xhr, status, error) {
                    console.error(xhr.responseText);
                }
            })
        }
    }
</script>
