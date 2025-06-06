 $(function() {
             $.ui.dialog.prototype._focusTabbable = function() {};
             
            $("#dialog").dialog({
                autoOpen: true,
                autoFocus: false,
                show: {
                    effect: "blind",
                    duration: 1000
                },
                hide: {
                    effect: "explode",
                    duration: 1000
                },

            

            });
        });