<style>
	.btn {
		display: inline-flex;
		padding: 5px 10px;
		border: solid 1px #000;
		background: #000;
		color: #fff !important;
		text-decoration: none !important;
	}
	.btn-sm {
		display: inline-flex;
		padding: 5px 10px;
		border: solid 1px #000;
		background: #000;
		color: #fff !important;
		text-decoration: none !important;
		margin: 0 3px;
		text-align: center;
	}
	.btn-sm-red {
		background: red;
		border: red;
	}
	.form-settings {
		background: #fafafa;
		border: solid 1px #ddd;
		padding: 10px;
		margin-top: 10px;
	}
	.form-settings :is(select, input) {
		width: 100%;
		padding: 5px;
		border-radius: 0;
		border: solid 1px #ddd;
		background: #fff;
		margin: 10px 0;
	}
	.form-settings .create-settings {
		display: inline-flex;
		padding: 5px 10px;
		border: solid 1px #000;
		background: #000;
		color: #fff !important;
		text-decoration: none !important;
		width: 200px;
		margin-top: 10px;
	}
	.no-italics {
		font-style: normal;   
	}
</style>

<?php
	global $SITEURL;
	global $GSADMIN;

	$file = GSDATAOTHERPATH . 'current-events/settings/settings.json';

	if (file_exists($file)) {
		$fileJson = json_decode(file_get_contents($file));
	};
?>

<h3><span class="no-italics">📅</span> <?php echo i18n_r('current-events/lang_Page_Title').' - '.i18n_r('current-events/lang_BTN_Settings'); ?></h3>

<a href="<?php echo $SITEURL . $GSADMIN; ?>/load.php?id=current-events" class="btn"><?php echo i18n_r('current-events/lang_BTN_Back'); ?></a>

<form class="form-settings" method="POST">

	<label for=""><?php echo i18n_r('current-events/lang_Lang_Shortcode'); ?></label>
	<input type="text" name="locale" placeholder="en" <?php
														if (file_exists($file)) {
															echo 'value="' . $fileJson->locale . '"';
														}; ?>>

	<label for=""><?php echo i18n_r('current-events/lang_Display_Style'); ?></label>
	<select name="initialView" class="initialView" id="">
		<option value="dayGridMonth"><?php echo i18n_r('current-events/lang_Style_Grid_Month'); ?></option>
		<option value="dayGridWeek"><?php echo i18n_r('current-events/lang_Style_Grid_Week'); ?></option>
		<option value="dayGridDay"><?php echo i18n_r('current-events/lang_Style_Grid_Day'); ?></option>
		
		<option value="listDay"><?php echo i18n_r('current-events/lang_Style_List_Year'); ?></option>
		<option value="listWeek"><?php echo i18n_r('current-events/lang_Style_List_Month'); ?></option>
		<option value="listMonth"><?php echo i18n_r('current-events/lang_Style_List_Week'); ?></option>
		<option value="listYear"><?php echo i18n_r('current-events/lang_Style_List_Day'); ?></option>
	</select>

	<label for=""><?php echo i18n_r('current-events/lang_Start_Day'); ?></label>
	<select name="firstday" class="firstday">
		<option value="1"><?php echo i18n_r('current-events/lang_Monday'); ?></option>
		<option value="2"><?php echo i18n_r('current-events/lang_Tuesday'); ?></option>
		<option value="3"><?php echo i18n_r('current-events/lang_Wednesday'); ?></option>
		<option value="4"><?php echo i18n_r('current-events/lang_Thursday'); ?></option>
		<option value="5"><?php echo i18n_r('current-events/lang_Friday'); ?></option>
		<option value="6"><?php echo i18n_r('current-events/lang_Saturday'); ?></option>
		<option value="0"><?php echo i18n_r('current-events/lang_Sunday'); ?></option>
	</select>

	<label for=""><?php echo i18n_r('current-events/lang_Background_Color'); ?></label>
	<input type="color" class="backgroundColor" name="backgroundColor">

	<label for=""><?php echo i18n_r('current-events/lang_Text_Color'); ?></label>
	<input type="color" class="textColor" name="textColor">

	<?php if (file_exists($file)) {

		echo '<script>document.querySelector(".initialView").value = "' . $fileJson->initialView . '"</script>';
		echo '<script>document.querySelector(".firstday").value = "' . $fileJson->firstDay . '"</script>';
		echo '<script>document.querySelector(".backgroundColor").value = "' . $fileJson->backgroundColor . '"</script>';
		echo '<script>document.querySelector(".textColor").value = "' . $fileJson->textColor . '"</script>';
	}; ?>

	<label for=""><?php echo i18n_r('current-events/lang_Header_Nav'); ?></label>
	<select name="header" class="header-input" id="">
		<option value="true"><?php echo i18n_r('current-events/lang_Yes'); ?></option>
		<option value="false"><?php echo i18n_r('current-events/lang_No'); ?></option>
	</select>

	<?php if (file_exists($file)) {
		echo '<script>document.querySelector(".header-input").value = "' . $fileJson->header . '"</script>';
	}; ?>

	<input type="submit" name="create-settings" class="create-settings" value="<?php echo i18n_r('current-events/lang_Save'); ?>">
</form>
