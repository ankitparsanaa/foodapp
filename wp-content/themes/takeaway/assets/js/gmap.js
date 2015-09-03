(function($){

	// console.log('find me from admin script');
	

	$('#_meta_box_2_convert_zip').click(function(){

		// console.log('clicked');

		var country = $('#_meta_box_2_casa_address_country_name').val(),
			region = $('#_meta_box_2_casa_address_region_name').val(),
			address = $('#_meta_box_2_casa_address_name').val(),
			zipcode = $('#_meta_box_2_casa_address_zip').val();
 		// console.log(country);

		$.ajax({
			type:'POST',
			url: ajaxurl,
			data: {'action':'convert_zip_to_long_lat', 'country': country, 'region': region, 'address': address, 'zipcode' : zipcode},
			success: function(result){
				var data = JSON.parse(result);
				// console.log(data);

					 

				$('#_meta_box_2_casa_address_lat').val(data.lat);
				$('#_meta_box_2_casa_address_lng').val(data.lng);		

				// var lat_gmap = $('#_meta_box_2_casa_address_lat').val();
				// var lng_gmap = $('#_meta_box_2_casa_address_lat').val();

				// console.log(lat_gmap);

			}

		});

		


	});





})(jQuery);