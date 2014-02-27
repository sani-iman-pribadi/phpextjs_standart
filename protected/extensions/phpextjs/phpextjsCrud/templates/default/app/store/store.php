<?php
/**
 *
 * @author Sani Iman Pribadi
 *
 */
?>
Ext.define('PHPExtJS.store.<?php echo $this->controllerClass; ?>', {
    extend: 'Ext.data.Store',
    model: 'PHPExtJS.model.<?php echo $this->controllerClass; ?>',
    autoLoad: false,
    remoteFilter: true,
    autoSync: true,
    proxy: {
        type: 'rest',
        
        api: {
            create: '<?php echo $this->controllerClass; ?>/create', 
            read: '<?php echo $this->controllerClass; ?>/read',
            update: '<?php echo $this->controllerClass; ?>/update',
            destroy: '<?php echo $this->controllerClass; ?>/delete',
        },
        
        listeners: {
            exception: function(proxy, response, options) {
                Ext.MessageBox.alert('Warning!', response.status + ": " + response.statusText + " " + response.responseText + "!");
            }
        },
        
        reader: {
            type: 'json',
            root: 'data',
            successProperty: 'success'
        },
        
        writer: {
            type: 'json',
            writeAllFields: true,
            encode: true,
            root: 'data'
        },
        
        // sends single sort as multi parameter
        simpleSortMode: true,

        // Parameter name to send filtering information in
        //filterParam: 'query',

        // The PHP script just use query=<whatever>
        
        encodeFilters: function(filters) {
            return filters[0].value;
        }
        
        
    }
});