<?php
/**
 * Plugin Name: Somo Donation Form
 * Description: A configurable donation form block that sends emails.
 * Version: 1.0.0
 * Author: Somo
 * Text Domain: somo-donation-form
 */

defined('ABSPATH') || exit;

function somo_donation_form_init()
{
    register_block_type(__DIR__);
}
add_action('init', 'somo_donation_form_init');

/**
 * Handle Form Submission
 */
function somo_handle_donation_submission()
{
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['somo_donation_nonce'])) {
        if (!wp_verify_nonce($_POST['somo_donation_nonce'], 'somo_donation_action')) {
            wp_die('Security check failed');
        }

        $recipient = sanitize_email($_POST['somo_recipient_email']);
        $name = sanitize_text_field($_POST['somo_name']);
        $email = sanitize_email($_POST['somo_email']);
        $amount = sanitize_text_field($_POST['somo_amount']);
        $frequency = sanitize_text_field($_POST['somo_frequency']);

        $subject = "Nieuwe donatie van $name";
        $message = "Naam: $name\n";
        $message .= "Email: $email\n";
        $message .= "Bedrag: € $amount\n";
        $message .= "Frequentie: $frequency\n";

        $headers = array('Content-Type: text/plain; charset=UTF-8');

        wp_mail($recipient, $subject, $message, $headers);

        // Redirect back with success
        wp_redirect(add_query_arg('donation_success', '1', wp_get_referer()));
        exit;
    }
}
add_action('admin_post_somo_donation_submit', 'somo_handle_donation_submission');
add_action('admin_post_nopriv_somo_donation_submit', 'somo_handle_donation_submission');
