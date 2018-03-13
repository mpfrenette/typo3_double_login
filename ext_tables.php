<?php
if (!defined ('TYPO3_MODE')) {
	die ('Access denied.');
}
$tempColumns = array (
	'tx_cablandoublelogin_fe_user' => array (		
		'exclude' => 0,		
		'label' => 'LLL:EXT:cablan_double_login/locallang_db.xml:be_users.tx_cablandoublelogin_fe_user',		
		'config' => array (
			'type' => 'select',	
			'items' => array (
				array('',0),
			),
			'foreign_table' => 'fe_users',	
			'foreign_table_where' => 'ORDER BY fe_users.uid',	
			'size' => 1,	
			'minitems' => 0,
			'maxitems' => 1,
		)
	),
);


t3lib_div::loadTCA('be_users');
t3lib_extMgm::addTCAcolumns('be_users',$tempColumns,1);
t3lib_extMgm::addToAllTCAtypes('be_users','tx_cablandoublelogin_fe_user;;;;1-1-1');
?>