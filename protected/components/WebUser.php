<?php
/**
 * Description of WebUser
 *
 * @author Sani Iman Pribadi
 *
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
