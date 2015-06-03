<?php

/**
* @copyright	Copyright (C) 2009 - 2013 Ready Bytes Software Labs Pvt. Ltd. All rights reserved.
* @license		GNU/GPL, see LICENSE.php
* @package 		PAYCART
* @contact		support_paycart@readybytes.in
* @author		rimjhim
*/

/**
 * List of Populated Variables
 * $displayData = have all required data 
 * $displayData->prefix = Prefix for element {id and name}
 * 
 */
// no direct access
defined( '_JEXEC' ) OR die( 'Restricted access' );

$prefix = 'paycart_buyeraddress';

// custom prefix provided
if(isset($displayData->prefix) && !empty($displayData->prefix))  {
	$prefix = $displayData->prefix;
}

// use it for multiple ids
static $id_suffix = 0;
$id_suffix++;

?>
<span class="pc-error" id="paycart-buyer-address-error" for="paycart-buyer-address-error"><?php echo JText::_('COM_PAYCART_ACCOUNT_ADDRESS_NOT_ADDED');?></span>
<fieldset>

<!--	Buyeraddress id	-->
	<div class="">
	<!--	Buyeraddress Country : value		-->
		<div class="">		
			<input	name="<?php echo $prefix; ?>[buyeraddress_id]" 
					id="buyeraddress_id_<?php echo $id_suffix; ?>"
					value="<?php echo @$displayData->buyeraddress_id; ?>"
					type="hidden"
				/>
		</div>								
	</div>
				
<!--	Buyeraddress buyer_id	-->
	<div class="">
		<!--	Buyeraddress buyer_id : value		-->
		<div class="">		
			<input	name="<?php echo $prefix; ?>[buyer_id]" 
					id="buyer_id_<?php echo $id_suffix; ?>" 
					value="<?php echo @$displayData->buyer_id; ?>"
					type="hidden" 
				/>
				
		</div>								
	</div>	
		
<!-- Buyer To -->
	<div class="control-group">
	  <label class="control-label required" for="to_<?php echo $id_suffix; ?>">
	  		<?php echo JText::_('COM_PAYCART_TO');?>
	  </label>
	  <div class="controls">
	    <input 
	    		name="<?php echo $prefix; ?>[to]" 
				id="to_<?php echo $id_suffix; ?>" 
				value="<?php echo @$displayData->to; ?>"
				type="text" required="true"
		/>
		<div class="pc-error" for="to_<?php echo $id_suffix; ?>"><?php echo JText::_('COM_PAYCART_ADMIN_VALIDATION_ERROR_REQUIRED');?></div>
	  </div>
	</div>
		
<!-- Buyer Address -->
	<div class="control-group">
	  <label class="control-label required" for="address_<?php echo $id_suffix; ?>">
	  	<?php echo JText::_('COM_PAYCART_ADDRESS');?>
	  </label>
	  <div class="controls">                     
	    <textarea 	name="<?php echo $prefix; ?>[address]" 
					id="address_<?php echo $id_suffix; ?>"
					required="true"><?php echo @$displayData->address; ?></textarea>
		<div class="pc-error" for="address_<?php echo $id_suffix; ?>"><?php echo JText::_('COM_PAYCART_ADMIN_VALIDATION_ERROR_REQUIRED');?></div>
	  </div>
	</div>
	
	
<!-- Buyeraddress country-->
	<div class="control-group">
	  <label class="control-label" for="textinput">
	  		<?php echo JText::_('COM_PAYCART_COUNTRY');?>
	  </label>
	  <div class="controls">
	  		<?php
	  			echo PaycartHtmlCountry::getList($prefix.'[country_id]', @$displayData->country_id, "country_id_$id_suffix", array('class'=>'validate-hidden required')); 
	  		?>
	  		<div class="pc-error pc-margin-top-0" for="country_id_<?php echo $id_suffix; ?>"><?php echo JText::_('COM_PAYCART_ADMIN_VALIDATION_ERROR_REQUIRED');?></div>
	   
	  </div>
	</div>
	
	
	
<!--	Buyeraddress State	-->
	<div class="control-group">
	  
	  <label class="control-label" for="textinput">
	  		<?php echo JText::_('COM_PAYCART_STATE');?>
	  </label>
	  <div class="controls">
		  	<?php 
		  		echo PaycartHtmlState::getList($prefix.'[state_id]',@$displayData->state_id,  "state_id_$id_suffix", array( 'class'=>'validate-hidden required'),  @$displayData->country_id);
		  	?>
		   	    
		    <script>
				(function($){
	
					$(<?php echo "'#country_id_$id_suffix'"; ?>).on('change',  function() {
						paycart.address.state.onCountryChange(<?php echo "'#country_id_$id_suffix'" ?>, <?php echo "'#state_id_$id_suffix'" ?>);
					});
					<?php
						// if state already available then no need to get states  
						if (!@$displayData->state_id) :
					?>
						paycart.address.state.onCountryChange(<?php echo "'#country_id_$id_suffix'" ?>, <?php echo "'#state_id_$id_suffix'" ?>);
					<?php endif; ?>
					
				})(paycart.jQuery);
		   </script>
		   <div class="pc-error pc-margin-top-0" for="state_id_<?php echo $id_suffix; ?>"><?php echo JText::_('COM_PAYCART_ADMIN_VALIDATION_ERROR_REQUIRED');?></div>
	  </div>
	</div>

<!--	Buyeraddress City	-->
	<div class="control-group">
	  <label class="control-label required" for="city_<?php echo $id_suffix; ?>">
	  		<?php echo JText::_('COM_PAYCART_CITY');?>
	  </label>
	  <div class="controls">
	    <input 	name="<?php echo $prefix; ?>[city]" 
				id="city_<?php echo $id_suffix; ?>" 
				value="<?php echo @$displayData->city; ?>"
	    	    type="text" required="true">
	   	<div class="pc-error" for="city_<?php echo $id_suffix; ?>"><?php echo JText::_('COM_PAYCART_ADMIN_VALIDATION_ERROR_REQUIRED');?></div>
	  </div>
	</div>

<!--	Buyeraddress Zipcode	-->
	<div class="control-group">
	  <label class="control-label required" for="zipcode_<?php echo $id_suffix; ?>">
	  		<?php echo JText::_('COM_PAYCART_ZIPCODE');?>
	  </label>
	  <div class="controls">
		    <input 	name="<?php echo $prefix; ?>[zipcode]" 
					id="zipcode_<?php echo $id_suffix; ?>" 
					value="<?php echo @$displayData->zipcode; ?>"
					type="text" required="true">
			<div class="pc-error" for="zipcode_<?php echo $id_suffix; ?>"><?php echo JText::_('COM_PAYCART_ADMIN_VALIDATION_ERROR_REQUIRED');?></div>
	  
	  </div>
	</div>
		
<!--	Buyeraddress Phone	-->
	<div class="control-group">
	  <label class="control-label required" for="phone_<?php echo $id_suffix; ?>">
	  		<?php echo JText::_('COM_PAYCART_PHONE');?>
	  </label>
	  <div class="controls">
		    <input	name="<?php echo $prefix; ?>[phone]" 
					id="phone_<?php echo $id_suffix; ?>" 
					value="<?php echo @$displayData->phone; ?>" 
		    		type="text" required="true">
		    <div class="pc-error" for="phone_<?php echo $id_suffix; ?>"><?php echo JText::_('COM_PAYCART_ADMIN_VALIDATION_ERROR_REQUIRED');?></div>
	  </div>
	</div>


</fieldset>
<?php 
