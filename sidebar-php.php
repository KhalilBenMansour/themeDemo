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
        <h3 class="widget-title">Latest HTML posts</h3>
        <div class="widget-content">
            <ul>
                <?php
                $posts_args = array(
                    'posts_per_page' => 5,
                    'cat' => 9
                );
                $query = new WP_Query($posts_args);
                if ($query->have_posts()) {
                    while ($query->have_posts()) {
                        $query->the_post();
                        echo '<li>';
                        echo '<a target="_blank" href="';
                        the_permalink();
                        echo '">';
                        the_title();
                        echo '</a>';
                        echo '</li>';
                    }
                }
                ?>
            </ul>
        </div>
    </div>
    <div class="widget">
        <h3 class="widget-title">Hot posts by Comments</h3>
        <div class="widget-content">
            <ul>
                <?php
                $hotpost_args = array(
                    'posts_per_page' => 1,
                    'orderby' => 'comment_count'
                );
                $hotquery = new WP_Query($hotpost_args);
                if ($hotquery->have_posts()) {
                    while ($hotquery->have_posts()) {
                        $hotquery->the_post() ?>;
                <li>
                    <a target="_blank" href=" <?php the_permalink() ?>">
                        <?php the_title() ?>
                    </a>
                    <hr>This post has:
                    <?php comments_popup_link('0 Comments', 'One Comment', '% Comments', 'comment-url', 'Comments disabled') ?>
                </li>

        <?php
                    }
                }
        ?>
            </ul>
        </div>
    </div>
</div>
<?php
