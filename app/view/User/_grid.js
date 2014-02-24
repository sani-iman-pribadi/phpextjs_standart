Ext.define('PHPExtJS.view.User._grid', {
    extend: 'Ext.grid.Panel',
    alias: 'widget.userGrid',
    requires: [
        'Ext.toolbar.Paging',
        'Ext.grid.RowNumberer',
        'Ext.grid.*',
        'Ext.data.*',
    ],
    iconCls: 'icon-grid',
    title: 'PHPExtJS - Sample',
    store: 'User',
    loadMask: true,
    
    initComponent: function() {
        var me = this;

        Ext.applyIf(me, {
            columns: [
                {
                    xtype: 'rownumberer',
                    width: 50,
                    sortable: false,
                    flex: false,
                },
                 
                {
                    dataIndex: 'id',
                    text: 'ID',
                    flex:true,
                     
                    hidden:true,
                     
                    
                },
                 
                {
                    dataIndex: 'username',
                    text: 'USERNAME',
                    width:100,
                     
                    
                },
                 
                {
                    dataIndex: 'name',
                    text: 'NAME',
                    flex:true,
                     
                    
                },
                                
            ],
            viewConfig: {
                emptyText: '<h3><b>No data found</b></h3>'
            },
            listeners: {
                viewready: function() {
                    this.store.load();
                },
            },
            dockedItems: [
                {
                    xtype: 'toolbar',
                    dock: 'top',
                    items: [
                        'Search', {
                            xtype: 'textfield',
                            name: 'searchfield'
                        },
                        {
                            xtype: 'button',
                            action: 'search',
                            iconCls: 'icon-save',
                            text: 'Search'
                        },
                        {
                            xtype: 'button',
                            action: 'delete',
                            iconCls: 'icon-add',
                            text: 'Delete'
                        },
                        {
                            xtype: 'button',
                            action: 'create',
                            iconCls: 'icon-add',
                            text: 'Create'
                        }
                    ]
                },
                {
                    xtype: 'pagingtoolbar',
                    dock: 'bottom',
                    displayInfo: true,
                    emptyMsg: 'No data to display',
                    store: this.store,
                }
            ]

        });

        me.callParent(arguments);
    }
});


