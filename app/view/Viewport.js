Ext.define('PHPExtJS.view.Viewport', {
    extend: 'Ext.container.Viewport',
    requires:[
        'Ext.layout.container.Fit',
        'PHPExtJS.view.Main'
    ],

    layout: {
        type: 'fit'
    },
    items: [{
        xtype: 'app-main'
    }]
});
