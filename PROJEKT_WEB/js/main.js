$('form.ajax').on('submit', function(){
	
	var that = $(this), //forma
	url = that.attr('action'),
	method = that.attr('method'),
	data = {};
	
	that.fibd('[name]').each(function(index, value){
		
		document.write(value);
		
	})
	return false;
	
})