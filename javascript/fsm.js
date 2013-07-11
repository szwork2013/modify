(function(a){Interspire_FSM=function(){var e=this;var d=a(e);var f=false;var c;var b;e.payload={};e.states={};e.state=function(g){if(typeof g=="undefined"){return b}if(typeof e.states[g]=="undefined"){e.states[g]=new Interspire_FSM.State(e,g)}return e.states[g]};e.initial=function(g){if(typeof g=="undefined"){return c}if(typeof g=="object"){c=g}else{c=e.state(g)}return this};e.start=function(h){if(f){return}f=true;if(typeof h!="undefined"){e.payload=h}else{e.payload={}}b=c;var g=jQuery.Event("machine_start");d.trigger(g,e);if(g.isDefaultPrevented()){e.finish();return}b.enter()};e.finish=function(){if(!f){return}f=false;d.trigger("machine_finish",e)};e.can=function(g){if(!f){false}for(transition in b.transitions){if(g==transition){transition=b.transitions[g];if(transition.test()!==false){return true}return false}}return false};e.transition=function(h){if(!f){return}var g;for(g in b.transitions){if(h==g){g=b.transitions[h];if(g.test()!==false){if(g.execute()!==false){b.exit();b=g.to();b.enter()}}break}}};e.refresh=function(){b.refresh()};e.running=function(){return f}};Interspire_FSM.State=function(f,d){var c=this;var b=a(c);var e;c.name=d;c.machine=f;c.transitions={};c.transition=function(h,g){return c.transitions[h]=new Interspire_FSM.Transition(c,h,g)};c.enter=function(g){if(typeof g=="function"){b.bind("state_enter",g);return this}c.reset();c.refresh();a(c.machine).trigger("state_enter",c);b.trigger("state_enter",c)};c.exit=function(g){if(typeof g=="function"){b.bind("state_exit",g);return this}a(c.machine).trigger("state_exit",c);b.trigger("state_exit",c)};c.initial=function(){c.machine.initial(c);return this};c.reset=function(){e={}};c.refresh=function(){var g={};var i;var h=false;for(i in c.transitions){g[i]=c.transitions[i].test();if(g[i]!=e[i]){h=true}}if(h){a(c.machine).trigger("transitions_change",c.machine)}}};Interspire_FSM.Transition=function(h,g,f){var c=this;var b=a(c);c.id=g;c.from=h;var d;c.to=function(){return d};if(typeof f=="function"){c.to=f}else{if(f instanceof Interspire_FSM.State){d=f}else{d=c.from.machine.state(f)}}var e;c.test=function(i){if(typeof i=="function"){e=i;return this}else{if(typeof e=="function"){return e()}else{return true}}};c.poll=function(i,j){a(i).live(j,c.from.refresh);return this};c.execute=function(j){if(typeof j=="function"){b.bind("transition_execute",j);return this}var i=jQuery.Event("transition_execute");b.trigger(i,c);if(i.isDefaultPrevented()){return false}return true}}})(jQuery);