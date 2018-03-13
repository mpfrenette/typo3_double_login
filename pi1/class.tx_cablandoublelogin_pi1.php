<?php
/***************************************************************
*  Copyright notice
*
*  (c) 2010 Martin-Pierre Frenette <typo3@cablan.net>
*  All rights reserved
*
*  This script is part of the TYPO3 project. The TYPO3 project is
*  free software; you can redistribute it and/or modify
*  it under the terms of the GNU General Public License as published by
*  the Free Software Foundation; either version 2 of the License, or
*  (at your option) any later version.
*
*  The GNU General Public License can be found at
*  http://www.gnu.org/copyleft/gpl.html.
*
*  This script is distributed in the hope that it will be useful,
*  but WITHOUT ANY WARRANTY; without even the implied warranty of
*  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
*  GNU General Public License for more details.
*
*  This copyright notice MUST APPEAR in all copies of the script!
***************************************************************/
require_once(PATH_tslib.'class.tslib_pibase.php');


/**
 * Plugin 'Auto Login front-End user when there is a Back-end user' for the 'cablan_double_login' extension.
 *
 * @author	Martin-Pierre Frenette <typo3@cablan.net>
 * @package	TYPO3
 * @subpackage	tx_cablandoublelogin
 */
class tx_cablandoublelogin_pi1 extends tslib_pibase {
	var $prefixId      = 'tx_cablandoublelogin_pi1';		// Same as class name
	var $scriptRelPath = 'pi1/class.tx_cablandoublelogin_pi1.php';	// Path to this script relative to the extension dir.
	var $extKey        = 'cablan_double_login';	// The extension key.
	var $pi_checkCHash = true;
	
		/**
		 * A function that is missing from the TYPO3 API... which allows
		 * to simply fetch a single record.
		 */
	  function getRecord($table, $uid, $enableFields = 1)   {
        $where = ' uid=' . intval($uid);
        if ($enableFields) {
            $where .= $this->cObj->enableFields($table);
        }

        $result = $GLOBALS['TYPO3_DB']->exec_SELECTquery('*', $table, $where);
        return @$GLOBALS['TYPO3_DB']->sql_fetch_assoc($result);
    }
	/**
	 * The main method of the PlugIn: it detects if a user is back-end logged in, and if 
	 * there is no front-user users, we login to the front-end IF there is a front-end user
	 * defined for that back-end user.
	 *
	 * @param	string		$content: The PlugIn content
	 * @param	array		$conf: The PlugIn configuration
	 * @return	The content that is displayed on the website
	 */
	function main($content, $conf)	{
		
		
		
		if ( isset($GLOBALS['BE_USER']->user) && $GLOBALS['BE_USER']->user['uid'] > 0 ){
			
			if ( isset($GLOBALS["TSFE"]->fe_user) &&
				isset($GLOBALS["TSFE"]->fe_user->user) &&
				$GLOBALS["TSFE"]->fe_user->user["uid"] > 0 ){
				
				// we are already logged in the front-end. It might be the wrong user,
				// but we don't interfere in that case.
				
			}
			else if ($GLOBALS['BE_USER']->user['tx_cablandoublelogin_fe_user'] > 0){
				$this->LoginUser($GLOBALS['BE_USER']->user['tx_cablandoublelogin_fe_user']);
				// after a login, we need to refresh the page: the menu might be different!
				header('Location: '.$this->pi_getPageLink($GLOBALS['TSFE']->id));
			}
		}
	}
	
	/**
	 * This function logs in a user into the front-end.
	 * @param [type] $uid [description]
	 */
   	function LoginUser($uid){
		$row = $this->getRecord('fe_users',$uid );
		
		$GLOBALS["TSFE"]->fe_user->createUserSession($row );
		$GLOBALS["TSFE"]->fe_user->loginSessionStarted = TRUE;
		$GLOBALS["TSFE"]->fe_user->user = $GLOBALS["TSFE"]->fe_user->fetchUserSession();
		
 	}
}



if (defined('TYPO3_MODE') && $TYPO3_CONF_VARS[TYPO3_MODE]['XCLASS']['ext/cablan_double_login/pi1/class.tx_cablandoublelogin_pi1.php'])	{
	include_once($TYPO3_CONF_VARS[TYPO3_MODE]['XCLASS']['ext/cablan_double_login/pi1/class.tx_cablandoublelogin_pi1.php']);
}

?>