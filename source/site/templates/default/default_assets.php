<?php

/**
* @copyright	Copyright (C) 2009 - 2012 Ready Bytes Software Labs Pvt. Ltd. All rights reserved.
* @license		GNU/GPL, see LICENSE.php
* @package 		PAYCART
* @subpackage	Front-end
* @contact		team@readybytes.in
*/

// no direct access
defined( '_JEXEC' ) or die( 'Restricted access' );

Rb_HelperTemplate::loadSetupEnv();

// load bootsrap, font-awesome
$config = PaycartFactory::getConfig();
$load = array('jquery', 'rb', 'font-awesome');
if($config->get('template_load_bootstrap', false)){
	$load[] = 'bootstrap';
}

Rb_HelperTemplate::loadMedia($load);
Rb_Html::stylesheet(PAYCART_PATH_CORE_MEDIA.'/paycart.css');
Rb_Html::stylesheet(PAYCART_PATH_CORE_MEDIA.'/site.css');
Rb_Html::stylesheet(PAYCART_PATH_CORE_MEDIA.'/override.css');

Rb_Html::script(PAYCART_PATH_CORE_MEDIA.'/paycart.js');
Rb_Html::script(PAYCART_PATH_CORE_MEDIA.'/salvattore.js');
Rb_Html::script(PAYCART_PATH_CORE_MEDIA.'/site.js');