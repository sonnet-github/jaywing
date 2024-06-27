<?php
/**
 * Testimonials Block Template
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
    $Icon = get_field('testi_icon');
    $Title = get_field('testi_title');
    $banner_height = get_field('banner_height') ?: 654;

    $aspect_ratio = ($banner_height / 1440) * 100;

    // Create class attribute allowing for custom "className" and "align" values.
    $class_name = 'block--custom-layout__testi';
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
       <div class="testi-inner">
            <div class="testi-wrap">
                <div class="testi-top-icon">
                    <?= $Icon ?>
                </div>
                <div class="testi-top">
                    <div class="testi-top-inner">
                        <div class="testi-title">
                            <h2><?= $Title ?></h2>
                        </div>
                        <div class="testi-arrows testi-desk-arrow">
                            <div class="testi-prev testi-arrow">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                    <path d="M8.5 16.5L4 12M4 12L8.5 7.5M4 12L20 12" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                            </div>
                            <div class="testi-next testi-arrow">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                    <path d="M15.5 7.5L20 12M20 12L15.5 16.5M20 12H4" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="testi-bot">
                    <?php if( get_field('testimonial_list') ): ?>
                        <?php if( have_rows('testimonial_list') ): ?>
                            <div class="testi-list">
                                <?php while( have_rows('testimonial_list') ): the_row();
                                    $TestiLogo = get_sub_field('testi_brand_logo');
                                    $TestiNum = get_sub_field('testi_number');
                                    $TestiDesc = get_sub_field('testi_numdescription');
                                    $TestiHover = get_sub_field('testi_hover_description');
                                    ?>
                                    <div class="testi-item">
                                        <div class="testi-item-inner">
                                            <div class="testi-logo-item">
                                                <img src="<?= $TestiLogo['url'] ?>" class="" />
                                            </div>
                                            <div class="testi-num">
                                                <div class="testi-num-inner">
                                                    <span><?= $TestiNum ?></span>
                                                    <?= $TestiDesc ?>
                                                </div>
                                            </div>
                                            <div class="testi-hover-desc">
                                                <p><?= $TestiHover ?></p>
                                            </div>
                                        </div>
                                    </div>
                                <?php endwhile; ?>
                            </div>
                        <?php endif; ?>
                    <?php endif; ?>
                </div>
                <div class="testi-arrows testi-bot-arrow">
                    <div class="testi-prev testi-arrow">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                            <path d="M8.5 16.5L4 12M4 12L8.5 7.5M4 12L20 12" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </div>
                    <div class="testi-next testi-arrow">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                            <path d="M15.5 7.5L20 12M20 12L15.5 16.5M20 12H4" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </div>
                </div>
            </div>
       </div>
    </div>

<?php endif; ?>