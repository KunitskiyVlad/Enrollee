$(document).ready(function(){
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