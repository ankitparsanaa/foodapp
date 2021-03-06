<?php
/*
  Template Name: menu-list-view
 */
?>

<?php get_header(); ?>
<?php
global $woocommerce;
$cart_page_id = wc_get_page_id('cart');
$cart_link = get_permalink($cart_page_id);
?>

<div id="page-content">
    <div class="container" data-ng-app="takeawaygrid" data-ng-cloak>			
        <div class="row mt30" data-ng-controller="GridController">
            <div class="col-md-12">

                <!-- Nav tabs -->
                <div class="fond" data-ng-if="showLoader">
                    <div class="contener_general">
                        <div class="contener_mixte"><div class="ballcolor ball_1">&nbsp;</div></div>
                        <div class="contener_mixte"><div class="ballcolor ball_2">&nbsp;</div></div>
                        <div class="contener_mixte"><div class="ballcolor ball_3">&nbsp;</div></div>
                        <div class="contener_mixte"><div class="ballcolor ball_4">&nbsp;</div></div>
                    </div>
                </div>




                <ul class="nav nav-tabs" role="tablist">
                    <li role="presentation" class="active"><a href="#all" role="tab" data-toggle="tab">All</a></li>
                    <li role="presentation" data-ng-repeat="category_name in takeway_category track by $index">
                        <a href="#{{category_name| dashed}}" role="tab" data-toggle="tab">{{ category_name}}</a>
                    </li>
                </ul>

                <!-- Tab panes -->
                <div class="tab-content">
                    <div role="tabpanel" class="tab-pane" data-ng-repeat="(spec_name,spec_value) in spec_cat track by $index" id="{{spec_name|dashed}}" data-ng-class="$index == 0?'tab-pane active':''">
                        <div class="all-menu-details menu-with-2grid thumb">
                            <h5 >{{ spec_name}}</h5>
                            <div class="row">


                                <div class="col-md-6">
                                    <div data-ng-repeat="post in spec_value track by $index">
                                        <div data-ng-if="$index % 2 == 0">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="item-list">
                                                        <div class="all-details">
                                                            <div class="visible-option">
                                                                <div class="details">

                                                                    <h6><a href="{{post.guid}}">{{ post.post_title}}</a></h6>


                                                                    <p class="for-list" data-ng-bind-html="post.post_content | limitTo: 100"></p>

                                                                </div> <!-- end details -->





                                                                <div class="price-option fl" style="float:right;">

                                                                    <!-- 	<h5 data-ng-if="post.product_type == 'grouped'">  $ {{ post.final_price || 'please select one' }}  </h5 > -->

                                                                    <h4 class="select-option-title" data-ng-if="post.children.length || post.food.length">select options</h4>
                                                                    <h4 data-ng-if="!post.children.length && !post.food.length"><?php echo get_woocommerce_currency_symbol(); ?>{{post.price}}</h4>

                                                                    <!-- <h4 data-ng-if="post.product_type != 'grouped'" data-ng-bind-html="post.signed_price|html"></h4> -->




                                                                    <!-- <button data-ng-if="post.children.length || post.food.length" class="toggle">Option</button> -->
                                                                    <button data-ng-if="post.children.length || post.food.length" class="toggle">Option</button>
                                                                    <button data-ng-if="!post.children.length && !post.food.length" class="faButton" data-ng-click="addToCartSimple(post.post_id)"  data-toggle="tooltip" data-placement="top" title="Add to cart"><i class="fa fa-shopping-cart"></i></button>


                                                                </div> <!-- end price option -->



                                                            </div> <!-- end visible-option -->




                                                            <div class="dropdown-option clearfix">

                                                                <div class="dropdown-details">
                                                                    <h5> Select Your Option</h5>

                                                                    <form class="default-form" data-ng-if="post.children">





                                                                        <div >
                                                                            <div data-ng-repeat="child in post.children track by $index">																						
                                                                                    <!-- <span class="checkbox-input" data-ng-class="child.checkmodel[$index]"> -->
                                                                                <input type="checkbox" name="p_id" data-ng-click="post.final_price = chnagePrice($event, child.post_id, child.price, this, post.final_price); post.selected_child = selectedChild($event, child.price, child.post_id, post.selected_child, $this)" id="{{child.post_id}}" value="{{child.price}}">
                                                                                <label for="{{child.post_id}}">{{child.post_title}} 
                                                                                </label>
                                                                                <span><i class="fa fa-plus ng-binding"> <?php echo get_woocommerce_currency_symbol(); ?> {{child.price}}</i></span>
                                                                                <!-- </span> -->

                                                                            </div>
                                                                        </div>	
                                                                        <br>

                                                                        <button  data-ng-click="addToCart(post.id, post.price, post.selected_child)" type="button" class="btn btn-default-red">Add to Cart</button>
                                                                        <a href="<?php echo $cart_link; ?>" class="button">View Cart</a>

                                                                    </form>







                                                                    <div ng-if="post.food.length" ng-init="post.formOption = []; post.new_price = []" >


                                                                        <span ng-init="post.new_price[0] = 0.0"></span>



                                                                        <span ng-if="post.food_price">
                                                                            <span ng-init="post.new_price[0] = post.food_price"></span>
                                                                        </span>



                                                                        <span class="total_price">total price {{ post.new_price | flatt }}</span>




                                                                        <div ng-repeat="option in post.food track by $index">

                                                                            <div ng-if="option.type == 'checkbox'">
                                                                                <input type="checkbox" name="{{option.id}}" ng-model="option.checkbox" ng-change="addOption(option, option.id, post.formOption, post.new_price)">  {{ option.title}} <span><i class="fa fa-plus ng-binding"> <?php echo get_woocommerce_currency_symbol(); ?> {{ option.price}} </i></span>

