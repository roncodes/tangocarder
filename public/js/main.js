var tango_carder = {

	validate_email : function(email) { 
		var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
		return re.test(email);
	},
	
	add_recipent : function(recipent) {
		if(this.validate_email(recipent)) {
			$('.recipents').append('<div id="'+recipent.replace('@', '').replace('.', '')+'" style="width:100%;height:20px;background:#C9FFFF;padding:5px;">' + recipent + '<a href="javascript:tango_carder.remove_recipent(&#39;'+recipent.replace('@', '').replace('.', '')+'&#39;, &#39;'+recipent+'&#39;);" class="pull-right" style="margin-right:30px;">remove</a></div>');
			$('.recipents-input').val($('.recipents-input').val() + recipent + ', ')
			$('#recipentAdd').val('');
		} else {
			this.talert('Email is invalid', 'error');
		}
	},
	
	remove_recipent : function(recipent, orig) {
		$('#'+recipent).fadeOut();
		$('.recipents-input').val($('.recipents-input').val().replace(orig+', ', ''));
	},
	
	talert : function(message, type) {
		$('.alert').removeClass();
		$('.message').parent().addClass('alert alert-'+type);
		$('.alert .message').html(message);
		$('.alert').fadeIn();
		setTimeout(function() { $('.alert').fadeOut(function (){ $(this).remove() }); }, 2100);
	},
	
	display_cards : function() {
		var number_of_cards = 0;
		var card_values = 0;
		$('.recipents').children('div').each(function () {
			if($(this).css('display') != 'none') {
				console.log($(this).text().replace('remove', ''));
				number_of_cards++;
			}
		});
		card_values = $('#spendingLimit').val()/number_of_cards;
		$('.span7').fadeOut();
		$('#end').fadeIn();
		setTimeout(function() { $('#end').parent().toggleClass('span5 span12'); }, 500);
		$('#end').html('<h3>You are about to send ' + number_of_cards + ' Tango Cards each at the value of $' + card_values + ' to the specified recipents</h3><p>'+$('.recipents-input').val()+'</p>');
		$('#finish').fadeIn();
	},
	
	complete : function() {
		$('#sendCards').submit();
	}

}