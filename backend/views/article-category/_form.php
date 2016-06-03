<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\ArticleCategory */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="article-category-form">

    <?php $form = ActiveForm::begin(); ?>
    <div class="form-group">
        <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>
    </div>
    <div class="form-group">
        <?= $form->field($model, 'parent_id')->widget(\kartik\widgets\Select2::className(),[
                'data' => ArrayHelper::map($articleCategories,'id','title')
            ]) ?>
    </div>
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
