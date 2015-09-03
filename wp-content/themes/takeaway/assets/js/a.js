
jQuery( function( $ ) {


    var a = $('#map_lat').val();
    var b = $('#map_long').val();


  $('#map_canvas_go').width("100%").height("400px").goMap({
    
         markers: [{  
                latitude: a, 
                longitude: b, 
                title: 'marker title 1' 
            }] ,  
                
        navigationControl: false, 
        mapTypeControl: false, 
        scrollwheel: false, 
        disableDoubleClickZoom: true ,
        maptype: 'ROADMAP' ,
        zoom: 12 

    }) ;

  
});