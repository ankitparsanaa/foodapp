(function($){

$( "#meta_box_1" ).hide();


if ($('#page_template').find(':selected').val() == "chef.php") {
        $( "#meta_box_1" ).show();
	}
	
	else {
           $( "#meta_box_1" ).hide();
           alert("hi");
		}
$('#page_template').change(function () {
    //console.log($(this).find(':selected').text());
    if ($(this).find(':selected').val() == "chef.php") {
        $( "#meta_box_1" ).show();
    }

    else {
    	$( "#meta_box_1" ).hide();
    	
    }
});

})(jQuery);