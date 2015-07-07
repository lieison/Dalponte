(function() {
    tinymce.PluginManager.add('cshero_highlight_btn', function( editor, url ) {
        editor.addButton( 'cshero_highlight_btn', {
            text: 'Highlight',
            icon: false,
            type: 'menubutton',
            menu: [
                {
                    text: 'Style 1',
                    value: 'cs-highlight-style-1',
                    onclick: function() {
                        editor.insertContent('<span class="'+this.value()+'">'+tinyMCE.activeEditor.selection.getContent()+'<span>');
                    }
                },
                {
                    text: 'Style 2',
                    value: 'cs-highlight-style-2',
                    onclick: function() {
                        editor.insertContent('<span class="'+this.value()+'">'+tinyMCE.activeEditor.selection.getContent()+'<span>');
                    }
                }
           ]
        });
    });
    tinymce.PluginManager.add('cshero_quote_btn', function( editor, url ) {
        editor.addButton( 'cshero_quote_btn', {
            text: 'Quote',
            icon: false,
            type: 'menubutton',
            menu: [
                {
                    text: 'Style 1',
                    value: 'cs-quote-style-1',
                    onclick: function() {
                        editor.insertContent('<div class="row cshero-row-quote"><span class="col-xs-12 col-sm-12 col-md-10 col-lg-8 col-md-offset-1 col-lg-offset-2 '+this.value()+'">'+tinyMCE.activeEditor.selection.getContent()+'<span></div>');
                    }
                },
                {
                    text: 'Style 2',
                    value: 'cs-quote-style-2',
                    onclick: function() {
                        editor.insertContent('<div class="row cshero-row-quote"><span class="col-xs-12 col-sm-12 col-md-10 col-lg-8 col-md-offset-1 col-lg-offset-2 '+this.value()+'">'+tinyMCE.activeEditor.selection.getContent()+'<span></div>');
                    }
                }
           ]
        });
    });
})();