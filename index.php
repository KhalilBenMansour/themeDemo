<?php get_header(); ?>
<div class="container">
    <div class="row">
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
                        <hr>
                        <p class="categories">
                            <i class="fa-solid fa-tags fa-sm" style='color:#999;'></i>
                            <?php the_category(', '); ?>
                        </p>
                    </div>
                </div>
        <?php
            endwhile;
        endif;
        ?>
    </div>
</div>

<!-- <div class="col-sm-6">
            <div class="main-post">
                <span class="post-author"><i class="fa-regular fa-user fa-sm" style='color:#999;'></i> Khalil, </span>
                <span class="post-date"><i class="fa-regular fa-calendar fa-sm" style='color:#999;'></i> 11/21/2023, </span>
                <span class="post-comments"><i class="fa-regular fa-comments fa-sm" style='color:#999;'></i> 20 comments, </span>
                <img class="img-fluid img-thumbnail" src="https://placehold.co/600x200" alt="">
                <p class="post-content">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Aperiam magni, inventore voluptatem omnis dicta sapiente ipsam maiores saepe id architecto libero adipisci unde repellat ex aut veniam accusantium ratione. Deserunt.
                </p>
                <hr>
                <p class="categories">
                    <i class="fa-solid fa-tags fa-sm" style='color:#999;'></i>
                    html, testing, coding, test
                </p>
            </div>
        </div> -->


<?php get_footer(); ?>