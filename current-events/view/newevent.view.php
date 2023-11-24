<style>
	.btn {
		display: inline-flex;
		padding: 5px 10px;
		border: solid 1px #000;
		background: #000;
		color: #fff !important;
		text-decoration: none !important;
	}
	.current-event-form {
		margin-top: 10px;
		background: #fafafa;
		border: solid 1px #ddd;
		padding: 10px;
	}
	.current-event-form :is(input, select) {
		width: 100%;
		padding: 5px;
		margin: 10px 0;
	}
	.current-event-form select {
		background: #fff;
		border: solid 1px #000;
	}
	.current-event-form textarea {
		width: 100%;
		height: 150px;
		margin-bottom: 10px;
	}
	.current-event-form label {
		padding: 5px 0;
	}
	.submit-event {
		background: #000;
		color: #fff;
		border: solid 1px;
		padding: 10px 15px;
	}
	.no-italics {
		font-style: normal;   
	}
</style>

<?php
	global $SITEURL;
	global $GSADMIN;
?>

<h3><span class="no-italics">📅</span> <?php echo i18n_r('current-events/lang_Page_Title').' - '.i18n_r('current-events/lang_Add_New'); ?></h3>
<a href="<?php echo $SITEURL . $GSADMIN; ?>/load.php?id=current-events" class="btn"><?php echo i18n_r('current-events/lang_BTN_Back'); ?></a>

<?php
	$fileSet = GSDATAOTHERPATH . 'current-events/settings/settings.json';
?>

<?php 
	if (isset($_GET['edit'])) {
		$file = file_get_contents(GSDATAOTHERPATH . 'current-events/' . $_GET['edit'] . '.json');
		$fileJS = json_decode($file);
	}; 
?>

<form method="post" class="current-event-form">

	<label for="title-current-event"><?php echo i18n_r('current-events/lang_Event_Title'); ?></label>
	<input type="text" name="title-current-event" required <?php if (isset($_GET['edit'])) {
																echo 'value="' . $fileJS->eventname . '"';
															}; ?>>
	<label for="description-current-event"><?php echo i18n_r('current-events/lang_Event_Description'); ?> </label>
	<textarea name="description-current-event">
<?php if (isset($_GET['edit'])) {
	echo $fileJS->eventdescription;
}; ?>
</textarea>

	<label for=""><?php echo i18n_r('current-events/lang_Event_Display'); ?></label>
	<select required name="longevent" class="longevent">
		<option value="fullday"><?php echo i18n_r('current-events/lang_Event_Full_Day'); ?></option>
		<option value="hourday"><?php echo i18n_r('current-events/lang_Event_Hourly'); ?></option>
	</select>

	<label for="start-date"><?php echo i18n_r('current-events/lang_Event_Date_Start'); ?></label>
	<input type="datetime-local" name="start-date" class="startdate" required <?php if (isset($_GET['edit'])) {
																					echo 'value="' . $fileJS->start . '"';
																				}; ?>>
	<label for="end-date"><?php echo i18n_r('current-events/lang_Event_Date_End'); ?></label>
	<input type="datetime-local" name="end-date" class="enddate" required <?php if (isset($_GET['edit'])) {
																				echo 'value="' . $fileJS->end . '"';
																			}; ?>>
	<label for="end-date"><?php echo i18n_r('current-events/lang_Event_Background'); ?></label>
	<input type="color" name="color-current-event" required <?php if (isset($_GET['edit'])) {
																echo 'value="' . $fileJS->backgroundColor . '"';
															} else {

																if (file_exists($fileSet)) {
																	$js = json_decode(file_get_contents($fileSet));
																	echo 'value="' . $js->backgroundColor . '"';
																};
															}; ?>>

	<label for="end-date"><?php echo i18n_r('current-events/lang_Event_Text'); ?></label>
	<input type="color" name="color-current-text" required <?php if (isset($_GET['edit'])) {
																echo 'value="' . $fileJS->colortext . '"';
															} else {

																if (file_exists($fileSet)) {
																	$js = json_decode(file_get_contents($fileSet));
																	echo 'value="' . $js->textColor . '"';
																};
															};; ?>>

	<label for="url-current-event"><?php echo i18n_r('current-events/lang_Event_Link'); ?></label>
	<input type="text" name="url-current-event" <?php if (isset($_GET['edit'])) {
													echo 'value="' . @$fileJS->url . '"';
												}; ?>>
	<button type="submit" name="create-event" class="submit-event"><?php echo i18n_r('current-events/lang_Event_Save'); ?></button>
</form>

<script>
	document.querySelector('.startdate').setAttribute('type', 'date');
	document.querySelector('.enddate').setAttribute('type', 'date');

	<?php if (isset($fileJS->fullday)  && $fileJS->fullday == 'hourday') : ?>
		document.querySelector('.longevent').value = 'hourday';
		document.querySelector('.startdate').setAttribute('type', 'datetime-local');
		document.querySelector('.enddate').setAttribute('type', 'datetime-local');
	<?php endif; ?>

	document.querySelector('.longevent').addEventListener('click', () => {

		if (document.querySelector('.longevent').value == 'fullday') {
			document.querySelector('.startdate').setAttribute('type', 'date');
			document.querySelector('.enddate').setAttribute('type', 'date');
		} else {
			document.querySelector('.startdate').setAttribute('type', 'datetime-local');
			document.querySelector('.enddate').setAttribute('type', 'datetime-local');
		}

	});
</script>