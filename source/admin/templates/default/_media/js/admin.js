/**
* @copyright	Copyright (C) 2009-2012 Ready Bytes Software Labs Pvt. Ltd. All rights reserved.
* @license		GNU/GPL, see LICENSE.php
* @package		PAYCART
* @contact 		team@readybytes.in
*/

//define paycart, if not defined.
if (typeof(paycart)=='undefined'){
	var paycart = {}
}

// all admin function should be in admin scope 
if(typeof(paycart.admin)=='undefined'){
	paycart.admin = {};
}

//all admin function should be in admin scope 
if(typeof(Joomla)=='undefined'){
	Joomla = {};
}


(function($){
// START : 	
// Scoping code for easy and non-conflicting access to $.
// Should be first line, write code below this line.	
	
	
/*--------------------------------------------------------------
paycart.admin.grid
	submit
	filters
--------------------------------------------------------------*/
paycart.admin.grid = {
		
		//default submit function
		submit : function( view, action, validActions){
			
			// try views function if exist
			var funcName = view+'_'+ action ; 
			if(this[funcName] instanceof Function) {
				if(this[funcName].apply(this) == false)
					return false;
			}
			
			// then lastly submit form
			//submitform( action );
			if (action) {
		        document.adminForm.task.value=action;
		    }
			
			// validate actions
			//XITODO : send values as key of array , saving a loop
			validActions = eval(validActions);
			var isValidAction = false;
			for(var i=0; i < validActions.length ; i++){
				if(validActions[i] == action){
					isValidAction = true;
					break;
				}
			}
			
			if(isValidAction){
				if (!$('#adminForm').find("input,textarea,select").jqBootstrapValidation("hasErrors")) {
					Joomla.submitform(action, document.getElementById('adminForm'));
				}
				else{
					$('#adminForm').submit();
				}
			}else{
				Joomla.submitform(action, document.getElementById('adminForm'));
			}
		},
		
		filters : {
			reset : function(form){
				 // loop through form elements
			    var str = new Array();
                            var i=0;
			    for(i=0; i<form.elements.length; i++)
			    {
			        var string = form.elements[i].name;
			        if (string && string.substring(0,6) == 'filter' && (string!='filter_reset' && string!='filter_submit'))
			        {
			            form.elements[i].value = '';
			        }
			    }
				this.submit(view,null,validActions);
			}
		}
};



/** ===================================================
 *  Javascript For Paycart Entity
 *  ===================================================
 */
paycart.category =
	{
		add : function(categoryName, CallbackOnSuccess, CallbackOnError)
			{
				var link  = 'index.php?option=com_paycart&task=create&view=category';
				var data  = {'category_name': categoryName };
				paycart.ajax.go(link,data, CallbackOnSuccess, CallbackOnError);
			}
	};

paycart.alias =
	{
		add : function(title, id,  CallbackOnSuccess, CallbackOnError)
			{
				var link  = 'index.php?option=com_paycart&task=getalias&view=product';
				var data  = {'title': title , 'product_id': id };
				paycart.ajax.go(link,data, CallbackOnSuccess, CallbackOnError);
			}
	};
paycart.attribute = 
	{
		add : function()
		{
	
		},
		
		window : function(CallbackOnSuccess, CallbackOnError)
		{
			var link  = 'index.php?option=com_paycart&task=window&view=attribute';
			//paycart.ajax.go(link,data, CallbackOnSuccess, CallbackOnError);
			paycart.url.modal(link, null,800, 550);
		}
	}


/*--------------------------------------------------------------
  on Document ready 
--------------------------------------------------------------*/
$(document).ready(function(){
	
});

//ENDING :
//Scoping code for easy and non-conflicting access to $.
//Should be last line, write code above this line.
})(paycart.jQuery);