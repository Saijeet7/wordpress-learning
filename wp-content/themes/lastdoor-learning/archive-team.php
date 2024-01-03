<?php
get_header();
the_post();
?>
<main>
    <div class="container container--top">
        <h1>Welcome to Teams</h1>
        <?php
        // Custom WP_Query to fetch posts from your custom post type
        $args = array(
            'post_type' => 'team',
            'posts_per_page' => -1,
        );

        $team_query = new WP_Query($args);

        if ($team_query->have_posts()):
            while ($team_query->have_posts()):
                $team_query->the_post();
                $custom_image = get_field('image');
                $desgination = get_field('designation');
                ?>
                <div class="team__content">
                    <a class="team-title" href="<?php the_permalink(); ?>">
                        <h2 class="team_title">
                            <?php the_title(); ?>
                        </h2>
                    </a>
                    <?php if (!empty($desgination)) { ?>
                        <span><strong>Desgination</strong> :
                            <?php echo $desgination ?>
                        </span>
                    <?php }
                    ; ?>

                    <?php if (!empty($custom_image)) { ?>
                        <figure class="custom__image">
                            <img src="<?php echo $custom_image['url'] ?>" alt="<?php echo $custom_image['alt'] ?>">
                        </figure>
                    <?php }
                    ; ?>
                    <p>
                        <?php echo wp_trim_words(get_the_content(), 50); ?>
                    </p>
                    <a class="button" href="<?php the_permalink(); ?>">Read More</a>
                    <hr>
                </div>

                <?php
            endwhile;
            wp_reset_postdata(); // Reset post data to restore the original query
        endif;
        ?>
    </div>
</main>
<?php get_footer(); ?>