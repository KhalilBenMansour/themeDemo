<?php get_header(); ?>
<div class="container author-page">
    <h1 class="profile-header text-center"><?php the_author_meta('nickname') ?> Page</h1>
    <div class="author-main-info">
        <!-- Start row  -->
        <div class="row">
            <div class="col-md-3">
                <?php
                $avatar_arguments = array(
                    'class' => 'img-thumbnail mx-auto d-block'
                );
                echo get_avatar(get_the_author_meta('ID'), 196, '', 'User avatar', $avatar_arguments);
                ?>
            </div>
            <div class="col-md-9">
                <ul class="author-names list-unstyled">
                    <li><span>First Name:</span> <?php the_author_meta('first_name') ?></li>
                    <li><span>Last Name:</span> <?php the_author_meta('last_name') ?></li>
                    <li><span>Nickname:</span> <?php the_author_meta('nickname') ?></li>
                </ul>
                <hr>
                <?php
                if (get_the_author_meta('description')) { // Check If User Have Biography 
                ?>
                    <p><?php the_author_meta('description') // Output The Biography 
                        ?></p>
                <?php
                } else {
                    echo 'Theres No Biography'; // Output Default Message If Theres No Biography
                }
                ?>
            </div>
        </div>
        <!-- End row  -->
    </div>
    <!-- Start row  -->
    <div class="row author-stats">
        <div class="col-md-3">
            <div class="stats">
                Posts Count
                <span><?php echo count_user_posts(get_the_author_meta('ID')) ?></span>
            </div>
        </div>
        <div class="col-md-3">
            <div class="stats">
                Comments Count
                <span>
                    <?php
                    $commentscount_arguments = array(
                        'user_id' => get_the_author_meta('ID'),
                        'count' => true
                    );
                    echo get_comments($commentscount_arguments)
                    ?>

                </span>
            </div>
        </div>
        <div class="col-md-3">
            <div class="stats">
                Total Posts View
                <span>0</span>
            </div>
        </div>
        <div class="col-md-3">
            <div class="stats">
                Testing
                <span>0</span>
            </div>
        </div>

    </div>
    <!-- End row  -->
</div>
<?php get_footer(); ?>