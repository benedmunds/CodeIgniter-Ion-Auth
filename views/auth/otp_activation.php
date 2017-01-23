<div id="infoMessage"><?php echo $message; ?></div>
<div id="otp">
    <h2><?php echo lang('otp_activation_heading'); ?></h2>
    <img src="<?php echo $google_chart_url; ?>" alt="QR Code"><br>
    <p>
        <?php echo lang('otp_activation_scan'); ?><br>
        <?php echo lang('otp_activation_scan_alt'); ?> <span id="otp_secret_key"><?php echo $otp_secret_key; ?></span>
    </p>
    <p>
        <?php echo lang('otp_activation_backup_codes'); ?>
    <div id="backup_codes">
        <?php foreach ($backup_codes as $backup_code): ?>
            <?php echo $backup_code . '<br>'; ?>
        <?php endforeach ?>
    </div>
</p>
</div>