<!-- <input type="number"  ng-if="option.quantity == 'yes'" ng-model="option.number">  -->
                                                                            </div>

                                                                        </div>



                                                                        <input type="hidden" name="product_id" class="food_product_id" value="{{ post.post_id}}">


                                                                        <div ng-repeat="option in post.food track by $index">
                                                                            <div ng-if="option.type == 'select'">

                                                                                <label>{{option.title}}</label>

                                                                                <div ng-if="option.variation == 'yes'">

                                                                                    <select ng-model="option.selectedOption" ng-change="addSelectOption(option, option.id, option.selectedOption, post.formOption, post.new_price)" ng-options="attr as attr.text for attr in option.options"></select>			
                                                                                </div>

                                                                                <div ng-if="option.variation == 'no' || !option.variation">
                                                                                    <select ng-model="option.selectedOption" ng-change="addSelectOption(option, '', option.selectedOption, post.formOption, post.new_price)" ng-options="attr as attr.text for attr in option.options">
                                                                                        <option value="">Please select one</option>
                                                                                    </select>				
                                                                                </div>
                                                                            </div>

                                                                        </div>

<?php
// echo $cart_link;
?>

                                                                        <br>


<?php _e('Qty:', 'takeaway'); ?><div class="quantity buttons_added"><input type="button" value="-" class="minus"><input type="number" step="1" min="1" name="quantity" value="1" title="Qty" class="input-text qty p-{{post.post_id}} text" size="4" style="width:40px;"><input type="button" value="+" class="plus"></div><br>


                                                                        <p class="buttons">
                                                                            <button type="button" class="button" ng-click="doAddtoCartGrid(post.formOption, post.new_price, post.post_id)">Add to cart</button>
                                                                            <a href="<?php echo $cart_link; ?>" class="button">View Cart</a>
                                                                        </p>





                                                                    </div>
















                                                                </div> <!-- dropdown-details -->
                                                            </div> <!-- dropdown-option clearfix -->


                                                        </div> 
                                                        <!-- end all-details -->
                                                    </div> 
                                                    <!-- end item-list -->
                                                </div> 
                                                <!-- col-md-12 -->
                                            </div> 
                                            <!-- end row -->
                                        </div>
                                        <!-- end data-ng-if -->
                                    </div>
                                    <!-- end data-ng loop -->
                                </div>
                                <!-- end col-md-6 -->


                                <div class="col-md-6">
                                    <div data-ng-repeat="post in spec_value track by $index">
                                        <div data-ng-if="$index % 2 != 0">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="item-list">
                                                        <div class="all-details">
                                                            <div class="visible-option">
                                                                <div class="details">

                                                                    <h6><a href="{{post.guid}}">{{ post.post_title}}</a></h6>


                                                                    <p class="for-list" data-ng-bind-html="post.post_content | limitTo: 100"></p>

                                                                </div> <!-- end details -->







                                                                <div class="price-option fl" style="float:right;">


                                                                    <h4 class="select-option-title" data-ng-if="post.children.length || post.food.length">select options</h4>
                                                                    <h4 data-ng-if="!post.children.length && !post.food.length"><?php echo get_woocommerce_currency_symbol(); ?>{{post.price}}</h4>																	

                                                                    <!-- <button data-ng-if="post.children.length || post.food.length" class="toggle">Option</button> -->
                                                                    <button data-ng-if="post.children.length || post.food.length" class="toggle">Option</button>
                                                                    <button data-ng-if="!post.children.length && !post.food.length" class="faButton" data-ng-click="addToCartSimple(post.post_id)"  data-toggle="tooltip" data-placement="top" title="Add to cart"><i class="fa fa-shopping-cart"></i></button>




                                                                </div> <!-- end price option -->



                                                            </div> <!-- end visible-option -->




                                                            <div class="dropdown-option clearfix">

                                                                <div class="dropdown-details">
                                                                    <h5> Select Your Option</h5>

                                                                    <form class="default-form" data-ng-if="post.children">


                                                                        <div>
                                                                            <div data-ng-repeat="child in post.children track by $index">																						
                                                                                    <!-- <span class="checkbox-input" data-ng-class="child.checkmodel[$index]"> -->
                                                                                <input type="checkbox" name="p_id" data-ng-click="post.final_price = chnagePrice($event, child.post_id, child.price, this, post.final_price); post.selected_child = selectedChild($event, child.price, child.post_id, post.selected_child, $this)" id="{{child.post_id}}" value="{{child.price}}">
                                                                                <label for="{{child.post_id}}">{{child.post_title}} 
                                                                                </label>
                                                                                <span><i class="fa fa-plus ng-binding"> <?php echo get_woocommerce_currency_symbol(); ?> {{child.price}}</i></span>
                                                                                <!-- </span> -->

                                                                            </div>
                                                                        </div>		
                                                                        <br>

                                                                        <button  data-ng-click="addToCart(post.id, post.price, post.selected_child)" type="button" class="btn btn-default-red">Add to Cart</button>

                                                                        <a href="<?php echo $cart_link; ?>" class="button">View Cart</a>
                                                                    </form>





                                                                    <div ng-if="post.food.length" ng-init="post.formOption = []; post.new_price = []" >



                                                                        <span ng-init="post.new_price[0] = 0.0"></span>

                                                                        <span ng-if="post.food_price">
                                                                            <span ng-init="post.new_price[0] = post.food_price"></span>
                                                                        </span>




                                                                        <span class="total_price">total price {{ post.new_price | flatt }}</span>




                                                                        <div ng-repeat="option in post.food track by $index">

                                                                            <div ng-if="option.type == 'checkbox'">
                                                                                <input type="checkbox" name="{{option.id}}" ng-model="option.checkbox" ng-change="addOption(option, option.id, post.formOption, post.new_price)"> {{ option.title}} <span><i class="fa fa-plus ng-binding"><?php echo get_woocommerce_currency_symbol(); ?> {{ option.price}} </i></span> 
                                                                                <!-- <input type="number"  ng-if="option.quantity == 'yes'" ng-model="option.number">  -->
                                                                            </div>

                                                                        </div>



                                                                        <input type="hidden" name="product_id" class="food_product_id" value="{{ post.post_id}}">


                                                                        <div ng-repeat="option in post.food track by $index">
                                                                            <div ng-if="option.type == 'select'">

                                                                                <label>{{option.title}}</label>

                                                                                <div ng-if="option.variation == 'yes'">
                                                                                    <select ng-model="option.selectedOption" ng-change="addSelectOption(option, option.id, option.selectedOption, post.formOption, post.new_price)" ng-options="attr as attr.text for attr in option.options">
                                                                                        <option value="">Please select one</option>
                                                                                    </select>			
                                                                                </div>

                                                                                <div ng-if="option.variation == 'no' || !option.variation">
                                                                                    <select ng-model="option.selectedOption" ng-change="addSelectOption(option, '', option.selectedOption, post.formOption, post.new_price)" ng-options="attr as attr.text for attr in option.options">
                                                                                        <option value="">Please select one</option>
                                                                                    </select>				
                                                                                </div>
                                                                            </div>

                                                                        </div>

