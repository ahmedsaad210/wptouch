<?php global $wptouch_settings; global $wpdb; ?>
<script type="text/javascript"><!--
window.googleAfmcRequest = {
  client: 'ca-mb-<?php echo $wptouch_settings['adsense-id']; ?>',
  ad_type: 'text_image',
  output: 'html',
<?php if ( isset( $wptouch_settings['adsense-channel'] ) ) { ?>
  channel: '',
<?php } else { ?>
  channel: '<?php echo $wptouch_settings['adsense-channel']; ?>',
<?php } ?>
  format: '320x50_mb',
<?php if ( $wpdb->charset ) { ?>
  oe: '<?php echo $wpdb->charset; ?>',
<?php } else { ?>
  oe: 'utf8',
<?php } ?>
  color_border: '336699',
  color_bg: 'FFFFFF',
  color_link: '0000FF',
  color_text: '000000',
  color_url: '336699',
};
//--></script>
<script type="text/javascript" src="http://pagead2.googlesyndication.com/pagead/show_afmc_ads.js"></script>