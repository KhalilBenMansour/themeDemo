<?php get_header(); ?>
<div class="container post-page">
    <?php
    if (have_posts()) :
        while (have_posts()) : the_post(); ?>
            <div class="main-post">
                <?php edit_post_link('Edit <i class="fa-solid fa-pencil"></i>'); ?>
                <h3 class="post-title">
                    <a href=<?php the_permalink() ?>>
                        <?php the_title(); ?>
                    </a>
                </h3>
                <span class="post-author">
                    <i class="fa-regular fa-user fa-sm" style='color:#999;'></i> <?php the_author_posts_link(); ?>,
                </span>
                <span class="post-date">
                    <i class="fa-regular fa-calendar fa-sm" style='color:#999;'></i> <?php the_time('F j, Y'); ?>,
                </span>
                <span class="post-comments">
                    <i class="fa-regular fa-comments fa-sm" style='color:#999;'></i>
                    <?php comments_popup_link('0 Comments', 'One Comment', '% Comments', 'comment-url', 'Comments disabled') ?>,
                </span>

                <?php the_post_thumbnail('', ['class' => 'img-fluid img-thumbnail', 'title' => 'Featured Image']); ?>

                <div class="post-content">
                    <?php the_content(); ?>
                </div>
                <hr>
                <p class="post-categories">
                    <i class="fa-solid fa-tags fa-sm" style='color:#999;'></i>
                    <?php the_category(', '); ?>
                </p>
                <p class="post-tags">
                    <?php
                    if (has_tag()) {

                        the_tags();
                    } else {
                        echo 'Tags: There\'s no Tags';
                    }
                    ?>
                </p>
            </div>
    <?php
        endwhile;
    endif;
    echo '<div class="post-pagination">';
    if (get_previous_post_link()) { // check if previous post exists

        previous_post_link('%link', '<i class="fa-solid fa-chevron-left fa-fw fa-sm "></i>%title');
    } else {
        echo '<span class="previous-span">Previous Article</span>';
    }
    if (get_next_post_link()) {

        next_post_link('%link', '%title<i class="fa-solid fa-chevron-right fa-fw fa-sm "></i>');
    } else {
        echo '<span class="next-span">Next Article</span>';
    }
    echo '</div>'; ?>
</div>

<?php get_footer(); ?>