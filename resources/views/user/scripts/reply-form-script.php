<script>
function reply(commentId, event) {
    //alert('c'+commentId);
    event.preventDefault(); // Prevent the default behavior of the link
    
    // Log the comment ID to check if it's being captured correctly
    console.log("Clicked Reply button for comment ID:", commentId);
    
    var replyForm = $('.comment-item[data-comment-id="' + commentId + '"] .reply-form');
    
    // Log the reply form to check if it's being found correctly
    console.log("Reply form found:", replyForm);
    
    // Update the comment_id value in the reply form
    //replyForm.find('input[name="comment_id"]').val(commentId);
    
    replyForm.toggle();
}
function replyNested(replyId, event) {
    //alert('r'+replyId);
    console.log(replyId);
    event.preventDefault(); // Prevent the default behavior of the link
    var replyForm = $('.reply-item[data-reply-id="' + replyId + '"] .reply-nested-form');
    replyForm.toggle();
}
</script>