<?php
namespace api\versions\v1;

use Yii;
use yii\data\ActiveDataProvider;
use yii\rest\ActiveController;
use yii\web\HttpException;
use yii\web\ForbiddenHttpException;
use yii\filters\auth\CompositeAuth;
use yii\filters\auth\HttpBasicAuth;
use yii\filters\auth\HttpBearerAuth;
use yii\filters\auth\QueryParamAuth;

class UserController extends ActiveController
{
    /**
     * @var string
     */
    public $modelClass = 'api\resources\User';

    /**
     * @inheritdoc
     */
    public function behaviors(){
        $behaviors = parent::behaviors();
        //code authenticator here
        return $behaviors;
    }
    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'index' => [
                'class' => 'yii\rest\IndexAction',
                'modelClass' => $this->modelClass,
                'prepareDataProvider' => [$this, 'prepareDataProvider']
            ],
            'view' => [
                'class' => 'yii\rest\ViewAction',
                'modelClass' => $this->modelClass,
                'findModel' => [$this, 'findModel']
            ],
            'options' => [
                'class' => 'yii\rest\OptionsAction'
            ]
        ];
    }
    /**
     * @return ActiveDataProvider
     */
    public function prepareDataProvider()
    {
        $class = $this->modelClass;
        var_dump($this->behaviors());exit();
        return new ActiveDataProvider([
            'query' => $class::find()
        ]);
    }
    /**
     * @param $id
     * @return array|null|\yii\db\ActiveRecord
     * @throws HttpException
     */
    public function findModel($id)
    {
        $class = $this->modelClass;
        $model = $class::findOne($id);
        if (!$model) {
            throw new HttpException(404);
        }
        return $model;
    }

}