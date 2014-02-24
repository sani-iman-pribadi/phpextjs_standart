Ext.define('PHPExtJS.store.<?php echo $this->controllerClass; ?>', {
    extend: 'Ext.data.Store',
    model: 'PHPExtJS.model.<?php echo $this->controllerClass; ?>',
    autoLoad: false,
    remoteFilter: true,
    autoSync: true,
    proxy: {
        type: 'ajax',
        
        api: {
            create: 'index.php/<?php echo $this->controllerClass; ?>/create', 
            read: 'index.php/<?php echo $this->controllerClass; ?>/read',
            update: 'index.php/<?php echo $this->controllerClass; ?>/update',
            destroy: 'index.php/<?php echo $this->controllerClass; ?>/delete',
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