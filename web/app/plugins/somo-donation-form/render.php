<?php
/**
 * Render callback for the Donation Form block.
 */

$recipient = isset($attributes['recipientEmail']) ? $attributes['recipientEmail'] : 'info@example.com';
$iban = isset($attributes['iban']) ? $attributes['iban'] : '';

if (isset($_GET['donation_success'])) {
    echo '<div class="donation-success-message" style="background: #e7f7ed; color: #155724; padding: 15px; margin-bottom: 20px; border: 1px solid #c3e6cb; border-radius: 4px;">';
    echo 'Bedankt voor uw donatie! Er wordt contact met u opgenomen.';
    echo '</div>';
}
?>

<div <?php echo get_block_wrapper_attributes(array('class' => 'somo-donation-form')); ?>>
    <form action="<?php echo esc_url(admin_url('admin-post.php')); ?>" method="post" class="donation-form">
        <input type="hidden" name="action" value="somo_donation_submit">
        <?php wp_nonce_field('somo_donation_action', 'somo_donation_nonce'); ?>
        <input type="hidden" name="somo_recipient_email" value="<?php echo esc_attr($recipient); ?>">

        <div class="form-group">
            <label for="somo_name">Naam *</label>
            <input type="text" id="somo_name" name="somo_name" required class="form-control">
        </div>

        <div class="form-group">
            <label for="somo_email">E-mailadres *</label>
            <input type="email" id="somo_email" name="somo_email" required class="form-control">
        </div>

        <div class="form-group">
            <label for="somo_amount">Bedrag (€) *</label>
            <input type="number" id="somo_amount" name="somo_amount" step="0.01" min="1" required class="form-control">
        </div>

        <div class="form-group">
            <label>Frequentie *</label>
            <div class="radio-group">
                <label><input type="radio" name="somo_frequency" value="Eenmalig" checked> Eenmalig</label>
                <label><input type="radio" name="somo_frequency" value="Maandelijks"> Maandelijks</label>
                <label><input type="radio" name="somo_frequency" value="Jaarlijks"> Jaarlijks</label>
            </div>
        </div>

        <div class="form-group">
            <label>Rekeningnummer t.b.v. overschrijving:</label>
            <p class="iban-display"><strong><?php echo esc_html($iban); ?></strong></p>
        </div>

        <button type="submit" class="btn btn-primary">Versturen</button>
    </form>
</div>

<style>
    .somo-donation-form {
        background: #f9f9f9;
        padding: 2rem;
        border-radius: 8px;
        border: 1px solid #ddd;
    }

    .form-group {
        margin-bottom: 1.5rem;
    }

    .form-group label {
        display: block;
        margin-bottom: 0.5rem;
        font-weight: 600;
    }

    .form-control {
        width: 100%;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 4px;
    }

    .radio-group label {
        margin-right: 15px;
        font-weight: normal;
    }

    .iban-display {
        background: #fff;
        padding: 10px;
        border: 1px solid #eee;
        display: inline-block;
    }
</style>