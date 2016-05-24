var searchTimeouthome = '0';
var q = "";
var aceeditor = false
//var suBatch = '<su:badge class="suBadge" layout="2"></su:badge>';

$(function(){

    
    $("._blank").attr("target","_blank");
    $(".commentForm").hide();

    $("#expand").click(function(){
        $("#hideInfo").show();
        $("#moreInfo").slideDown();
        $(this).hide();
    });
    $("#hideInfo").click(function(){
        $("#expand").show();
        $("#moreInfo").slideUp();
        $(this).hide();
    });
    
    // check if we are in sandbox
    if($("#aceeditor").length > 0) {
        aceeditor = ace.edit("aceeditor");
        aceeditor.setTheme("ace/theme/chrome");
        aceeditor.getSession().setMode("ace/mode/php");
        var textarea = $('textarea[name="code"]').hide();
        aceeditor.getSession().setValue(textarea.val());
        aceeditor.getSession().on('change', function () {
            $('textarea[name="code"]').val(aceeditor.getSession().getValue());
            $('textarea[name="code"]').trigger("change")
        });
        $(window).delegate('*', 'keypress', function (evt){
            $('textarea[name="code"]').val(aceeditor.getSession().getValue());
            $('textarea[name="code"]').trigger("change")
        });

        $('textarea[name="code"]').garlic({
            onRetrieve: function (elem, retrievedValue) {
                aceeditor.getSession().setValue(retrievedValue)

            }
        });




    }

    $("#menu li").click(function(){
        window.location = $(this).find("a").attr("href");
        return false;
    });
    
    $("#twitterTweet").attr("allowtransparency","true");
    
    $("#saveCode").click(function(){
        if(aceeditor){
            $("textarea[name=code]").val(aceeditor.getValue());
        }

        data = $('#onlineFunction').serialize();
        $("#ajaxResult").html("<div class='result'><img src='/media/images/icons/loading.gif' alt='Loading...'/></div>");
        $("#ajaxResult").slideDown();
        $.post("/?getCode=1", data, function(d){
            $("#ajaxResult").html(d);
         
    }); 
    return false});
     $("#getCodeCaptcha").live("click",function(){
        data = $('#onlineFunction').serialize();
        captcha = $("#captcha").val();
        name = $("#userName").val();
        $("#ajaxResult").html("<div class='result'><img src='/media/images/icons/loading.gif' alt='Loading...'/></div>");
        $("#ajaxResult").slideDown();
        $.post("/?getCode=1", data+"&captcha="+captcha+'&userName='+name, function(d){
            $("#ajaxResult").html(d);
         $('a.twitter-share-button').each(function()
	{
		var tweet_button = new twttr.TweetButton( $( this ).get( 0 ) );
		tweet_button.render();
	});
    });
return false;
});
    
    
    $("#expandComments").click(function(){
        $(".commentForm").slideToggle();
    });

    $('#onlineFunction').live("submit",function() {
       // $("#lined").value(aceeditor.getValue())
        if(aceeditor){
            $("textarea[name=code]").val(aceeditor.getValue());
        }

        $("input[name=ajaxResult]").val('1');
        data = $(this).serialize();
        
        $("#ajaxResult").html("<div class='result'><img src='/media/images/icons/loading.gif' alt='Loading...'/></div>");
        $("#ajaxResult").slideDown();
        $.post("/", data, function(d){
            $("#ajaxResult").html(d);
         return false;
        });
        
        return false;
       });

    $("#searchRight").attr("autocomplete","off");
    $("#searchRight").keyup( function(){
        if( searchTimeouthome != '0'){
            clearTimeout( searchTimeouthome );
        }
        searchTimeouthome = setTimeout("homeSearch()", 100);
    });
    
    
    if( $("#content").height() < $("#menu").height()){
        $("#content").css("min-height", $("#menu").height() + 30);
    }
  
  

   
});

var delay = (function(){
    var timer = 0;
    return function(callback, ms){
        clearTimeout (timer);
        timer = setTimeout(callback, ms);
    };
})();



var keyNav = '0';
function homeSearch()
{
    q = $("#searchRight").val();    
    if( q.length > 0)
    {
        $.post("http://onlinephpfunctions.com/search/ajax/?q="+q, function( data ){
            $("#searchResults").html( data );
            $("#searchResults").show();
            if( keyNav != '0')
            {
                $.keynav.reset();
                $.keynav.currentEl = 0;
            } 
            keyNav = $('#searchResults a').keynav('keynav_focusbox','keynav_box');
                    
                   
        });
    }
    else
    {
        $("#searchResults").html( "" );
        $("#searchResults").hide();
    }
}


//$(function(){

//GOOGLE PLUS:
$(function(){
        $(".g-plusone").attr("data-size","medium");
        
  (function() {
    var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
    po.src = 'https://apis.google.com/js/plusone.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
  })();
});

//Twitter Tweet
//!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");

//Digg
/*(function() {
var s = document.createElement('script'), s1 = document.getElementsByTagName('script')[0];
s.type = 'text/javascript';
s.async = true;
s.src = 'http://widgets.digg.com/buttons.js';
s1.parentNode.insertBefore(s, s1);
})();
*/
/*
//Stumble
(function() { 
     var li = document.createElement('script'); li.type = 'text/javascript'; li.async = true; 
     li.src = window.location.protocol + '//platform.stumbleupon.com/1/widgets.js'; 
     var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(li, s); 
 })(); 
*/ 
 //});
