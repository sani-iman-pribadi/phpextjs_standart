<?php
/**
 *
 * @author Sani Iman Pribadi
 *
 */
?>
Ext.define('PHPExtJS.view.<?php echo $this->modelClass; ?>._grid', {
    extend: 'Ext.grid.Panel',
    alias: 'widget.<?php echo strtolower($this->modelClass) . 'Grid' ?>',
    requires: [
        'Ext.toolbar.Paging',
        'Ext.grid.RowNumberer',
        'Ext.grid.*',
        'Ext.data.*',
    ],
    iconCls: 'icon-grid',
    title: 'PHPExtJS - <?php echo strtoupper($this->modelClass); ?>',
    store: '<?php echo $this->modelClass; ?>',
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
                <?php foreach($this->tableSchema->columns as $column){ echo " \n"; ?>
                {
                    dataIndex: '<?php echo $column->name; ?>',
                    text: '<?php echo strtoupper($column->name); ?>',
                    flex:true,
                    <?php if($column->isPrimaryKey){ echo " \n"; ?>
                    hidden:true,
                    <?php } ?> 
                    
                },
                <?php } ?>
                
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


