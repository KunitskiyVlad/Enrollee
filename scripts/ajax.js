$(document).ready(function(){
	 
	$('i').click(function(){
		
		var id = $(this).attr('id')
		var field = id.substr(9)
		if($(this).attr('class') == 'fas fa-caret-up')
		{	
			var order = 'ASC'
			$(this).removeClass('fas fa-caret-up') 
			$(this).addClass('fas fa-caret-down')

		}
		else { 
			if ($(this).attr('class') == 'fas fa-caret-down')
			{
				var order = 'DESC'
				$(this).removeClass('fas fa-caret-down') 
				$(this).addClass('fas fa-caret-up')
				//location.reload();

			}
}
	$.ajax(
		{
			url:'/home',
			method:'POST',
			data:{field:field, order:order},
			
    })
	})
	$(':checkbox').click(function()
	{	if($(this).prop('checked')){
		var parent = $(this).parent().parent()
		var input = parent.find('input')
		input.removeAttr("readonly")
		var parent = undefined;
		}
		else
		{
			var parent = $(this).parent().parent()
		var input = parent.find('input')
		input.attr("readonly", true)
		var parent = undefined;
		}

		})
	$('#change').click(function()
	{	//alert($('input').attr('readonly'))
		var ajaxData = ''
		data ={}
		$(':input:not([readonly])').not(':checkbox, :button').each(function()
		{	
			
			//data = new Object()
			var key = $(this).attr('name')
			data[key] = $(this).val()
		/*for (var key in data)
		{
			ajaxData = ajaxData + key +data[key] 
		}*/
		return data
		})
		//alert(ajaxData.serialize())
		$.ajax(
		{
			url:'/cabinet',
			method:'POST',
			data:data,
			
    })
	}) 
	$('#submit').click(function()
	{	var name = $('#name').val()
		var surname = $('#surname').val()
		var pass = $('#password').val()
		var repass = $('#repass').val()
		var mark = $('#mark').val()
		var birth = $('#birth').val()
		var sex = $('#sex').val()
		var email = $('#email').val()
		$.ajax(
		{
			url:'/registration',
			method:'POST',
			data:{name:name, surname:surname, pass:pass, repass:repass, mark:mark, birth:birth, sex:sex, email:email},
			
    }).done(function(response)
				{
					var data = JSON.parse(response)
					if(data == true){
						window.location.replace('/');
					} else{
					for(var key in data){
					
					$('#'+key).text(data[key])
					var id = $('#'+key).parent().addClass('error-field')
				
					}
					}
				}
			)
	})
})