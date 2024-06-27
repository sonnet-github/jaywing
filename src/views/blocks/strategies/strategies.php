<?php
/**
 * Strategies Block Template
 *
 * @package SDEV
 * @subpackage SDEV WP
 * @since SDEV WP Theme 2.0
 */  

    // Support custom "anchor" values.
    $anchor = '';
    if ( ! empty( $block['anchor'] ) ) {
        $anchor = 'id="' . esc_attr( $block['anchor'] ) . '" ';
    }

    // Get acf fields value and set default
    $layout = get_field('banner_layout') ?: 'default';
    $Title = get_field('stra_title');
    $Description = get_field('stra_description');
    $banner_height = get_field('banner_height') ?: 654;

    $aspect_ratio = ($banner_height / 1440) * 100;

    // Create class attribute allowing for custom "className" and "align" values.
    $class_name = 'block--custom-layout__stra';
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
        <div class="stra-inner">
            <div class="stra-wrap">
                <div class="stra-title">
                    <h2><?= $Title ?></h2>
                </div>
                <div class="stra-desc-title">
                    <?= $Description ?>
                </div>
                <?php if( get_field('strategies_list') ): ?>
                    <?php if( have_rows('strategies_list') ): ?>
                        <div class="stra-list">
                            <?php while( have_rows('strategies_list') ): the_row();
                                $StraIcon = get_sub_field('stra_icon');
                                $StaTitle = get_sub_field('stra_item_title');
                                $StraSub = get_sub_field('stra_item_sub_title');
                                $StraDesc = get_sub_field('stra_item_description');
                                ?>
                                <div class="stra-item">
                                    <div class="stra-item-inner">
                                        <div class="stra-icon">
                                            <img src="<?= $StraIcon['url'] ?>" class="" />      
                                        </div>
                                        <div class="stra-item-title">
                                            <?= $StaTitle ?>
                                        </div>
                                        <div class="stra-item-sub-title">
                                            <?= $StraSub ?>
                                        </div>
                                        <div class="stra-item-desc">
                                            <?= $StraDesc ?>
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

<?php endif; ?>