<?php
/**
 * Our Capabilities Block Template
 *
 * @package Jaywing
 * @subpackage Jaywing WP
 * @since Jaywing WP Theme 2.0
 */  

    // Support custom "anchor" values.
    $anchor = '';
    if ( ! empty( $block['anchor'] ) ) {
        $anchor = 'id="' . esc_attr( $block['anchor'] ) . '" ';
    }

    // Get acf fields value and set default
    $layout = get_field('banner_layout') ?: 'default';
    $Title = get_field('oc_title');
    $MainTitle = get_field('oc_main_title');
    $banner_height = get_field('banner_height') ?: 654;

    $aspect_ratio = ($banner_height / 1440) * 100;

    // Create class attribute allowing for custom "className" and "align" values.
    $class_name = 'block--custom-layout__oc';
    if ( ! empty( $block['className'] ) ) {
        $class_name .= ' ' . $block['className'];
    }
    if ( ! empty( $block['align'] ) ) {
        $class_name .= ' align' . $block['align'];
    }

    $class_name .= ' block-layout-'.$layout;

    // Show preview image in preview mode
    if(get_field('preview_image')) :

        echo '<img src="'.\SDEV\Utils::getThemeResourcePath('src/views/blocks/').get_field('preview_image').'" style="width: 100%;" />';

    else :
?>

    <div class="block--custom-layout <?= $class_name ?>" <?= $anchor ?>>
       <div class="oc-inner">
            <div class="oc-bg-abs">
                <div class="oc-canvas">
                    <canvas width="1440" height="800"></canvas>
                </div>
                <div class="oc-bg">
                    <?php if( get_field('oc_background') ): ?>
                        <?php if( have_rows('oc_background') ): ?>
                            <div class="oc-bg-list">
                                <?php while( have_rows('oc_background') ): the_row();
                                    $OcBg = get_sub_field('oc_background_img');
                                    ?>
                                    <div class="oc-bg-item">
                                        <img src="<?= $OcBg['url'] ?>" class="" width="1440" height="800" alt="<?= $OcBg['alt'] ?>" />
                                    </div>
                                <?php endwhile; ?>
                            </div>
                        <?php endif; ?>
                    <?php endif; ?>
                </div>
                <?php if( get_field('oc_background') ): ?>
                    <?php if( have_rows('oc_background') ): ?>
                        <div class="oc-bg-hover">
                            <?php while( have_rows('oc_background') ): the_row();
                                $OcBgg = get_sub_field('oc_background_img');
                                $OcID = get_sub_field('oc_id');
                                ?>
                                <div class="oc-bg-hover-item" data-area-id="<?= $OcID ?>">
                                    <img src="<?= $OcBgg['url'] ?>" class="" width="1440" height="800" alt="<?= $OcBgg['alt'] ?>"/>
                                </div>
                            <?php endwhile; ?>
                        </div>
                    <?php endif; ?>
                <?php endif; ?>
            </div>
            <div class="oc-wrap">
                <div class="oc-wrap-inner">
                    <div class="oc-top">
                        <div class="oc-top-inner">
                            <div class="oc-left">
                                <div class="oc-left-inner">
                                    <div class="oc-title"><?= $Title ?></div>
                                    <div class="oc-main-title">
                                        <h2><?= $MainTitle ?></h2>
                                    </div>
                                </div>
                            </div>
                            <div class="oc-right">
                                <div class="oc-right-inner">
                                    <div class="oc-arrow"><svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 12 12" fill="none">
                                    <path d="M7.75 3.75L10 6M10 6L7.75 8.25M10 6H2" stroke="black" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M7.75 3.75L10 6M10 6L7.75 8.25M10 6H2" stroke="black" stroke-opacity="0.7" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="oc-bot">
                        <div class="oc-bot-inner">
                            <?php if( get_field('oc_capabilities_list') ): ?>
                                <?php if( have_rows('oc_capabilities_list') ): ?>
                                    <div class="oc-bot-list">>
                                        <?php while( have_rows('oc_capabilities_list') ): the_row();
                                            $OCIDItem = get_sub_field('oc_item_id');
                                            $ItemTitle = get_sub_field('oc_item_title');
                                            $HovDesc = get_sub_field('oc_hover_description');
                                            ?>
                                            <div class="oc-bot-item">
                                                <div class="oc-bot-item-inner" data-area-id="<?= $OCIDItem ?>">
                                                    <div class="oc-bot-num">0<?= $OCIDItem ?></div>
                                                    <div class="oc-bot-desc-wrap">
                                                        <div class="oc-bot-item-title">
                                                            <?= $ItemTitle ?>
                                                        </div>
                                                        <div class="oc-bot-item-desc">
                                                            <?= $HovDesc ?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php endwhile; ?>
                                    </div>
                                <?php endif; ?>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
       </div>
    </div>

<?php endif; ?>