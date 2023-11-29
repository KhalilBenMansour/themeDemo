<?php
if (comments_open()) { ?>
    <h3 class='comments-count'> <?php comments_number('0 Comments', '1 Comment', '% Comments') ?> </h3>
<?php
    echo '<ul class="list-unstyled comments-list">';
    $comment_arguments = array(
        'max_depth' => 3, //comment level
        'type' => 'comment', //comment type
        'avatar_size'       => 64, //avatar size in pixels

    );
    wp_list_comments($comment_arguments);
    echo '</ul>';
    echo '<hr class="comment-separator"/>';

    $commentform_arguments = array(
        'title_reply' => 'Add Your Comment', // Change Add Comment Text
        'title_reply_to' => 'Add a Reply To [%s]', // Change Add Reply To Text
        'class_submit' => 'btn btn-primary btn-md', // Change Submit Button Class
        'comment_notes_before' // Disable Email Message
    );
    comment_form($commentform_arguments);
} else {
    echo 'Sorry, Comments are disabled';
}
