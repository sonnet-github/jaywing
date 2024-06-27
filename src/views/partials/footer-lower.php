<?php
/**
 * Footer Lower Template (Footer Block)
 *
 * @package Jaywing
 * @subpackage Jaywing WP
 * @since Jaywing WP Theme 2.0
 */  
    $footer_logo = get_field('footer_logo_image', 'options');
    $ButtonGIT = get_field('header_get_in_touch', 'options');
?>
<div class="pf-lower">
    <div class="footer-inner">
        <div class="footer-with-bord">
            <div class="footer-next-right">
                <?= get_field('footer_git_left_description', 'options')  ?>
            </div>
            <div class="footer-next-left">
                <div class="footer-btn global-btn">
                    <a href="<?= $ButtonGIT['url'] ?>"><?= $ButtonGIT['title'] ?></a>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-bot-wrap">
        <div class="footer-bot">
            <div class="footer-logo">
                <img src="<?= $footer_logo['url'] ?>" class="" width="127" height="18" alt="<?= $footer_logo['alt'] ?>" />
            </div>
            <div class="footer-smi">
                <?php if(!empty(get_field('sl_facebook', 'options'))) : ?>
                    <a href="<?= get_field('sl_facebook', 'options') ?>" target="_blank">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                <?php endif; ?>
                
                <?php if(!empty(get_field('sl_instagram', 'options'))) : ?>
                    <a href="<?= get_field('sl_instagram', 'options') ?>" target="_blank">
                        <i class="fab fa-instagram"></i>
                    </a>
                <?php endif; ?>
                
                <?php if(!empty(get_field('sl_twitter', 'options'))) : ?>
                    <a href="<?= get_field('sl_twitter', 'options') ?>" target="_blank">
                        <i class="fab fa-twitter"></i>
                    </a>
                <?php endif; ?>
                
                <?php if(!empty(get_field('sl_youtube', 'options'))) : ?>
                    <a href="<?= get_field('sl_youtube', 'options') ?>" target="_blank">
                        <i class="fab fa-youtube"></i>
                    </a>
                <?php endif; ?>
                
                <?php if(!empty(get_field('sl_linked_in', 'options'))) : ?>
                    <a href="<?= get_field('sl_linked_in', 'options') ?>" target="_blank">
                        <i class="fab fa-linkedin"></i>
                    </a>
                <?php endif; ?>
            </div>
            <div class="footer-copy">
                <?= get_field('footer_main_copy', 'options')  ?>
            </div>
        </div>
    </div>
</div>