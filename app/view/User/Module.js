Ext.define('PHPExtJS.view.User.Module', {
    extend: 'Ext.ux.desktop.Module',
	
    requires: [
        //'Ext.form.field.HtmlEditor'
        'PHPExtJS.view.User._form',
        'PHPExtJS.view.User._grid',    
    ],
    
    init : function(){
        this.launcher = {
            text: 'User',
            iconCls:'bogus'
        }
    },
    
    createWindow : function(src){
        var desktop = this.app.getDesktop();
        var win = desktop.getWindow('user');
        if(!win){
            win = desktop.createWindow({
                id: 'user',
                title:'User',
                width:600,
                height:400,
                iconCls: 'bogus',
                animCollapse:false,
                border: false,
                /*
                layout: 'fit',
                items: [
                    {
                        xtype: 'htmleditor',
                        //xtype: 'textarea',
                        id: 'notepad-editor',
                        value: [
                            'Some <b>rich</b> <span style="color: rgb(255, 0, 0)">text</span> goes <u>here</u><br>',
                            'Give it a try!'
                        ].join('')
                    }
                ] 
                */
                
                hideMode: 'offsets',
                layout: {
                        type: 'fit',
                        align: 'stretch'  // Child items are stretched to full width
                },
                items:[{
                        id: 'onUserGrid',
                        xtype: 'userGrid'
                }]
                
            });
        }
        win.show();
        return win;
    },
            
});

