<?php
if (comments_open()) {
    echo '<h3>' . comments_number('0 Comments', '1 Comment', '% Comments') . '</h3>';
    echo '<ul class="list-unstyled comments-list">';
    $comment_arguments = array(
        'max_depth' => 3,
        'type' => 'comment',
        'avatar_size'       => 64,

    );
    wp_list_comments($comment_arguments);
    echo '</ul>';
} else {
    echo 'Sorry, Comments are disabled';
}
