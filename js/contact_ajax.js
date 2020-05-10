$('#cform').on('submit', function(e){
	e.preventdefault()
	$.ajax({
		url: 'php/contact.php',
		type: 'POST',
		data: $('#cform').serialize(),
		success: function(res){
			alert(res)
		}
	})

})

	
