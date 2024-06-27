<?php
/**
 * Brands Block Template
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
    $Title = get_field('brands_title');
    $banner_height = get_field('banner_height') ?: 654;

    $aspect_ratio = ($banner_height / 1440) * 100;

    // Create class attribute allowing for custom "className" and "align" values.
    $class_name = 'block--custom-layout__brands';
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
        <div class="brand-inner">
            <div class="brand-title">
                <?= $Title ?>
            </div>
            <div class="brand-slide-wrap">
                <div class="brand-logo-slide">
                    <?php if( get_field('brand_list') ): ?>
                        <?php if( have_rows('brand_list') ): ?>
                            <div class="brand-logo-slide-inner">
                                <?php while( have_rows('brand_list') ): the_row();
                                    $BrandLogoItem = get_sub_field('brand_item');
                                    ?>
                                    <div class="brand-logo-slide-item">
                                        <img src="<?= $BrandLogoItem['url'] ?>" class="" alt="<?= $BrandLogoItem['alt'] ?>" />
                                    </div>
                                <?php endwhile; ?>
                            </div>
                        <?php endif; ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>

<?php endif; ?>