<?php
class UserIdentity extends CUserIdentity
{
    private $_id;
    public function authenticate()
    {
        $record=User::model()->findByAttributes(array('username'=>$this->username));
        if($record===null)
            $this->errorCode=self::ERROR_USERNAME_INVALID;
        else if($record->password!==md5($this->password))
            $this->errorCode=self::ERROR_PASSWORD_INVALID;
        else
        {   
            $this->_id=$record->id;
            Yii::app()->session['user'] = $this->getUser();
            $this->setState('title', $record->name);
            $this->errorCode=self::ERROR_NONE;
        }
        return !$this->errorCode;
    }
 
    public function getId()
    {
        return $this->_id;
    }
    
    public function getMenu(){
        $id_pengguna = $this->getId();
        //$menu = json_encode(MENUPENGGUNA::model()->with('PENGGUNA')->find(array('condition'=>"ID_PENGGUNA='$id_pengguna'")));
        $menu = CJSON::encode(MenuPengguna::model()->with('Pengguna')->find(array('condition'=>"id_pengguna='$id_pengguna'")));
        return $menu;
    }
    
    public function getUser(){
        $userId = $this->getId();
        //$pengguna = json_encode(PENGGUNA::model()->findByPk($id_pengguna));
        $user = CJSON::encode(User::model()->findByPk($userId));
        return $user;
    }

        public function getData(){
            $user=User::model()->findByPk($this->_id);
            return $user;
    }
  
    protected function loadUser($id=null)
    {
        if($this->_model===null)
        {
            if($id!==null)
                $this->_model=User::model()->findByPk($id);
        }
        return $this->_model;
    }
}