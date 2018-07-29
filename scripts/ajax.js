$(document).ready(function(){
	$('#auth').click(function()
	{	
		var pass = $('#pass').val()
		var email = $('#email').val()
		
		$.ajax(
		{
			url:'/authorization',
			method:'POST',
			data:{ pass:pass, email:email},
			
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
	{	
		var ajaxData = ''
		data ={}
		$(':input:not([readonly])').not(':checkbox, :button').each(function()
		{	
			
			//data = new Object()
			var key = $(this).attr('name')
			data[key] = $(this).val()
		
		return data
		})
		
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
	$('#user').click(function()
	{
		
		$('.bubble').css('display', 'block')
	})
	$('#logout').click(function()
	{	
		var logout = true
		
		$.ajax(
		{
			url:'/',
			method:'POST',
			data:{logout:logout},
			
    }).done(function(response)
{
	location.reload();

	
}
    )
	})
	$(document).mouseup(function (e){ 
		var div = $(".bubble"); 
		if (!div.is(e.target) /
		    && div.has(e.target).length === 0) { 
			div.hide(); 
		}
	}); 
	$(':input').blur(function()
			{	
				$(this).parent().removeClass('error-field')
				$('span').each(function()
		{	
			$(this).empty();
			//data = new Object()
			
		
		
		})
			}
			)
})