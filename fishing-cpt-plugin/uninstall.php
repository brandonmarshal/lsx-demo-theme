<?php
if (! defined('WP_UNINSTALL_PLUGIN')) {
	exit;
}
// Clean options.
delete_option('fishing_cpt_settings');
