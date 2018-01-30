$(document).ready(function(){
	$('#contactForm').on('submit',function(event){
		event.preventDefault();
			$.ajax({
				url: "Form.php",
				data:'userName='+$("#userName").val()+'&userEmail='+$("#userEmail").val()+'&userMessage='+$("#userMessage").val()+'&submit='+$(submit).val(),
				type: "POST",
				success:function(data){
					$("#output").html(data).hide(3000);
				},
				error:function (data){
					$("#output").html(data).hide(3000);
				}
			});
		});	
	});