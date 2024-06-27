<?php
/**
 * Page Header Template Block (Header Block)
 *
 * @package Jaywing
 * @subpackage Jaywing WP
 * @since Jaywing WP Theme 2.0
 */  
    $header_type = get_field('header_type') ?: 'default';
    $logo_type = get_field('logo_type', 'options');
    $alt_logo_type = get_field('alt_logo_type', 'options');
    $mobile_logo_type = get_field('mobile_logo_type', 'options');
    $ButtonGIT = get_field('header_get_in_touch', 'options');
    $SecondLogo = get_field('header_logo_right', 'options');

?>
<div class="git-pop white-popup mfp-hide" id="git-pop">
    <div class="git-pop-inner">
        <div class="git-pop-wrap">
            <div class="git-title">
                <h2>Want to work with us? <span>Get in touch</span></h2>
            </div>
        </div>
    </div>
</div>
<header id="page-header" class="page-header--<?= $header_type ?>">
    <div class="header-inner">
        <div class="header-logo header-left">
            <div class="header-logo-inner">
                <div class="header-logo-item">
                    <?php if($header_type == 'home') : ?>
                        <a href="<?= get_site_url(null, ''); ?>" class="main-logo main-logo--home">
                            <?php if($logo_type == 'svg') : ?>
                                    <?= get_field('main_logo_svg', 'options') ?>
                            <?php else: 
                                    $logo = get_field('main_logo','options'); ?>
                                    <img src="<?= $logo['url'] ?>" alt="<?= $logo['alt'] ?>" width="127" height="18" />
                            <?php endif; ?>
                        </a>
                    <?php else : ?>
                        <a href="<?= get_site_url(null, ''); ?>" class="main-logo">
                            <?php if($mobile_logo_type == 'svg') : ?>
                                    <?= get_field('mobile_logo_svg', 'options') ?>
                            <?php else: 
                                    $logo = get_field('mobile_logo','options'); ?>
                                    <img src="<?= $logo['url'] ?>" alt="<?= $logo['alt'] ?>" width="127" height="18" />
                            <?php endif; ?>
                        </a>
                    <?php endif; ?>
                    <a href="<?= get_site_url(null, ''); ?>" class="mobile-logo">
                        <?php if($mobile_logo_type == 'svg') : ?>
                                <?= get_field('mobile_logo_svg', 'options') ?>
                        <?php else: 
                                $logo = get_field('mobile_logo','options'); ?>
                                <img src="<?= $logo['url'] ?>" alt="<?= $logo['alt'] ?>" width="127" height="18" />
                        <?php endif; ?>
                    </a>
                    <a href="<?= get_site_url(null, ''); ?>" class="alt-logo">
                        <?php if($alt_logo_type == 'svg') : ?>
                                <?= get_field('alt_logo_svg', 'options') ?>
                        <?php else: 
                                $logo = get_field('alt_logo','options'); ?>
                                <img src="<?= $logo['url'] ?>" alt="<?= $logo['alt'] ?>" width="127" height="18" />
                        <?php endif; ?>
                    </a>
                </div>
                <div class="header-logo-left">
                    <img src="<?= $SecondLogo['url'] ?>" class="" width="324" height="36" />
                </div>
            </div>
        </div>
        <div class="header-btn header-right">
            <div class="header-right-inner">
                <div class="header-btn-item global-btn">
                    <a href="<?= $ButtonGIT['url'] ?>" class="pop-desc"><?= $ButtonGIT['title'] ?></a>
                </div>
            </div>
        </div>
    </div>
</header>