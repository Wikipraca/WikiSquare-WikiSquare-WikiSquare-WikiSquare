<?php
if(!defined('WP_UNINSTALL_PLUGIN')) {
	echo "Hi there! Nice try. Come again.";
	exit;
}

delete_option('hssocial_badges');
