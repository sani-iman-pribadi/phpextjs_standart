<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of WebUser
 *
 * @author sani
 */
class WebUser extends CWebUser {
    //put your code here
    private $_model;
    
    public function get(){
            $userId = Yii::app()->user->getId();
            $user = User::model()->findByPk($userId);
            return $user;
    }

}

?>
