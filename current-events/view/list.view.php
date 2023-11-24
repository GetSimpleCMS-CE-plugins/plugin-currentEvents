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
    .event-items {
        width: 100%;
        list-style-type: none;
        margin: 10px 0 !important;
    }
    .event-item {
        box-sizing: border-box;
        padding: 5px;
        align-items: center;
        margin: 0;
        background: #fafafa;
        border: solid 1px #ddd;
        display: grid;
        grid-template-columns: 1fr 100px 100px;
    }
	.no-italics {
		font-style: normal;   
	}
</style>

<?php
	global $SITEURL;
	global $GSADMIN; 
?>

<h3><span class="no-italics">📅</span> <?php echo i18n_r('current-events/lang_Page_Title'); ?></h3>

<a href="<?php echo $SITEURL . $GSADMIN; ?>/load.php?id=current-events&addevent" class="btn"><?php echo i18n_r('current-events/lang_BTN_Add_Event'); ?> ➕ </a>
<a href="<?php echo $SITEURL . $GSADMIN; ?>/load.php?id=current-events&settings" class="btn"><?php echo i18n_r('current-events/lang_BTN_Settings'); ?> ⚙️</a>
<a href="<?php echo $SITEURL . $GSADMIN; ?>/load.php?id=current-events&howto" class="btn"><?php echo i18n_r('current-events/lang_BTN_Help'); ?> </a>

<ul class="event-items">
	<?php
		if (!empty(glob(GSDATAOTHERPATH . 'current-events\*.json'))) {
			foreach (glob(GSDATAOTHERPATH . 'current-events\*.json') as $key => $file) {
				$data = json_decode(file_get_contents($file));

				echo '<li class="event-item"><b>' . $data->eventname . '</b> <a href="' . $SITEURL . $GSADMIN . '/load.php?id=current-events&addevent&edit=' . pathinfo($file)['filename'] . '" class="btn-sm">Edit</a>
				<a href="' . $SITEURL . $GSADMIN . '/load.php?id=current-events&delete=' . pathinfo($file)['filename'] . '" class="btn-sm btn-sm-red">Delete</a></li>';
			};
		};
	?>
</ul>