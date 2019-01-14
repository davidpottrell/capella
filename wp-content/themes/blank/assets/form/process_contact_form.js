jQuery.fn.reset = function () {
  $(this).each (function() { this.reset(); });
}

function validate() {
	
	jQuery.post('/wp-content/themes/blank/assets/form/process_contact_form.php', jQuery("#easyform").serialize(), function(data) {
	//jQuery.post('process_smtp_form.php', jQuery("#easyform").serialize(), function(data) {
		
		if (data == "success") {

			//Hide the errors, show our amazing success message
			$("#error").hide();
			$("#success").slideDown("fast");
			
			//Scroll to top of form
			var destination = $('#easyform').offset().top - 0; //If you are using fixed header, change 0 to any height you wish
			$("html:not(:animated),body:not(:animated)").animate({
				scrollTop: destination
			}, 200);

			// Clear form data
			$("#easyform").reset();
			
			//Reload captcha when the message is sent
			$('#verify_image').attr('src', $('#verify_image').attr('src')+'?'+Math.random());
		} 
		else 
		{
			//Show the errors
			$("#error").html(data).slideDown("fast");

			//Scroll to top of form
			var destination = $('#easyform').offset().top - 0; //If you are using fixed header, change 0 to any height you wish
			$("html:not(:animated),body:not(:animated)").animate({
				scrollTop: destination
			}, 200);
		}
	});
	return false;
}