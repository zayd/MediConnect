$('.nav-side').click(function()	{
	var id = $(this).attr("id");
	alert('id');
	$('.' + id).show(); 
});