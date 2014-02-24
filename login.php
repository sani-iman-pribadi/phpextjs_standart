<html>
    <head>
        <title>Login</title>
        <link rel="stylesheet" href="bootstrap.css">
        <script src="ext/ext-dev.js"></script>
        <script src="bootstrap.js"></script>
        <script>
            Ext.require([
                'Ext.form.*',
            ]);
            Ext.onReady(function() {
                var me = this;
                var login = Ext.widget({
                    //extend: 'Ext.form.Panel',
                    xtype: 'form',
                    url: 'site/login',
                    title: 'Login',
                    frame: true,
                    width: 320,
                    bodyPadding: 10,
                    padding: 10,
                    name: 'LoginForm',
                    defaultType: 'textfield',
                    defaults: {
                        anchor: '100%'
                    },
                    items: [
                        {
                            allowBlank: false,
                            fieldLabel: 'Username',
                            name: 'LoginForm[username]',
                            emptyText: 'username'
                        },
                        {
                            allowBlank: false,
                            fieldLabel: 'Password',
                            name: 'LoginForm[password]',
                            emptyText: 'password',
                            inputType: 'password'
                        },
                        {
                            xtype: 'checkbox',
                            fieldLabel: 'Remember me',
                            name: 'LoginForm[rememberMe]'
                        }
                    ],
                    renderTo: 'formLogin',
                    buttons: [
                        {text: 'Register'},
                        {
                            text: 'Login',
                            name: 'yt0',
                            formBind: true,
                            handler: function() {
                                //alert('Hellow World');
                                //var value = this.up('form').getForm().getValues();
                                this.up('form').getForm().submit(
                                        {
                                            method: 'POST',
                                            // Functions that fire (success or failure) when the server responds.
                                            // The server would actually respond with valid JSON,
                                            // something like: response.write "{ success: true}" or

                                            // response.write "{ success: false, errors: { reason: 'Login failed. Try again.' }}"
                                            // depending on the logic contained within your server script.
                                            // If a success occurs, the user is notified with an alert messagebox,

                                            // and when they click "OK", they are redirected to whatever page
                                            // you define as redirect.

                                            success: function() {

                                                //Ext.Msg.alert('Status', 'Login Successful!', function(btn, text) {

                                                    //     if (btn == 'ok'){
                                                    //window.location = 'index.php';
                                                    //     }
                                                //});

                                            },
                                            // Failure function, see comment above re: success and failure.
                                            // You can see here, if login fails, it throws a messagebox
                                            // at the user telling him / her as much.

                                            failure: function(form, action) {
                                                if (action.failureType == 'server') {
                                                    obj = Ext.JSON.decode(action.response.responseText);

                                                    Ext.Msg.alert('Login Failed!', obj.errors.reason);
                                                } else {
                                                    Ext.Msg.alert('Warning!', 'Authentication server is unreachable : ' + action.response.responseText);

                                                }
                                                login.getForm().reset();
                                            }

                                        }
                                );
                            }

                        }
                    ],
                });



                //fsf.render(document.body);
            });
        </script>
        <style>

            body{
                font-family:verdana,tahoma,arial,verdana,sans-serif;    
            }
            /*
            #webcontent{
                width:100%;
                height:100%;
                margin:auto;
                position: relative;
                //background: #0464BB;//url("images/rsua.PNG");
                opacity: 0.5;
            }
            */

            #formLogin{
                //position:absolute;
                //top:200;
                //left:475;
                //right:0;
                //bottom:0;
                /*top: 200px;
                bottom:70px;
                
                background-color:#B8D4EA;
                padding:20px;
                */
                margin:10px;
                -moz-border-radius: 10px;
                border-radius: 10px;
            }

        </style>
    </head>
    <body>
        <div id="formLogin">
            <?php
$yii=dirname(__FILE__).'/../yii/framework/yii.php';
$config=dirname(__FILE__).'/protected/config/main.php';

// remove the following lines when in production mode
defined('YII_DEBUG') or define('YII_DEBUG',true);
// specify how many levels of call stack should be shown in each log message
defined('YII_TRACE_LEVEL') or define('YII_TRACE_LEVEL',3);

require_once($yii);
                ?>
            <?php echo Yii::app()->user->get()->id; ?>
        </div>
    </body>
</html>
