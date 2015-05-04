jQuery.noConflict();
jQuery(document).ready(function($) {
	 var nav = responsiveNav(".nav-collapse");
	 var size = $(window).width();

//----------- desktop functions 	
	if ( size > 769) {
	// fade_in services 
		$('#block-views-services-block .layer-img').stop().mouseover(function(){
			$(this).children('div').stop(true, true).fadeIn( "slow");
		});
		$('#block-views-services-block .layer-img').mouseleave(function(){
			$(this).children('div').stop(true, true).fadeOut( "slow");
		});

	// fade_in EQUIPE
		$('#block-views-equipe-block-1 .layer-txt').stop().mouseover(function(){
			if (!$(this).parent('').hasClass('id-19')){
			  $(this).prev('div.layer-img').find('img').css('opacity', '0.8');
			}
		});
		$('#block-views-equipe-block-1 .layer-txt').mouseleave(function(){
		   if (!$(this).parent('').hasClass('id-19')){
			  $(this).prev('div.layer-img').find('img').css('opacity', '1');
		   }
		});
	//volet qui s'ouvre 
	  $('.layer-txt').stop().click (function(){
		  if (!$(this).parent('').hasClass('id-19')){
			$('#block-views-equipe-block-1 .text-suite').each(function() {
				 $(this).stop(true,true).fadeOut( "slow");
			});
		   if ($(this).hasClass('ferme')) {
				$(this).children('p.text-suite').stop(true,true).fadeOut( "slow");
				$(this).removeClass('ferme');
		   }
			else {
				$(this).children('p.text-suite').stop(true,true).fadeIn( "slow");
					$('.layer-txt').each(function() {
						$(this).removeClass('ferme');
					});
				$(this).addClass('ferme');
			}
		  }
	 });
	}
//----------- mobile functions 	
	if ( size <= 768) {
		
	}

});