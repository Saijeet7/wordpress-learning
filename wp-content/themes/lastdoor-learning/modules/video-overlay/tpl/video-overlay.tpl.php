<?php
if (!empty($data['settings']['module_id'])) {
    $block_id = $data['settings']['module_id'];
} else {
    $block_id = 'block-' . uniqid();
}

?>
<section class="video-block" <?php if (!empty($data['background'])): ?>style="background: <?php echo $data['background'] ?>;" <?php endif ?>
    id="<?php echo esc_attr($block_id); ?>">
    <div class="container">
        <?php if (!empty($data['media'])):
            ; ?>
            <?php if ($data['option'] == 'media'):
                $video = $data['media']; ?>
                <video <?php if ($data['play'] == '1') {
                    echo 'autoplay';
                } ?> muted loop id="video-background"
                    class="video-block__background">
                    <source src="<?php echo esc_url($video['url']); ?>" type="video/mp4">
                </video>
            <?php endif; ?>
        <?php endif; ?>
        <div class="video-block__wrapper">
            <?php if (!empty($data['title'])): ?>
                <h2 class="sectionTitle">
                    <?php echo $data['title'] ?>
                </h2>
            <?php endif; ?>
            <?php if (!empty($data['subtitle'])): ?>
                <p>
                    <?php echo $data['subtitle'] ?>
                </p>
            <?php endif ?>
            <?php if ($data['play'] == '0'): ?>
                <?php if ($data['option'] == 'media'):
                    $video = $data['media']; ?>
                    <a class="video-block__play" href="<?php echo esc_url($video['url']); ?>" data-fancybox>
                        <svg class="icon icon-play-button">
                            <use xlink:href="#icon-play-button"></use>
                        </svg>
                    </a>
                <?php endif; ?>
            <?php endif; ?>
            <?php if ($data['option'] != 'media'):
                $video = $data['link']; ?>
                <a class="video-block__play" href="<?php echo esc_url($video); ?>" data-fancybox>
                    <svg class="icon icon-play-button">
                        <use xlink:href="#icon-play-button"></use>
                    </svg>
                </a>
            <?php endif; ?>
        </div>
    </div>
    <?php
    if (!empty($data['settings']['bottom_spacing_desktop']) || !empty($data['settings']['bottom_spacing_mobile']) || !empty($data['settings']['layer_position']) || !empty($data['height_desktop']) || !empty($data['height_tablet']) || !empty($data['height_mobile'])) : ?>
        <style>
            <?php if (!empty($data['settings']['bottom_spacing_desktop'])):
                echo '#' . esc_attr($block_id) . '{' .
                    ' margin-bottom:' . esc_attr($data['settings']['bottom_spacing_desktop']) . '; }';
            endif; ?>

            <?php if (!empty($data['height_desktop'])):
                echo '#' . esc_attr($block_id) . '{' .
                'height:' . esc_attr($data['height_desktop']) . '; }';
            endif ;?>

            <?php if (!empty($data['height_tablet'])):?>
                @media screen and (max-width: 1024px) {
                    <?php echo '#' . esc_attr($block_id); ?>{
                        height: <?php echo $data['height_tablet']; ?>
                    ;
                }
            }
            <?php endif ;?>
            

            <?php if (!empty($data['settings']['bottom_spacing_mobile'])): ?>
                @media screen and (max-width: 768px) {

                    <?php echo '#' . esc_attr($block_id); ?>
                        {
                        margin-bottom:
                            <?php echo esc_attr($data['settings']['bottom_spacing_mobile']); ?>
                        ;
                    }
                }

            <?php endif; ?>

            <?php if (!empty($data['height_mobile'])):?>
                @media screen and (max-width: 768px) {
                    <?php echo '#' . esc_attr($block_id); ?>{
                        height: <?php echo $data['height_mobile']; ?>
                    ;
                }
            }
            <?php endif ;?>


            <?php if (!empty($data['settings']['layer_position'])):
                echo '#' . esc_attr($block_id) . '{' .
                    ' z-index:' . esc_attr($data['settings']['layer_position']) . '; }';
            endif; ?>

        </style>
    <?php endif; ?>
</section>

<!-- @end of video block -->