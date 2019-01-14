//Mobile menu
jQuery('#toggle').on('click', function(){
	jQuery(this).toggleClass('open');
	jQuery('body').toggleClass('active');
});

	
//Popup
jQuery(document).ready(function(){
	jQuery('.dialog-open').magnificPopup({
		removalDelay: 500,
		callbacks: {
			beforeOpen: function() {
				this.st.mainClass = this.st.el.attr('data-effect');
			}
		},
		midClick: true
	});
});


//Share button popup
(function() {
	var shareButtons = document.querySelectorAll(".shareBtn");
	if (shareButtons) {
		[].forEach.call(shareButtons, function(button) {
			button.addEventListener("click", function(event) {
				var width = 650,
				height = 450;
				event.preventDefault();
				window.open(this.href, 'Share Dialog', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,width='+width+',height='+height+',top='+(screen.height/2-height/2)+',left='+(screen.width/2-width/2));
			});
		});
	}
})();
