<!DOCTYPE HTML>
<html>
    <head>
        <meta charset="UTF-8">
        <title>PHPExtJS</title>
        <!-- <x-compile> -->
        <!-- <x-bootstrap> -->
        <!--
        <link rel="stylesheet" href="bootstrap.css">
        
        <script src="ext/ext-dev.js"></script>
        
        <script src="bootstrap.js"></script>
        -->

        <script type="text/javascript" src="shared/include-ext.js"></script>

        <script type="text/javascript" src="shared/options-toolbar.js"></script>
        <!-- </x-bootstrap> -->
        <script src="app.js"></script>
        <script>
            Ext.define('User', {
                //Extend: 'Ext.data.Session',
                config: {
                    id: '',
                    name: '',
                },
                constructor: function(config) {
                    this.initConfig(config);

                    return this;
                }
            });
            Ext.define('App', {
                config: {
                    name: '<?php echo CHtml::encode(Yii::app()->name) ?>'
                },
                constructor: function(config) {
                    this.initConfig(config);

                    return this;
                }
            });

            var User = new User;
            var App = new App;
<?php
    if (isset(Yii::app()->user->get()->id)) {
        echo 'User.id=' . Yii::app()->user->get()->id . ';' . "\n";
        echo 'User.name="' . Yii::app()->user->get()->name . '";';
    }
?>
        </script>
        <!-- </x-compile> -->
    </head>
    <body>
    </body>
</html>

