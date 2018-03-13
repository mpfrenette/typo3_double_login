<?php

########################################################################
# Extension Manager/Repository config file for ext: "cablan_double_login"
#
# Auto generated 02-06-2010 14:09
#
# Manual updates:
# Only the data in the array - anything else is removed by next write.
# "version" and "dependencies" must not be touched!
########################################################################

$EM_CONF[$_EXTKEY] = array(
	'title' => 'Auto-Login in the Front-end when there is a Back-end user',
	'description' => 'This extension detects Back-end user login and automatically locates the corresponding Front-end user to login.',
	'category' => 'fe',
	'author' => 'Martin-Pierre Frenette',
	'author_email' => 'typo3@cablan.net',
	'shy' => '',
	'dependencies' => 'cms',
	'conflicts' => '',
	'priority' => '',
	'module' => '',
	'state' => 'alpha',
	'internal' => '',
	'uploadfolder' => 0,
	'createDirs' => '',
	'modify_tables' => '',
	'clearCacheOnLoad' => 0,
	'lockType' => '',
	'author_company' => '',
	'version' => '0.0.0',
	'constraints' => array(
		'depends' => array(
			'cms' => '',
		),
		'conflicts' => array(
		),
		'suggests' => array(
		),
	),
	'_md5_values_when_last_written' => 'a:10:{s:9:"ChangeLog";s:4:"c2fe";s:10:"README.txt";s:4:"ee2d";s:12:"ext_icon.gif";s:4:"1bdc";s:17:"ext_localconf.php";s:4:"9161";s:14:"ext_tables.php";s:4:"0b84";s:14:"ext_tables.sql";s:4:"73bb";s:16:"locallang_db.xml";s:4:"9a25";s:38:"pi1/class.tx_cablandoublelogin_pi1.php";s:4:"516a";s:19:"doc/wizard_form.dat";s:4:"175d";s:20:"doc/wizard_form.html";s:4:"bcbb";}',
);

?>