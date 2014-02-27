<?php
/**
 *
 * @author Sani Iman Pribadi
 *
 */
?>
Ext.define('PHPExtJS.view.<?php echo $this->modelClass; ?>._form', {
    //extend: 'Ext.form.Panel', //use this code for panel form
    extend: 'Ext.window.Window',
    alias: 'widget.<?php echo strtolower($this->modelClass); ?>Form',
    requires: ['Ext.form.Panel',
        'Ext.form.field.Text',
        'Ext.ux.DataTip',
        'Ext.data.*'
    ],
    title: 'PHPExtJS - Form <?php echo $this->modelClass; ?>',
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
                        title: '<b><?php echo strtoupper($this->modelClass); ?></b>',
                        collapsible: false,
                        layout: 'anchor',
                        items: [
                            <?php foreach($this->tableSchema->columns as $column){ echo " \n"; ?>
                            {
                                xtype: 'textfield',
                                fieldLabel: '<?php echo strtoupper($column->name); ?>',
                                name: '<?php echo $column->name;  ?>',
                                <?php if($column->isPrimaryKey){ echo " \n"; ?>
                                hidden:true,
                                <?php } ?>                                
                            },
                            <?php } ?>
                         
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


