<?php
/**
 * Footer Upper Template (Footer Block)
 *
 * @package Jaywing
 * @subpackage Jaywing WP
 * @since Jaywing WP Theme 2.0
 */  

    $phone = get_field('gen_phone_number', 'options');
    $email = get_field('gen_email_address', 'options');
    $location = get_field('gen_location', 'options');
    $icon_class = (defined('FOOTER_ALT_CLASS')) ? '-light' : '';
?>