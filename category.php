<?php get_header(); ?>
<div class="container home-page">

    <div class="row">
        <div class="text-center category-information d-flex  flex-wrap align-items-center ">
            <div class="col-md-4 col-12">
                <h1 class="category-title"><?php single_cat_title() ?></h1>
            </div>
            <div class="col-md-4 col-12">
                <?php echo category_description() ?>
            </div>
            <div class=" col-md-4 col-12">
                <div class="cat-stats d-flex flex-column">
                    <span>Articles Count:<?php echo  get_category(get_query_var('cat'))->count ?></span>
                    <span>Comments Count: 100</span>
                </div>
            </div>
            <!-- <div class="clearFix"></div> -->
        </div>
        <?php
        if (have_posts()) :
            while (have_posts()) : the_post(); ?>
                <div class="col-sm-6">
                    <div class="main-post">
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
                            <?php the_excerpt(); ?>
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
                </div>
        <?php
            endwhile;
        endif; ?>
        <!-- <div class="clearFix"></div> -->
        <?php
        /*
        echo '<div class="post-pagination">';
        if (get_previous_posts_link()) { //check if previous page  exist

            previous_posts_link('<i class="fa-solid fa-chevron-left fa-fw fa-sm "></i>Prev');
        } else {
            echo '<span class="previous-span">Prev</span>';
        }
        if (get_next_posts_link()) {

            next_posts_link('Next<i class="fa-solid fa-chevron-right fa-fw fa-sm "></i>');
        } else {
            echo '<span class="next-span">Next</span>';
        }
        echo '</div>';
        */
        ?>
    </div><!-- end row  -->
    <div class="pagination-numbers">
        <?php echo numbering_pagination(); ?>
    </div>

</div>

<?php get_footer(); ?>