<?php
global $woocommerce;
$cart_page_id = wc_get_page_id('cart');
$cart_link = get_permalink($cart_page_id);
// echo $cart_link;
?>

                                                                        <br>




<?php _e('Qty:', 'takeaway'); ?><div class="quantity buttons_added"><input type="button" value="-" class="minus"><input type="number" step="1" min="1" name="quantity" value="1" title="Qty" class="input-text qty p-{{post.post_id}} text" size="4" style="width:40px;"><input type="button" value="+" class="plus"></div><br>
                                                                        <p class="buttons">
                                                                            <button type="button" class="button" ng-click="doAddtoCartGrid(post.formOption, post.new_price, post.post_id)">Add to cart</button>
                                                                            <a href="<?php echo $cart_link; ?>" class="button">View Cart</a>
                                                                        </p>





                                                                    </div>










                                                                </div>
                                                            </div>


                                                        </div> 
                                                        <!-- end all-details -->
                                                    </div> 
                                                    <!-- end item-list -->
                                                </div> 
                                                <!-- col-md-12 -->
                                            </div> 
                                            <!-- end row -->
                                        </div>
                                        <!-- end data-ng-if -->
                                    </div>
                                    <!-- end data-ng loop -->
                                </div>
                                <!-- end col-md-6 -->


                            </div>
                        </div>
                    </div>
                </div>


            </div>

        </div>
        <!-- end .row -->
    </div>			
</div>	
<!--end .container -->

<?php get_footer(); ?>



