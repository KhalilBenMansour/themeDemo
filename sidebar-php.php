<?php
// get category comments count 
$comments_args = array(
    'status' => 'approve'
);
$comments_count = 0; // start from zero
$all_comments = get_comments($comments_args);
foreach ($all_comments as $comment) {
    $post_id = $comment->comment_post_ID;
    if (!in_category('php', $post_id)) { //check if post not in php category
        continue;
    }
    $comments_count++; //xcounter
}
// get category posts count 
$cat = get_queried_object();
$posts_count = $cat->count;
?>
<div class="sidebar-php">
    <div class="widget">
        <h3 class="widget-title"><?php single_cat_title() ?> statistics</h3>
        <div class="widget-content">
            <ul>
                <li><span>Comments count </span>: <?php echo $comments_count; ?></li>
                <li><span>Articles count</span>: <?php echo $posts_count; ?></li>
            </ul>
        </div>
    </div>
    <div class="widget">
        <h3 class="widget-title">Wideget Title</h3>
        <div class="widget-content">Widget Content</div>
    </div>
    <div class="widget">
        <h3 class="widget-title">Wideget Title</h3>
        <div class="widget-content">Widget Content</div>
    </div>
</div>
<?php
