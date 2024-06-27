<?php
/**
 * Get In Touch Block Template
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
    $LefTitle = get_field('git_left_title');
    $LeftDesc = get_field('git_left_description');
    $LeftLearn = get_field('git_left_button_learn');
    $LeftGit = get_field('git_left_button_git');
    $banner_height = get_field('banner_height') ?: 654;

    $aspect_ratio = ($banner_height / 1440) * 100;

    // Create class attribute allowing for custom "className" and "align" values.
    $class_name = 'block--custom-layout__git';
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
        <div class="git-inner">
            <div class="git-top">
                <div class="git-top-inner">
                    <?php if( get_field('git_title') ): ?>
                        <?php if( have_rows('git_title') ): ?>
                            <div class="git-top-list">
                                <?php while( have_rows('git_title') ): the_row();
                                    $GititleItem = get_sub_field('git_title_item');
                                    ?>
                                    <div class="git-top-item">
                                        <?= $GititleItem ?>
                                    </div>
                                <?php endwhile; ?>
                            </div>
                        <?php endif; ?>
                    <?php endif; ?>
                    <?php if( get_field('git_click') ): ?>
                        <?php if( have_rows('git_click') ): ?>
                            <div class="git-bot-list" dir="rtl">
                                <?php while( have_rows('git_click') ): the_row();
                                    $GitClickitem = get_sub_field('git_click_item');
                                    ?>
                                    <div class="git-bot-item">
                                        <div class="git-bot-item-inner">
                                            <div class="git-bot-icon">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="56" height="57" viewBox="0 0 56 57" fill="none">
                                                    <path d="M50.5569 28.5C54.915 26.6458 56.5626 23.7586 55.8334 21.0408C55.1041 18.3229 52.2344 16.6479 47.5354 17.2203C50.3827 13.4372 50.3653 10.112 48.3766 8.12337C46.388 6.13473 43.0628 6.11731 39.2797 8.96461C39.8521 4.26308 38.1771 1.39338 35.4592 0.666618C32.7414 -0.0626296 29.8542 1.58502 28.0025 5.94309C26.1458 1.58502 23.2586 -0.0626296 20.5408 0.666618C17.8229 1.39587 16.1479 4.26557 16.7203 8.96461C12.9372 6.11731 9.612 6.13473 7.62337 8.12337C5.63473 10.112 5.61731 13.4372 8.46461 17.2203C3.76557 16.6479 0.893378 18.3229 0.166618 21.0408C-0.560141 23.7586 1.08502 26.6458 5.44309 28.5C1.08502 30.3542 -0.56263 33.2414 0.166618 35.9592C0.895866 38.6771 3.76557 40.3521 8.46461 39.7797C5.61731 43.5628 5.63473 46.888 7.62337 48.8766C9.612 50.8653 12.9372 50.8827 16.7203 48.0354C16.1479 52.7369 17.8229 55.6066 20.5408 56.3334C23.2586 57.0626 26.1458 55.415 28 51.0569C29.8542 55.415 32.7414 57.0626 35.4567 56.3334C38.1746 55.6041 39.8497 52.7344 39.2772 48.0354C43.0603 50.8827 46.3855 50.8653 48.3741 48.8766C50.3628 46.888 50.3802 43.5628 47.5329 39.7797C52.2319 40.3522 55.1041 38.6771 55.8309 35.9592C56.5577 33.2414 54.9125 30.3542 50.5544 28.5L50.5569 28.5Z" fill="#FFF620"/>
                                                </svg>
                                                <div class="click-text">Click</div>
                                            </div>
                                            <div class="git-bot-title">
                                                <?= $GitClickitem ?>
                                            </div>
                                        </div>
                                    </div>
                                <?php endwhile; ?>
                            </div>
                        <?php endif; ?>
                    <?php endif; ?>
                </div>
            </div>
            <div class="git-bot">
                <div class="git-bot-inner">
                    <div class="git-bot-col git-bot-left">
                        <div class="git-bot-left-inner">
                            <div class="git-bot-title">
                                <h2><?= $LefTitle ?></h2>
                            </div>
                            <div class="git-bot-desc">
                                <?= $LeftDesc ?>
                            </div>
                            <div class="git-bot-btns">
                                <div class="git-bot-btn-item git-trans">
                                    <a href="<?= $LeftLearn['url'] ?>"><?= $LeftLearn['title'] ?></a>
                                </div>
                                <div class="git-bot-btn-item global-btn">
                                    <a href="<?= $LeftGit['url'] ?>"><?= $LeftGit['title'] ?></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="git-bot-col git-bot-right">
                        <div class="git-bot-right-inner">
                            <?php if( get_field('git_right_image') ): ?>
                                <?php if( have_rows('git_right_image') ): ?>
                                    <div class="git-right-img">
                                        <?php while( have_rows('git_right_image') ): the_row();
                                            $GititleItem = get_sub_field('git_image_item');
                                            ?>
                                            <div class="git-right-img-item">
                                                <div class="git-right-img-item-inner">
                                                    <canvas width="720" height="720"></canvas>
                                                    <img src="<?= $GititleItem['url'] ?>" class="" width="720" height="720" alt="<?= $GititleItem['alt'] ?>" />
                                                </div>
                                            </div>
                                        <?php endwhile; ?>
                                    </div>
                                <?php endif; ?>
                            <?php endif; ?>
                            <div class="git-arrow">
                                <div class="git-arrow-inner">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 12 12" fill="none">
                                        <path d="M8.25 7.75L6 10M6 10L3.75 7.75M6 10V2" stroke="black" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M8.25 7.75L6 10M6 10L3.75 7.75M6 10V2" stroke="black" stroke-opacity="0.7" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php endif; ?>