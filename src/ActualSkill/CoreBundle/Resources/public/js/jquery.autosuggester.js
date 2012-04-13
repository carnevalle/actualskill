// jQuery Plugin Boilerplate
// A boilerplate for jumpstarting jQuery plugins development
// version 1.1, May 14th, 2011
// by Stefan Gabos

(function($) {

    $.AutoSuggester = function(element, data, options) {

        var defaults = {
            placeholderText: "Søg efter en klub",
            focusOnLoad: true,
            visibleObjProperty: "name",
            selectedObjProperty: "name",
            searchObjProperties: ["name"],
            matchCase: false,
            highlightResults: true,
            keyDelay: 100,
            responseLimit: 50,
            minCharacters: 2,
            formatResult: function(data){return data[plugin.settings.visibleObjProperty]},
            onBeginSearch: function(){},
            onDataSelected: function(data){}
        }

        var plugin = this;

        plugin.settings = {}

        var results_container, 
        results_ul, 
        timeout, 
        lastKeyPressCode, 
        hasSelected = false, 
        hasClicked = false, 
        query = "", 
        inputOffset = null;

        plugin.init = function() {
            plugin.settings = $.extend({}, defaults, options);
            plugin.data = data;
            plugin.input = element;

            plugin.input.attr("placeholder", plugin.settings.placeholderText);
            plugin.input.wrap("<div class='as_container'></div>");    

            plugin.input = plugin.input;
            plugin.container = plugin.input.parent();

            if(plugin.settings.focusOnLoad){
                plugin.input.focus();
            }

            results_container = $(window.document.createElement('div')).addClass("as_results").html("TEST");
            plugin.input.after(results_container);

            resizeAndReposition();

            results_ul = $(window.document.createElement('ul')).addClass("as_list");
            results_container.html(results_ul).hide();

            $(window).resize(function() {
                resizeAndReposition();
            });     
            
            timeout = null;
            lastKeyPressCode = null;
            // Handle input field events
            plugin.input.focus(function(){
                if(!hasSelected && plugin.input.val() != ""){
                    plugin.showResults();
                }
            }).blur(function(){
                if(!hasClicked){
                    results_container.hide();
                }
            }).keydown(function(e){
                lastKeyPressCode = e.keyCode;

                switch(e.keyCode) {
                    case 38: // up
                        e.preventDefault();
                        moveSelection("up");
                        break;
                    case 40: // down
                        e.preventDefault();
                        moveSelection("down");
                        break;
                    case 8:  // delete
                        if (timeout){ clearTimeout(timeout); }
                        setTimeout(onKeyChange, plugin.settings.keyDelay);

                        break;
                    case 13: // return
                        if (timeout){ clearTimeout(timeout); }
                        var active = $("li.active:first", results_container);
                        
                        if(active.length > 0){
                            active.click();
                            results_container.hide();
                        }
                        e.preventDefault();
                        break;
                    default:
                        if (timeout){ clearTimeout(timeout); }
                        timeout = setTimeout(function(){
                            onKeyChange.call(plugin);
                        }, plugin.settings.keyDelay);
                        break;
                }            
            }) 

        }

        plugin.showResults = function(){
            results_container.show();

            var newOffset = plugin.input.offset();
            if(newOffset.left != inputOffset.left || newOffset.top != inputOffset.top){
                resizeAndReposition();
            }
        }

        plugin.hideResults = function(){
            results_container.hide();
        }

        var resizeAndReposition = function(){
            results_container.width(plugin.input.outerWidth());
            inputOffset = plugin.input.offset();
            results_container.offset({ top: inputOffset.top+plugin.input.outerHeight(), left: inputOffset.left });
        }

        var onKeyChange = function() {

            hasSelected = false;
            hasClicked = false;

            //console.log(lastKeyPressCode);

            // 37 = left
            // 39 = right
            // 91/224 = apple command
            // 9 = tab
            // 16 = shift
            // 20 = capslock
            if( lastKeyPressCode == 39 || 
                lastKeyPressCode == 37 || 
                lastKeyPressCode == 91 || 
                lastKeyPressCode == 224 || 
                lastKeyPressCode == 46 || 
                lastKeyPressCode == 9 || 
                (lastKeyPressCode > 8 && lastKeyPressCode < 32) ){ return; }

            plugin.settings.onBeginSearch.call(plugin);

            results_container.hide();
            results_ul.html("");    

            query = plugin.input.val();
            
            if(query.length < plugin.settings.minCharacters){
                return;
            }

            if(!plugin.settings.matchCase){
                query = query.toLowerCase();
            }

            var item, value, counter = 0, results = [];
            for(var index in plugin.data){
                item = plugin.data[index];

                if(counter >= plugin.settings.responseLimit){
                    break;
                }

                for(var property in plugin.settings.searchObjProperties){

                    if(counter >= plugin.settings.responseLimit){
                        break;
                    }

                    property = plugin.settings.searchObjProperties[property];
                    value = item[property];

                    if(!plugin.settings.matchCase){
                        value = value.toLowerCase();
                    }

                    if(value.indexOf(query) != -1){
                        results.push(item);
                        counter++;
                        break;
                    }
                }                    
            }

            //console.log(results.length);
            if(results.length > 0){
                addItemsToList.call(this, results);
            }
        }

        var addItemsToList = function(items){
            for(var index in items){
                var item = items[index];
                var li = $(window.document.createElement("li"))
                .html(plugin.settings.formatResult.call(this, item))
                .data("item",item)
                .mousedown(function(){
                    hasClicked = true;
                })
                .mouseover(function(){
                    $("li", results_container).removeClass("active");
                    $(this).addClass("active");
                })
                .click(function(){
                    plugin.input.val($(this).data("item")[plugin.settings.visibleObjProperty]);
                    results_container.hide();
                    plugin.settings.onDataSelected.call(plugin, $(this).data("item"));
                    hasSelected = true;
                });

                if (!plugin.settings.matchCase){ 
                    var regx = new RegExp("(?![^&;]+;)(?!<[^<>]*)(" + query + ")(?![^<>]*>)(?![^&;]+;)", "gi");
                } else {
                    var regx = new RegExp("(?![^&;]+;)(?!<[^<>]*)(" + query + ")(?![^<>]*>)(?![^&;]+;)", "g");
                }
                
                if(plugin.settings.highlightResults){
                    li.html(li.html().replace(regx,"<em>$1</em>"));
                }

                results_ul.append(li);
            }

            plugin.showResults();
        }   

        var moveSelection = function(direction){

            var list = $("li", results_container);
            if(direction == "down"){
                var start = list.eq(0);
            } else {
                var start = list.filter(":last");
            }                   
            var active = $("li.active:first", results_container);
            if(active.length > 0){
                if(direction == "down"){
                start = active.next();
                } else {
                    start = active.prev();
                }   
            }
            list.removeClass("active");
            start.addClass("active");
        }             

        plugin.init();

    }

    $.fn.AutoSuggester = function(data, options) {

        return this.each(function() {
            if (undefined == $(this).data('pluginName')) {
                var plugin = new $.AutoSuggester(this, data, options);
                $(this).data('pluginName', plugin);
            }
        });

    }

})(jQuery);