<div class="page-content">
    <div class="row control-area">
        <!--ul class="view-toggle pull-left">
            <li><a href="#" data-ng-click="postView = 'list'; activeLayout = !activeLayout;" data-layout="with-thumb" class="btn glyphicon glyphicon-th-list" data-ng-class="activeLayout ? '': 'redbox' "></a></li>
            <li><a href="#" data-ng-click="postView = 'grid'; activeLayout = !activeLayout;" data-layout="" class="btn glyphicon glyphicon-th" data-ng-class="activeLayout ? 'redbox': ' ' "></a></li>
        </ul-->

        <div class="fond" data-ng-if="showLoader">
            <div class="contener_general">
                <div class="contener_mixte"><div class="ballcolor ball_1">&nbsp;</div></div>
                <div class="contener_mixte"><div class="ballcolor ball_2">&nbsp;</div></div>
                <div class="contener_mixte"><div class="ballcolor ball_3">&nbsp;</div></div>
                <div class="contener_mixte"><div class="ballcolor ball_4">&nbsp;</div></div>
            </div>
        </div>
        
        <div class="col-md-10 col-sm-10">
            <div class="category">
                <script type="text/ng-template" id="items_renderer.html">
                    <!-- for taxonomy  -->
                    <div data-ng-if="item.option =='taxonomy' && !item.parent_taxonomy">
                    <div data-ng-if="item.taxonomy">
                    <div data-ng-show="item.viewType == 'select'">
                    <ul class="a-filter-ul">
                    <li data-ng-repeat="(key, value) in item.alloption">
                    <input type="checkbox" data-ng-change="grabResult( this ,formData[item.taxonomy][key], item)"  name="{{value}}" data-ng-model="formData[item.taxonomy][key]"  >{{value}}
                    </li>
                    </ul>
                    </div>

                    <div data-ng-show="item.viewType == 'checkbox'">
                    <select class="form-control" data-ng-change="grabResult( this ,formData[item.taxonomy] , item)" data-ng-model="formData[item.taxonomy]">
                    <option value="">All {{ item.title }}</option>
                    <option value="{{key}}" ng-repeat="(key ,value) in item.alloption">{{value}}</option>
                    </select>
                    </div>

                    </div>

                    </div>





                    <!-- for metadata   -->

                    <div data-ng-if="item.option == 'metadata' ">
                    <h3>{{ item.title }}</h3>	
                    <div data-ng-if="item.viewType =='range' ">
                    <div class="range-slider clearfix">
                    <div slider min="item.rangeStart"  max="item.rangeEnd" start="item.start" end="item.end" class="cdbl-slider" onend="grabMeta()" onchnage="addTometa(item.metakey ,item.start , item.end)" key="item.metakey" ></div>
                    <br/>
                    <span> {{item.start}} </span>
                    <span style="float:right;"> {{item.end}} </span>
                    </div>
                    </div>
                    <div data-ng-show="item.viewType == 'checkbox' ">
                    <ul data-ng-if="item.metakey">
                    <li data-ng-repeat="(key, value) in item.alloption">
                    <input type="checkbox" data-ng-change="grabMeta()" name="{{value}}" data-ng-model="formMeta[item.metakey][value]"> {{value}}
                    </li>
                    </ul>
                    </div>
                    <div data-ng-show="item.viewType == 'radio' ">
                    <ul data-ng-if="item.metakey">
                    <li data-ng-repeat="(key, value) in item.alloption">
                    <input type="radio"   name="{{item.metakey}}" data-ng-model="formMeta[item.metakey]" data-ng-value="{{value}}"  data-ng-change="grabMeta()"> {{value}}
                    </li>
                    </ul>					
                    </div>
                    <div data-ng-show="item.viewType == 'select' ">								
                    <select class="form-control" data-ng-change="grabMeta()" data-ng-model="formMeta[item.metakey]" data-ng-options="o as o for o in item.alloption"></select>
                    </div>

                    </div>





                    <!--  second stage  , it will show after its parent show  	-->		
                    <div data-ng-show="selected_taxonomy.indexOf(item.parent_taxonomy)!=-1">
                    <h3>{{ item.title }}</h3>	


                    <div data-ng-if="item.taxonomy">

                    <div data-ng-show="item.viewType == 'checkbox'">
                    <ul>
                    <li data-ng-repeat="(key, value) in item.alloption">
                    <input type="checkbox" data-ng-change="grabResult( this ,formData[item.taxonomy][key], item)"  name="{{value}}" data-ng-model="formData[item.taxonomy][key]"  > {{value}}
                    </li>
                    </ul>
                    </div>

                    <!--                                <div data-ng-show="item.viewType == 'select'">-->
                    <!--                                    <select class="form-control" data-ng-change="grabResult( this ,formData[item.taxonomy] , item)" data-ng-model="formData[item.taxonomy]">-->
                    <!--                                        <option value="">Please select</option>-->
                    <!--                                        <option value="{{key}}" data-ng-repeat="(key ,value) in item.alloption">{{value}}</option>-->
                    <!--                                    </select>-->
                    <!--                                </div>-->

                    </div>

                    </div>	
                    <div data-ng-repeat="item in item.items" data-ng-include="'items_renderer.html'"></div>
                </script>
                <div data-ng-repeat="item in list" data-ng-include="'items_renderer.html'" class="col-md-5 col-sm-5 col-xs-6"></div>	 

                <!--a data-ng-click="doFilter()" class="btn btn-default-red filter-btn" href="#"> <?php _e('Filter', 'atmf'); ?></a-->
                <a data-ng-click="doReset()" class="btn btn-default-red filter-btn" href="#"> <?php _e('Reset', 'atmf'); ?></a>
            </div>
        </div>
        <div class="col-md-2 col-sm-2 pull-right" >
            <select class="form-control"  data-ng-model="postsPerPage">
                <option value="3">3</option>
                <option value="6">6</option>
                <option value="12">12</option>
                <option value="15">15</option>
                <option value="20">20</option>
                <option value="30">30</option>
                <option value="40">40</option>
                <option value="50">50</option>
            </select>
        </div>

        <!--div class="col-md-8 col-sm-6 pull-right">
            <div class="row">
                <!--div class="col-md-8 col-sm-7">
                    <select class=" form-control pull-left" data-ng-init="postOrder.order = 'reverse'" data-ng-model="postOrder.type"  >
                        <option value="">Sort By</option>
                        <option data-ng-repeat="(key ,value) in sortData" value="{{value.label}}">{{value.text}}</option>
                    </select>
                </div-->

                <!--div class="col-md-4 col-sm-5">
                    <a href="#" data-ng-click="postOrder.order = false" class="btn-xs btn-default-red pull-right sort-by-arrow">
                        <span class="glyphicon glyphicon-arrow-down"></span>
                    </a>
                    <a href="#" data-ng-click="postOrder.order = 'reverse'" class="btn-xs btn-default-red pull-right sort-by-arrow">
                        <span class="glyphicon glyphicon-arrow-up"></span>
                    </a>
                </div-->
            <!--/div>
        </div-->
    </div>

    <div class="clearfix"></div>

    <div class="all-menu-details">
        <div ng-repeat="post in filtered|  startFrom:(currentPage - 1) * postsPerPage | limitTo:postsPerPage   | orderBy:postOrder.type:postOrder.order" class="item-grid" >
            <div class="col col-md-4 post-item-grid" data-ng-class="expression">
                <div class="a-grid-block">
                    <div class="list-image">
                        <img class="a-cat-tag" src="../wp-content/uploads/img/veg-tag.png">
                        <img class="thumbnail" data-ng-src="{{ post.post_thumbnail}}" alt="img">
                    </div>
                    <div class="all-details">
                        <div class="visible-option">
                            <div class="details">
                                <h6><a href="{{ post.post_permalink}}" data-ng-bind="post.post_title"></a></h6>
                                <!--ul class="share-this list-inline text-right">
                                    <li><a href="#">Share</a>
                                        <ul class="list-inline">
                                            <li>
                                                <a href="http://www.facebook.com/sharer.php?u=<?php the_permalink(); ?> "><i class="fa fa-facebook-square"></i></a>
                                            </li> 
    
                                            <li>
                                                <a href="http://twitthis.com/twit?url=<?php the_permalink(); ?>"><i class="fa fa-twitter-square"></i></a>
                                            </li>
    
                                            <li>
                                                <a href="https://plus.google.com/share?url=<?php the_permalink(); ?>"><i class="fa fa-google-plus-square"></i></a>
                                            </li>
    
                                            <li>
                                                <a href="https://pinterest.com/pin/create/button/?url=<?php the_permalink(); ?>&amp;media=<?php echo urlencode(get_the_title()); ?>"><i class="fa fa-pinterest-square"></i></a>
                                            </li>
                                        </ul>
                                    </li>
                                </ul-->
                                <p class="color-red ta-center"><?php echo get_woocommerce_currency_symbol(); ?> {{post.price}}</p>
                                <p class="a-grid-content" data-ng-bind-html="post.post_content | limitTo: contentLimit | html"></p>
                            </div>
                            <div class="price-option">
                                <a href="{{ post.post_permalink}}" class="a-view-details">View Details</a>
                                <!--h4 class="select-option-title atmf-something" data-ng-if="post.children.length">Select options</h4>
                                <h4 class="select-option-title atmf-something" data-ng-if="post.food.length">Select options</h4-->

                                <h4 ng-if="!post.children && post.food_price"><?php echo get_woocommerce_currency_symbol(); ?> {{post.price}}</h4>
                                <!-- <button data-ng-if="post.children" class="toggle">Option</button> -->
                                <button data-ng-if="post.children.length || post.food.length" class="toggle">Option</button>
                                <button data-ng-if="!post.children.length && !post.food.length" data-ng-click="addToCartSimple(post.post_id)" class="faButton a-add-cart"  data-toggle="tooltip" data-placement="top" title="Add to cart">
                                    <i class="fa fa-shopping-cart"></i>
                                </button>
                                <!--button ng-if="!post.children" class="toggle-none"><i class="fa fa-shopping-cart"></i></button--> 
                            </div>
                        </div>
                        <div class="dropdown-option clearfix">
                            <div class="dropdown-details">
                                <form class="default-form" data-ng-if="post.children">
                                    <h5> Select Your Option</h5>
                                    <div>
                                        <div data-ng-repeat="child in post.children">                                                                                        
                                            <!-- <span class="checkbox-input" data-ng-class="child.checkmodel[$index]"> -->
                                            <input type="checkbox" name="p_id" data-ng-click="post.final_price = chnagePrice($event, child.post_id, child.price, this, post.final_price);
                                                        post.selected_child = selectedChild($event, child.price, child.post_id, post.selected_child, $this)" id="{{child.post_id}}" value="{{child.price}}">
                                            <label for="{{child.post_id}}">{{child.post_title}} 
                                            </label>
                                            <span><i class="fa fa-plus"> {{child.price}}</i></span>
                                            <!-- </span> -->
                                        </div>
                                    </div>  
                                    <br>
                                    <button  data-ng-click="addToCart(post.id, post.price, post.selected_child)" type="button" class="btn btn-default-red">Add to Cart</button>
                                </form>
                                <div ng-if="post.food.length" ng-init="post.formOption = [];
                                            post.new_price = []" >
                                    <span ng-init="post.new_price[0] = 0.0"></span>
                                    <span ng-if="post.food_price">
                                        <span ng-init="post.new_price[0] = post.food_price"></span>
                                    </span>
                                    <span class="total_price">total price {{ post.new_price | flatt }}</span>
                                    <div ng-repeat="option in post.food">
                                        <div ng-if="option.type == 'checkbox'">
                                            <input type="checkbox" name="{{option.id}}" ng-model="option.checkbox" ng-change="addOption(option, option.id, post.formOption, post.new_price)"> {{ option.title}}  {{ option.price}} 
    <!-- <input type="number"  ng-if="option.quantity == 'yes'" ng-model="option.number">  -->
                                        </div>
                                    </div>
                                    <input type="hidden" name="product_id" class="food_product_id" value="{{ post.post_id}}">
                                    <div ng-repeat="option in post.food">
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
                                    global $woocommerce;
                                    $cart_page_id = wc_get_page_id('cart');
                                    $cart_link = get_permalink($cart_page_id);
                                    // echo $cart_link;
                                    ?>
                                    <br>
                                    <p class="buttons">
                                        <button type="button" class="button" ng-click="doAddtoCartGrid(post.formOption, post.new_price, post.post_id)">Add to cart</button>
                                        <a href="<?php echo $cart_link; ?>" class="button">View Cart</a>
                                    </p>
                                </div>
                            </div> <!-- dropdown-details -->
                        </div> <!-- dropdown-option clearfix -->
                    </div>
                </div>
            </div>
            <!--div data-ng-if="postView == 'grid'" class="col col-md-4 post-item-grid" >
                <img class="thumbnail" data-ng-src="{{ post.post_thumbnail}}" alt="img">
                <a href="{{ post.post_permalink}}">
                    <h3 data-ng-bind="post.post_title"></h3>
                </a>
            </div-->
        </div>
    </div>

    <div class="loading" data-ng-show="loading"><i></i><i></i><i></i></div>
    <alert style="margin-top:200px;" type="danger" data-ng-show="( posts | filter:QuickSearch).length == 0">
        Sorry No Result Found
    </alert>
    <div class="clearfix"></div>
    <pagination data-boundary-links="true" data-num-pages="noOfPages" data-current-page="currentPage" max-size="maxSize" class="pagination-small" data-previous-text="&laquo;" data-next-text="&raquo;"></pagination>
    <div class="clearfix"></div>
</div>
