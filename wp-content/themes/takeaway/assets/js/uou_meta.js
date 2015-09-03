

(function($){

$( "#meta_box_1" ).hide();
$( "#meta_box_2" ).hide();
$( "#meta_box_3" ).hide();
$( "#meta_box_4" ).hide();
$( "#atmf_meta_box" ).hide();
$( "#front_page_meta_box" ).hide();

if ($('#page_template').find(':selected').val() == "contact-us.php") {
        $( "#meta_box_2" ).show();
        $( "#meta_box_3" ).show();
        $( "#meta_box_4" ).show();

    }
    
    else {
           $( "#meta_box_2" ).hide();
           $( "#meta_box_3" ).hide();
           $( "#meta_box_4" ).hide();


        }
$('#page_template').change(function () {
    //console.log($(this).find(':selected').text());
    if ($(this).find(':selected').val() == "contact-us.php") {
        $( "#meta_box_2" ).show();
        $( "#meta_box_3" ).show();
        $( "#meta_box_4" ).show();
    }

    else {
        $( "#meta_box_2" ).hide();
        $( "#meta_box_3" ).hide();
        $( "#meta_box_4" ).hide();
        
    }
});

if ($('#page_template').find(':selected').val() == "chef.php") {
        $( "#meta_box_1" ).show();
	}
	
	else {
           $( "#meta_box_1" ).hide();
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


if ($('#page_template').find(':selected').val() == "atmf-search.php") {
        $( "#atmf_meta_box" ).show();
    }
    
    else {
           $( "#atmf_meta_box" ).hide();
        }
$('#page_template').change(function () {
    //console.log($(this).find(':selected').text());
    if ($(this).find(':selected').val() == "atmf-search.php") {
        $( "#atmf_meta_box" ).show();
    }

    else {
        $( "#atmf_meta_box" ).hide();
        
    }
});

if ($('#page_template').find(':selected').val() == "template-front-page.php") {
        $( "#front_page_meta_box" ).show();
    }
    
    else {
           $( "#front_page_meta_box" ).hide();
        }
$('#page_template').change(function () {
    //console.log($(this).find(':selected').text());
    if ($(this).find(':selected').val() == "template-front-page.php") {
        $( "#front_page_meta_box" ).show();
    }

    else {
        $( "#front_page_meta_box" ).hide();
        
    }
});

// if ($('#product-type').find(':selected').val() == 'grouped') {
//     $( '#takeaway_grouped_product_metabox' ).show();
// }

//     else {
//         $( '#takeaway_grouped_product_metabox' ).hide();
//     }

// $('#product-type').change(function () {
//     //console.log($(this).find(':selected').text());
//     if ($(this).find(':selected').val() == "grouped") {
//         $( "#takeaway_grouped_product_metabox" ).show();
//     }

//     else {
//         $( "#takeaway_grouped_product_metabox" ).hide();
        
//     }
// });


$('#product-type').change(function() {
    if ($(this).find(':selected').val() == "food") {
        $("#price_for_grouped_product").show();
        $("#add_product_option").show();
    }
        else{
            
            $("#price_for_grouped_product").hide();
            $("#add_product_option").hide();
        }
});



})(jQuery);