Ext.define('PHPExtJS.view.Main', {
    extend: 'Ext.container.Container',
    requires: [
        'Ext.tab.Panel',
        'Ext.layout.container.Border',
        'Ext.util.History',
        'PHPExtJS.view.User._grid',
        'PHPExtJS.view.Login'
    ],
    xtype: 'app-main',
    layout: {
        type: 'border',
        default: 'anchor'
    },
    items: [
        {
            region: 'north',
            xtype: 'panel',
            bodyPadding: 10,
            html: '<font style="font-size:24px;">' + App.name + '</font>'
        },
        {
            region: 'center',
            xtype: 'tabpanel',
            border: false,
            items: [
                {
                    title: 'Welcome',
                    xtype: "component",
                    autoEl: {
                        tag: "iframe",
                        src: "site/welcome"
                    }
                },
                {
                    title: 'About',
                    xtype: "component",
                    autoEl: {
                        tag: "iframe",
                        src: "site/about"
                    }
                },
                {
                    xtype: 'userGrid',
                }, {
                    xtype: 'Login',
                    hidden: User.id == '' ? false : true
                }, {
                    xtype: "component",
                    title: 'Logout ( ' + User.name + ' ) ',
                    id: 'logoutTab',
                    hidden: User.id == '' ? true : false,
                    listeners: {
                        afterRender: function() {
                            Ext.Ajax.request({
                                url: window.location.pathname + 'site/logout',
                                success: function(response, opts) {
                                    var data = Ext.JSON.decode(response.responseText);
                                    if (data.success === true) {
                                        window.location = '';
                                    }
                                },
                                failure: function(response, opts) {
                                    Ext.MessageBox.alert('Status', 'Server-side failure with status code ' + response.status);
                                },
                            });
                        }
                    }
                }],
        }, {
            region: 'south',
            xtype: 'panel',
            height: 100,
            html: '<center>Copyright &copy; 2014 PHPExtJS</br>All Rights Reserved.</br>Powered by Yii Framework & ExtJS</center>'
        }]
});