<style>
   .btn {
        display: inline-flex;
        padding: 5px 10px;
        border: solid 1px #000;
        background: #000;
        color: #fff !important;
        text-decoration: none !important;
    }
	code {
		border: solid 1px #ddd;
		background: #fafafa;
		padding: 5px;
		display: inline-block;
		margin: 10px 0;
		color: green;
	}
	.no-italics {
		font-style: normal;   
	}
</style>

<?php
	global $SITEURL;
	global $GSADMIN;
?>

<h3><span class="no-italics">📅</span> <?php echo i18n_r('current-events/lang_Page_Title').' - '.i18n_r('current-events/lang_BTN_Help'); ?></h3>
<a href="<?php echo $SITEURL . $GSADMIN; ?>/load.php?id=current-events" class="btn"><?php echo i18n_r('current-events/lang_BTN_Back'); ?></a>

<br><br>

<p>• <?php echo i18n_r('current-events/lang_Shortcode'); ?>: <code>[% ce %]</code></p>

<p>• <?php echo i18n_r('current-events/lang_Call'); ?>: <code>&lt;?php showEventCalendar() ;?&gt;</code></p>
