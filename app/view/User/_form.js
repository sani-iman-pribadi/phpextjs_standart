Ext.define('PHPExtJS.view.User._form', {
    //extend: 'Ext.form.Panel', //use this code for panel form
    extend: 'Ext.window.Window',
    alias: 'widget.userForm',
    requires: ['Ext.form.Panel',
        'Ext.form.field.Text',
        'Ext.ux.DataTip',
        'Ext.data.*'
    ],
    title: 'PHPExtJS - Form User',
    layout: 'fit',
    autoShow: true,
    width: 600,
    height: 400,
    iconCls: 'bogus',
    initComponent: function() {

        this.items = [
            {
                xtype: 'form',
                bodyPadding: '10 10 0 10',
                border: false,
                style: 'background-color: #fff;',
                autoScroll: true,
                fieldDefaults: {
                    anchor: '100%',
                    labelAlign: 'left',
                    allowBlank: false,
                    combineErrors: true,
                    msgTarget: 'side',
                    labelWidth: 200,
                },
                items: [
                    {
                        xtype: 'fieldset',
                        title: '<b>USER</b>',
                        collapsible: false,
                        layout: 'anchor',
                        items: [
                             
                            {
                                xtype: 'textfield',
                                fieldLabel: 'ID',
                                name: 'id',
                                 
                                hidden:true,
                                                                
                            },
                             
                            {
                                xtype: 'textfield',
                                fieldLabel: 'USERNAME',
                                name: 'username',
                                                                
                            },
                             /*
                            {
                                xtype: 'textfield',
                                fieldLabel: 'PASSWORD',
                                name: 'password',
                                hidden: true
                                                                
                            },
                            */
                             
                            {
                                xtype: 'textfield',
                                fieldLabel: 'NAME',
                                name: 'name',
                                                                
                            },
                                                     
                        ],
                    }],
            }];

        this.dockedItems = [{
                xtype: 'toolbar',
                dock: 'bottom',
                id: 'buttons',
                ui: 'footer',
                items: ['->', {
                        iconCls: 'icon-save',
                        text: 'Save',
                        action: 'save'
                    }, {
                        iconCls: 'icon-reset',
                        text: 'Cancel',
                        action: 'cancel'
                    },]
            }];

        this.callParent(arguments);


    }
});


