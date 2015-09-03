var app = angular.module('takeawaygrid',['ngSanitize','angularUtils.directives.dirPagination','ui.bootstrap' , 'ngProgress' ,'mgcrea.ngStrap','ngAnimate' ]);

	app.filter('dashed', function () {
	        return function (text) {				
				var str = text.replace("'", "").replace(/\s+/g, '-');
				return str.toLowerCase();
	        };
	});


	app.filter('html',function($sce){
	    return function(input){
	        return $sce.trustAsHtml(input);
	    }
	});



	app.filter('flatt',function(){
		return function(input){
			var price = 0;
			angular.forEach(input, function(obj , index){
				price = parseFloat(price) + parseFloat(obj);
			});

			return price;


		}
	});




	app.controller('GridController',function($scope , $http ,$timeout, ngProgress ,$alert){
		
		if( angular.isDefined(takeaway_category) ){
			$scope.takeway_category = takeaway_category.data.category_name;
			$scope.spec_cat = takeaway_category.data.cat_all_info;

			$scope.symbol = takeaway_category.data.currency_symbol;

			$scope.per_page = parseInt( takeaway_category.per_page );

		}



		$scope.chnagePrice = function( $event , childId , childPrice , scope , final_price){

			if( !angular.isDefined(final_price)){
					final_price = 0;
			}

			var checkbox = $event.target;
			if( checkbox.checked == true){	

     				final_price = parseFloat(childPrice) + parseFloat(final_price);
					
			}else{

				final_price =  parseFloat(final_price) - parseFloat(childPrice);
			}
			

			return parseFloat(final_price);
			
		}


		$scope.selectedChild = function($event , childPrice , childId , selected_child , scope ){
			var checkbox = $event.target;

			if( !angular.isDefined(selected_child)){
					selected_child = [];
			}

			if( checkbox.checked == true ){

				selected_child.push({
					'child_product_id':childId,
					'child_product_price': childPrice
				});

			}else{

				angular.forEach(selected_child , function(child , index){
						if(child.child_product_id == childId ){
							selected_child.splice(index,1);
						}
				});			 
				
			}

			return selected_child;
		}	




		$scope.addToCart = function( post_id, post_price , post_selected_child){

			ngProgress.start();

			$http({
                method: 'POST',
                url: takeaway_category.url+'?action=do_add_to_cart' ,
                data: jQuery.param({ 'items': post_selected_child }),
                headers : { 'Content-Type': 'application/x-www-form-urlencoded' }
            }).success(function(e){
               	

             
            	
            	if( e.success == 1 ){

            

            		jQuery('span.amount').html(e.cart);

	            		$http({

	            			method: 'POST',
			                url: takeaway_category.url+'?action=show_mini_cart',			                
			                headers : { 'Content-Type': 'application/x-www-form-urlencoded' }

	            		}).success(function(r){

			               	jQuery('#mini-cart').html(r); 
						 	// jQuery('.header-top-bar .cart-contents').addClass('redbg');
						 	// jQuery('#mini-cart').slideDown(250);

						 	jQuery('html, body').animate({ scrollTop: 0 }, 500);

	            		});


            	} 




               	$timeout(ngProgress.complete(), 800);
            });
				
		}




		$scope.addToCartSimple = function(post_id){

			
			$scope.showLoader = true;
			

			ngProgress.start();


			$http({
                method: 'POST',
                url: takeaway_category.url+'?action=do_add_to_cart_simple',
                data: jQuery.param({ 'id': post_id }),
                headers : { 'Content-Type': 'application/x-www-form-urlencoded' }
            }).success(function(e){              	


            	
            	
            	if( e.success == 1 ){

            	//	$alert({ content: e.message, placement: 'top', type: 'material', show: true });

            		jQuery('span.amount').html(e.cart);

	            		$http({

	            			method: 'POST',
			                url: takeaway_category.url+'?action=show_mini_cart',			                
			                headers : { 'Content-Type': 'application/x-www-form-urlencoded' }

	            		}).success(function(r){

			               	jQuery('#mini-cart').html(r);
			               	jQuery('html, body').animate({ scrollTop: 0 }, 500);
 
						 	// jQuery('.header-top-bar .cart-contents').addClass('redbg');
						 	// jQuery('#mini-cart').slideDown(250);

	            		});


            	} 


               	$timeout(ngProgress.complete(), 1000);

               	$scope.showLoader = false;
            });

		}














			if( angular.isDefined('takeaway_category') ){

				// $scope.formOption = [];
				// $scope.priceOption = [];

				// $scope.options = takeaway_category.option;

				// $scope.main_price = takeaway_category.main_price;
			}




			$scope.addOption = function( option , id , formOption , new_price  ){
				
						var found = jQuery.inArray(option, formOption );
						if (found >= 0) {
						    // Element was found, remove it.

						    

						    //new_price = parseFloat(new_price) - parseFloat(option.price);

						    
						    

						    // new_price.splice(found ,1);						  
						    formOption.splice(found, 1);
						    new_price[0] = parseFloat(new_price[0]) - parseFloat(option.price);     

						    
						} else {
						    // Element was not found, add it.

						   // var price = 0;
						   // angular.forEach(new_price , function(obj, index)){

						   // 	   price = parseFloat(price) + parseFloat(obj);
						   // }
						   // price = parseFloat(price) + parseFloat(option.price);
						   

						    // new_pricep[0] = option.price;

						    new_price[0] = parseFloat(new_price[0]) + parseFloat(option.price);   

						    formOption.push(option);
						}
				        	
			}





			$scope.addSelectOption = function(option , id , selectedOption , formOption , price ){

						if( formOption.length > 0){

							angular.forEach( formOption , function(obj , index){
									
	        							if( obj.id == option.id){

	        								price[0] = parseFloat(price[0]) - parseFloat(obj.price);  
											formOption.splice(index, 1);									
											return;
										}
							});

							if( option.variation == 'yes' ){
								selectedOption.variation = 'yes';
							}

							if( selectedOption != null){

								
                                if( price[0] == null){
                                    price[0] = '0';
                                }
                                
                                price[0] = parseFloat(price[0]) + parseFloat(selectedOption.price);  

								formOption.push(selectedOption);
							}


						}else{

                            if( price[0] == null ){
                                price[0] = '0';
                            }
                            
                            price[0] = parseFloat(price[0]) + parseFloat(selectedOption.price);  


							   
							formOption.push(selectedOption);
						}
			}

			// $scope.option.selectedOption = $scope.options[1];



 			function check_for_variation(options){

 				angular.forEach(options , function(obj , index ){
 					if(obj.variation == 'yes'){
 						
 						return true;
 					}
 				});
 				return false;
 			}





	 	  $scope.doAddtoCartGrid = function( formOption , price_array , id ){

	 	  		// var quantity = 1;
 	  		var quantity1 = angular.element('.p-'+id).val();

 	  		console.log(quantity1);
	 	  		

				var price = 0;

				angular.forEach( price_array , function(obj , index){
					price = parseFloat(price) + parseFloat(obj);
				});

			

				$scope.showLoader = true;




	 	  		$http({
	                method: 'POST',
	                url: takeaway_category.url+'?action=do_cart_new',
	                data: jQuery.param({ 'quantity' : quantity1 , 'price':price , 'option':formOption , 'product_id':id  }),
	                headers : { 'Content-Type': 'application/x-www-form-urlencoded' }
	            }).success(function(e){


	            	if( e.success == 1 ){

	            

	            		jQuery('span.amount').html(e.cart);

		            		$http({

		            			method: 'POST',
				                url: takeaway_category.url+'?action=show_mini_cart',			                
				                headers : { 'Content-Type': 'application/x-www-form-urlencoded' }

		            		}).success(function(r){

				               	jQuery('#mini-cart').html(r); 
							 	jQuery('html, body').animate({ scrollTop: 0 }, 500);
							 	//jQuery(location.reload(true));

							 	// $location.url($location.path());

							 // 	var currentPageTemplate = $route.current.templateUrl;
								// $templateCache.remove(currentPageTemplate);
								// $route.reload();

		            		});


	            	} 





	            	$scope.showLoader = false;
	            });


	 	  }




	});



























