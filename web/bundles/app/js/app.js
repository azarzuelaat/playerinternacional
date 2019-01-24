$(function() {
    $("#parrilla").tabs({
        active: $.cookie('activetab'),
        activate: function(event, ui) {
            $.cookie('activetab', ui.newTab.index(), {
                expires: 10
            });
        }
    });

    $(".tabs").tabs();

    $.fn.player = function(id) {
        if ($(this).length < 1) {
            return;
        }

        MSV.embedData['player'] = {
            'flashvars': {"host": config, "ov_tk": "http://token.mediaset.es/", "popup": true},
            'params': {"quality": "high", "bgcolor": "#06A9DF", "play": "true", "loop": "true", "wmode": "transparent", "scale": "noscale", "menu": "true", "devicefont": "false", "salign": "", "allowfullscreen": "true", "allowscriptaccess": "always"},
            'containerId': 'player',
            'width': '100%',
            'height': '100%',
            'playerUrl': player,
            'idleTimeout': 0,
            'mediaUrl': 'www.mediaset.es',
            'drm': false,
        };
    };

    $("#player").player('player');



    diaryCheck = function(item) {
        var checked = item.is(':checked');
       
       var a = $('#promo_seasons').parent('li').each(function(){
           if(checked){
               $(this).hide();
           }
           else{
               $(this).show();
           }
        
       })
    };        


    
    handle = function (ev){
        diaryCheck($(ev.target));
    }
    
    diaryCheck($("#promo_diary"));
    $("#promo_diary").change(handle);

});