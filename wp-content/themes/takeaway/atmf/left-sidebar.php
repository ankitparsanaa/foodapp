<div class="search-keyword">
    <input type="text" placeholder="Search by keyword" class="form-control" data-ng-model="QuickSearch">
    <button type="submit" value=""><i class="fa fa-search"></i></button>
</div>
<!--div class="side-panel">

    <!--div class="category">
        <script type="text/ng-template" id="items_renderer.html">
    <!-- for taxonomy  -->
    <!--div data-ng-if="item.option =='taxonomy' && !item.parent_taxonomy">
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

    <!--div data-ng-if="item.option == 'metadata' ">
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
    <!--div data-ng-show="selected_taxonomy.indexOf(item.parent_taxonomy)!=-1">
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

    <!--/div>

    </div>	
    <div data-ng-repeat="item in item.items" data-ng-include="'items_renderer.html'"></div>
</script>
<div data-ng-repeat="item in list" data-ng-include="'items_renderer.html'" class="col-md-4 col-sm-4 col-xs-6"></div>	 

<a data-ng-click="doFilter()" class="btn btn-default-red filter-btn" href="#"> <?php _e('Filter', 'atmf'); ?></a>
<a data-ng-click="doReset()" class="btn btn-default-red filter-btn" href="#"> <?php _e('Reset', 'atmf'); ?></a>
</div>
</div-->