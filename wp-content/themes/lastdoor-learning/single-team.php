<?php
get_header();
the_post();


?>
<main>
    <?php
    $custom_image = get_field('image');
    $desgination = get_field('designation');
    ?>

    <div class="container container--top">
        <div class="team__content">
            <h1 class="team_title">
                <?php the_title(); ?>
            </h1>
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
                <?php the_content() ?>
            </p>
        </div>
    </div>
</main>
<?php get_footer(); ?>