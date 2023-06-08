alert('jeune.js chargé');

$('input[type=checkbox]').change(function(e){
	//alert("checkbox checkboxed");
	if ($('input[type=checkbox]:checked').length > 4) {
			 $(this).prop('checked', false)
			 //alert("allowed only 4");
	}
})