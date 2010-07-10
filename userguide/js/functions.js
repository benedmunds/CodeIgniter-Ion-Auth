$(document).ready(function () {
    var $nav = $('#nav');
    var height = $nav.height();
    $nav.hide().css({ height : 0 });

    $("#toggle_toc").click(function () {
    	if ($nav.is(':visible'))
    	{
    		$nav.animate({
    			height: 0
    		}, {
    			duration: 500,
    			complete: function () {
    				$nav.hide();
    			}
    		});
    	}
    	else
    	{
    		$nav.show().animate({ height : height }, { duration: 500 });
    	}
    	return false;
    });
});
