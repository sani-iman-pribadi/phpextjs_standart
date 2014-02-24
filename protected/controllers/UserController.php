<?php

    class UserController extends Controller {

        /**
         * @return array action filters
         */
        public function filters() {
            return array(
                'accessControl', // perform access control for CRUD operations
                    //'deleteOnly + delete', // we only allow deletion via POST request
            );
        }

        /**
         * Specifies the access control rules.
         * This method is used by the 'accessControl' filter.
         * @return array access control rules
         */
        public function accessRules() {
            return array(
                /*
                  array('allow',  // allow all users to perform 'index' and 'view' actions
                  'actions'=>array('index','view'),
                  'users'=>array('*'),
                  ),
                 * 
                 */
                array('allow', // allow authenticated user to perform 'create' and 'update' actions
                    'actions' => array('index', 'view', 'create', 'update', 'read'),
                    'users' => array('@'),
                ),
                array('allow', // allow admin user to perform 'admin' and 'delete' actions
                    'actions' => array('delete'),
                    'users' => array('admin'),
                ),
                array('deny', // deny all users
                    'users' => array('*'),
                ),
            );
        }

        /**
         * Displays a particular model.
         * @param integer $id the ID of the model to be displayed
         */
        public function actionView($id) {
            /*
              $this->render('view',array(
              'model'=>$this->loadModel($id),
              ));
             */
        }

        /**
         * Creates a new model.
         * If creation is successful, the browser will be redirected to the 'view' page.
         */
        public function actionCreate() {
            $model = new User;

            $data = json_decode(stripslashes($_POST['data']));

            foreach ($data as $key => $val) {
                $model->$key = $val;
            }

            $model->attributes = $data;

            if ($model->save()) {
                echo json_encode(array(
                    "success" => true,
                    "data" => array(
                        "id" => $model->id,
                    )
                ));
            }
        }

        /**
         * Updates a particular model.
         * If update is successful, the browser will be redirected to the 'view' page.
         * @param integer $id the ID of the model to be updated
         */
        public function actionUpdate($id) {

            $put_var = array();
            parse_str(file_get_contents('php://input'), $put_var);

            foreach ($put_var as $data) {
                $json = CJSON::decode($data, true);
            }

            $model = $this->loadModel($id);

            foreach ($json as $key => $value) {
                // Does model have this attribute? If not, raise an error
                if ($model->hasAttribute($key)) {
                    $model->$key = $value;
                }
            }

            if ($id <> 1) {
                if ($model->save()) {
                    echo json_encode(array(
                        "success" => true,
                        "data" => array(
                            "id" => $model->id,
                        )
                    ));
                }
            } else {
                throw new CHttpException(403, 'You are not authorized to perform this action.!');
            }
        }

        /**
         * Deletes a particular model.
         * If deletion is successful, the browser will be redirected to the 'admin' page.
         * @param integer $id the ID of the model to be deleted
         */
        public function actionDelete($id) {

            if ($_SERVER['REQUEST_METHOD'] === "DELETE") {

                if ($id <> 1) {
                    $this->loadModel($id)->delete();

                    echo json_encode(array(
                        "success" => true
                    ));
                } else {
                    throw new CHttpException(403, 'You are not authorized to perform this action.!');
                }
            }
        }

        /**
         * Lists all models.
         */
        public function actionIndex() {
            /* Default Yii action Index
              $dataProvider=new CActiveDataProvider('User');
              $this->render('index',array(
              'dataProvider'=>$dataProvider,
              ));
             */
        }

        /**
         * Read all table content
         */
        public function actionRead() {
            $this->layout = false;

            $start = (int) $_GET['start'];
            $limit = (int) $_GET['limit'];
            $model = array();

            //Use this code for complex query
            /*
              $model = Yii::app()->db->createCommand()
              ->select('*')
              ->from('table_name')
              ->offset($start)
              ->limit($limit)
              ->queryAll();
             */

            $model = User::model()->findAll(array('limit' => $limit, 'offset' => $start));

            $total = count(User::model()->findAll());

            echo CJSON::encode(array(
                "success" => true,
                "total" => $total,
                "data" => $model
            ));

            Yii::app()->end();
        }

        /**
         * Manages all models.
         */
        public function actionAdmin() {
            $model = new User('search');
            $model->unsetAttributes();  // clear any default values
            if (isset($_GET['User']))
                $model->attributes = $_GET['User'];

            $this->render('admin', array(
                'model' => $model,
            ));
        }

        /**
         * Returns the data model based on the primary key given in the GET variable.
         * If the data model is not found, an HTTP exception will be raised.
         * @param integer $id the ID of the model to be loaded
         * @return User the loaded model
         * @throws CHttpException
         */
        public function loadModel($id) {
            $model = User::model()->findByPk($id);
            if ($model === null)
                throw new CHttpException(404, 'The requested page does not exist.');
            return $model;
        }

        /**
         * Performs the AJAX validation.
         * @param User $model the model to be validated
         */
        protected function performAjaxValidation($model) {
            if (isset($_POST['ajax']) && $_POST['ajax'] === 'user-form') {
                echo CActiveForm::validate($model);
                Yii::app()->end();
            }
        }

    }
    