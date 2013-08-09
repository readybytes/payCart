<?php

/**
* @copyright	Copyright (C) 2009 - 2013 Ready Bytes Software Labs Pvt. Ltd. All rights reserved.
* @license		GNU/GPL, see LICENSE.php
* @package 		PAYCART
* @contact		support+paycart@readybytes.in
*/

// no direct access
defined('_JEXEC') or die( 'Restricted access' );

/** 
 * Attribute Ajax View
 * @author mManishTrivedi
 */

require_once dirname(__FILE__).'/view.php'; 
class PaycartAdminViewAttribute extends PaycartAdminBaseViewAttribute
{	
	protected $_response = null;
	
	function __construct($config = array() ) 
	{
		//$this->_response = PaycartFactory::getAjaxResponse();
		return parent::__construct($config);
	}
	
	public function window()
	{
		$attributeId	=  $this->getModel()->getState('id');
		$attribute		=  PaycartAttribute::getInstance($attributeId);
		
		$this->assign('form',  $attribute->getModelform()->getForm());
			
		$this->setTpl('window');
		return true;
	}
}