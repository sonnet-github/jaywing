<?php
/**
 * Hero Block Template
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
    $VideoFile = get_field('hero_video_file');
    $Title = get_field('hero_title');
    $Description = get_field('hero_description');
    $banner_height = get_field('banner_height') ?: 654;

    $aspect_ratio = ($banner_height / 1440) * 100;

    // Create class attribute allowing for custom "className" and "align" values.
    $class_name = 'block--custom-layout__hero';
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
        <div class="hero-inner">
            <div class="hero-video">
                <video width="1440" height="800" autoplay muted loop>
                    <source src="<?= $VideoFile['url'] ?>" type="video/mp4">
                </video>
            </div>
            <div class="hero-content">
                <div class="hero-content-inner">
                    <h1><?= $Title ?></h1>
                </div>
                <div class="hero-content-desc">
                    <?= $Description ?>
                </div>
            </div>
            <div class="heros-slide-wrap">
                <div class="hero-logo-slide">
                    <?php if( get_field('hero_brand_logos') ): ?>
                        <?php if( have_rows('hero_brand_logos') ): ?>
                            <div class="hero-logo-slide-inner">
                                <?php while( have_rows('hero_brand_logos') ): the_row();
                                    $BrandLogoItem = get_sub_field('hero_brand_logo_item');
                                    ?>
                                    <div class="hero-logo-slide-item">
                                        <img src="<?= $BrandLogoItem['url'] ?>" class="" />
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