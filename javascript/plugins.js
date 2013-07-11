// usage: log('inside coolFunc', this, arguments);
// paulirish.com/2009/log-a-lightweight-wrapper-for-consolelog/
window.log = function f(){ log.history = log.history || []; log.history.push(arguments); if(this.console) { var args = arguments, newarr; args.callee = args.callee.caller; newarr = [].slice.call(args); if (typeof console.log === 'object') log.apply.call(console.log, console, newarr); else console.log.apply(console, newarr);}};

// make it safe to use console.log always
(function(a){function b(){}for(var c="assert,count,debug,dir,dirxml,error,exception,group,groupCollapsed,groupEnd,info,log,markTimeline,profile,profileEnd,time,timeEnd,trace,warn".split(","),d;!!(d=c.pop());){a[d]=a[d]||b;}})
(function(){try{console.log();return window.console;}catch(a){return (window.console={});}}());


// place any jQuery/helper plugins in here, instead of separate, slower script files.

(function($) {
    $.fn.jumpTo = function(settings) {

		var win = $(window);

        var defaults = {
            destination : null,
			finalWidth: 0,
			finalHeight: 0,
			type: 'straight',
			speed: 2,
			fade: true,
			callback: null
        };

		var opts = {
			settings: $.extend({}, defaults, settings)
		};

		var moveNode = function(el) {
			el = $(el);
			var settings = $.extend({},opts.settings);
			
			var pos = el.offset();
			var clone = el.clone().css({
				position: 'fixed',
				top: pos.top,
				left: pos.left,
				zIndex: 100
			}).appendTo('body');
			
			var destPos = $(settings.destination).offset();
			var destCoords = {
				left: destPos.left - pos.left,
				top: pos.top - destPos.top
			}
			
			var thirdCoord = {
				left: destCoords.left * 2,
				top: 0
			}

			var timeoutSpeed = settings.speed / destCoords.left;
			var A = -(destCoords.top/(destCoords.left*(thirdCoord.left-destCoords.left)));
			var B = (destCoords.top - A*(destCoords.left*destCoords.left))/destCoords.left;
			
			var x = 1;
			var comp = 0;
			var move = setInterval(function() {
				clone.offset({
					top: pos.top - (A*x*x + B*x),
					left: pos.left + x
				});
				if (destCoords.left < 0) {
					if (clone.offset().left <= destPos.left) {
						clearInterval(move);
						clone.fadeOut(300, function() { $(this).remove() });
						if(settings.callback != null) settings.callback();
					}
				} else {
					if(clone.offset().left >= destPos.left) {
						clearInterval(move);
						clone.fadeOut(300, function() { $(this).remove() });
						if(settings.callback != null) settings.callback();
					}
				}
				if(Math.abs(destCoords.left - pos.left) < 10) {
					growth = 2;
				} else {
					growth = 5;	
				}
				if (destCoords.left < 0) {
					x-=growth;
				} else {
					x+=growth;
				}
				
				ratio = clone.offset().left / destPos.left;
				var width = el.width();
				clone.css({
					width: (1-ratio+0.2)*width
				});
			}, timeoutSpeed);				
		};

		if (moveNode(this)) {
			return true;	
		} else {
			return false;	
		}
	};
})(jQuery);