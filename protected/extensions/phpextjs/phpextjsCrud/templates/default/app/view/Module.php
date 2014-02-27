<?php
/**
 *
 * @author Sani Iman Pribadi
 *
 */
?>
Ext.define('PHPExtJS.view.<?php echo $this->modelClass; ?>.Module', {
    extend: 'Ext.ux.desktop.Module',
	
    requires: [
        'PHPExtJS.view.<?php echo $this->modelClass; ?>._form',
        'PHPExtJS.view.<?php echo $this->modelClass; ?>._grid',    
    ],
    
    init : function(){
        this.launcher = {
            text: '<?php echo $this->modelClass; ?>',
            iconCls:'bogus'
        }
    },
    
    <?php echo strtolower($this->modelClass); ?> : function(src){
        var desktop = this.app.getDesktop();
        var win = desktop.getWindow('<?php echo strtolower($this->modelClass); ?>');
        var required = '<span style="color:red;font-weight:bold" data-qtip="Required">*</span>';
        if(!win){
            win = desktop.createWindow({
                id: '<?php echo strtolower($this->modelClass); ?>',
                title:'<?php echo $this->modelClass; ?>',
                width: '800',
                height: '600',
                border: false,
                iconCls: 'bogus',
                animCollapse:false,
                constrainHeader:true, 
                hideMode: 'offsets',
                layout: {
                        type: 'fit',
                        align: 'stretch'  // Child items are stretched to full width
                },
                items:[{
                        id: '<?php echo 'on' . $this->modelClass . 'Grid'; ?>',
                        xtype: '<?php echo strtolower($this->modelClass); ?>Form'
                }]
            });
        }
        win.show();
        return win;
    },
            
});