/**
 *   
 @food option
 */




	var food = angular.module('dyCart',[]);


	food.controller('dyController',['$scope','$http', function($scope , $http ){
		




		if( angular.isDefined('takeaway_category') ){

			$scope.formOption = [];
			$scope.priceOption = [];

			$scope.options = takeaway_category.option;

			$scope.main_price = takeaway_category.main_price;
		}




		$scope.addOption = function(option , id){
			
					var found = jQuery.inArray(option, $scope.formOption );
					if (found >= 0) {
					    // Element was found, remove it.
					    $scope.formOption.splice(found, 1);
					    
					} else {
					    // Element was not found, add it.
					    $scope.formOption.push(option);
					}			        	
		}





			$scope.addSelectOption = function(option , id , selectedOption ){

						if( $scope.formOption.length > 0){

							angular.forEach($scope.formOption , function(obj , index){
									
	        							if( obj.id == option.id){
											$scope.formOption.splice(index, 1);									
											return;
										}
							});

							if( option.variation == 'yes' ){
								selectedOption.variation = 'yes';
							}

							if( selectedOption != null)
								$scope.formOption.push(selectedOption);


						}else{
							 $scope.formOption.push(selectedOption);
						}

			}




		if( $scope.main_price){

			$scope.price = parseFloat( $scope.main_price ); 

		}else{

			$scope.price = 0.0;	

		}

		


		$scope.$watchCollection(
            "formOption",
            function( newValue, oldValue ){                     
              
				if( $scope.main_price){
					$scope.price = parseFloat( $scope.main_price ); 	
				}else{
					$scope.price = 0.0;	
				}

               angular.forEach(newValue , function(obj , index){

               		if( obj.price != null ){
               			$scope.price = parseFloat($scope.price) + parseFloat(obj.price);

               		}else{

                   		if( obj.selectedOption.price ){
                   			$scope.price = parseFloat($scope.price) + parseFloat(obj.selectedOption.price);
                   		}

               		}                       		
               });

	        }
	    );



		function check_for_variation(options){

			angular.forEach(options , function(obj , index ){
				if(obj.variation == 'yes'){
					
					return true;
				}
			});
			return false;
		}


 			
 	  $scope.doAddtoCart = function(){



 	  		// error check 
 	  		var variation = check_for_variation($scope.options);

 	  		// if( variation == false){
 	  		// 	alert('Please select Product variation ');
 	  		// }

 	  		


 	  		var quantity = angular.element('.qty').val();
 	  		var product_id = angular.element('.food_product_id').val();

 	  		// console.log('algjalkd');
 	  		
 	  		var totalPrice = $scope.price;
 	  		var option = $scope.formOption;

 	  		console.log(product_id);

	 	  		$http({
	                method: 'POST',
	                url: takeaway_category.url+'?action=do_cart_new',
	                data: jQuery.param({ 'quantity' : quantity , 'price':totalPrice , 'option':option , 'product_id':product_id  }),
	                headers : { 'Content-Type': 'application/x-www-form-urlencoded' }
	            }).success(function(e){

	            	// console.log(e);
	            	jQuery('#mini-cart').html(e); 
					jQuery('html, body').animate({ scrollTop: 0 }, 500);
	            });              	


 	  }


}]);
