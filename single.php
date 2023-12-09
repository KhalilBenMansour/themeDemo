<?php
get_header();
include(get_template_directory() . '/includes/breadcrumb.php'); //include breadcrumb
?>

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
    endif; ?>
    <!-- <div class="clearFix"></div> -->
    <?php

    // post_id         =>get_queried_object_id();
    // categories Id's =>wp_get_post_categories(get_queried_object_id());

    $random_posts_arguments = array(
        'posts_per_page' => 5,
        'orderby' => 'rand',
        'category__in' => wp_get_post_categories(get_queried_object_id()),
        'post__not_in' => array(get_queried_object_id())
    );
    $random_posts = new WP_Query($random_posts_arguments);
    if ($random_posts->have_posts()) :
        while ($random_posts->have_posts()) : $random_posts->the_post(); ?>
            <div class="category-posts">
                <h3 class="post-title">
                    <a href=<?php the_permalink() ?>>
                        <?php the_title(); ?>
                    </a>
                </h3>
                <hr>
            </div>
            <!-- <div class="clearFix"></div> -->
    <?php
        endwhile;
    else :
        echo 'Sorry, no posts matched your criteria.';

    endif;
    wp_reset_postdata();

    ?>
    <div class="author-section">
        <div class="row ">

            <div class="col-md-2">
                <?php
                $avatar_arguments = array(
                    'class' => 'img-thumbnail mx-auto d-block'
                );
                echo get_avatar(get_the_author_meta('ID'), 128, '', 'User avatar', $avatar_arguments);
                ?>
            </div>
            <div class="col-md-10 author-info">
                <h4>
                    <?php the_author_meta('first_name') ?>
                    <?php the_author_meta('last_name') ?>
                    (<span class="nickname"><?php the_author_meta('nickname') ?></span>)
                </h4>
                <?php
                if (get_the_author_meta('description')) : ?>
                    <p>
                        <?php the_author_meta('description') ?>
                    </p>
                <?php else :
                    echo 'There is no biography';
                endif; ?>
            </div>
        </div>
        <hr>
        <p class="author-stats">
            User Posts Count: <span class="posts-count"><?php echo count_user_posts(get_the_author_meta('ID')) ?></span>,
            User Profile Link:<?php the_author_posts_link() ?>
        </p>
    </div>
    <?php
    echo '<hr class="comment-separator"/>';
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
    echo '</div>';
    echo '<hr class="comment-separator"/>';
    comments_template() ?>
</div>

<?php get_footer(); ?>