<?php
if (!empty($data['settings']['module_id'])) {
    $block_id = $data['settings']['module_id'];
} else {
    $block_id = 'block-' . uniqid();
}

?>

<section class="textBlock <?php if ($data['type'] == 'orange') {
    echo 'textBlock--alt';
} elseif ($data['type'] == 'blue') {
    echo 'textBlock--alt textBlock--secondary';
} ?> ">
    <div class="container">
        <div class="textBlock__wrapper">
            <?php if (!empty($data['title'])): ?>
                <h2 class="sectionTitle">
                    <?php echo $data['title']; ?>
                    <?php if (!empty($data['title-strong'])): ?>
                        <br><span class="marginLeft">
                            <?php echo $data['title-strong']; ?>
                        </span>
                    <?php endif; ?>
                </h2>
            <?php endif; ?>
            <?php if (!empty($data['description'])): ?>
                <div class="textBlock__description">
                    <?php echo $data['description'] ?>
                </div>
            <?php endif; ?>
            <?php if (!empty($data['content-grid'])): ?>
                <div class="textBlock__column">
                    <?php foreach ($data['content-grid'] as $item): ?>
                        <div class="textBlock__row">
                            <?php if (!empty($item['image'])): ?>
                                <figure class="textBlock__image">
                                    <img class="icon" src="<?php echo esc_url($item['image']['url']) ?>"
                                        alt='<?php echo esc_url($item['image']['alt']) ?>' />
                                </figure>
                            <?php endif ?>
                            <?php if (!empty($item['title'])): ?>
                                <h3 class="textBlock__title">
                                    <?php echo $item['title']; ?>
                                </h3>
                            <?php endif ?>
                            <?php if (!empty($item['description'])): ?>
                                <p>
                                    <?php echo $item['description']; ?>
                                </p>
                            <?php endif ?>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
    <?php
    if (!empty($data['settings']['bottom_spacing_desktop']) || !empty($data['settings']['bottom_spacing_mobile']) || !empty($data['settings']['layer_position'])): ?>
        <style>
            <?php if (!empty($data['settings']['bottom_spacing_desktop'])):
                echo '#' . esc_attr($block_id) . '{' .
                    ' margin-bottom:' . esc_attr($data['settings']['bottom_spacing_desktop']) . '; }';
            endif; ?>

            <?php if (!empty($data['settings']['bottom_spacing_mobile'])): ?>
                @media screen and (max-width: 767px) {

                    <?php echo '#' . esc_attr($block_id); ?>
                        {
                        margin-bottom:
                            <?php echo esc_attr($data['settings']['bottom_spacing_mobile']); ?>
                        ;
                    }
                }

            <?php endif; ?>

            <?php if (!empty($data['settings']['layer_position'])):
                echo '#' . esc_attr($block_id) . '{' .
                    ' z-index:' . esc_attr($data['settings']['layer_position']) . '; }';
            endif; ?>
        </style>
    <?php endif; ?>
</section>
<!-- @end of textBlock -->