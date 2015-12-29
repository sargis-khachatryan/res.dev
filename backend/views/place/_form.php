<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use mihaildev\ckeditor\CKEditor;
use kartik\select2\Select2;
use kartik\file\FileInput;
use yii\helpers\Url;

$model2 = new \common\models\Photos();
/* @var $this yii\web\View */
/* @var $model common\models\Places */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="places-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'category_id')->widget(Select2::classname(), [
        'data' => (\yii\helpers\ArrayHelper::map(\common\models\Categories::find()->all(), 'id', 'name')),
        'options' => ['placeholder' => 'Select a state ...'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]);?>

    <?= $form->field($model, 'kitchensIds')->widget(Select2::classname(), [
        'data' => $model->getdropKitchens(),
        'options' => ['placeholder' => 'Select a Kitchens ...', 'multiple' => true],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ])->label('Kitchens');?>
    <?= $form->field($model, 'servicesIds')->widget(Select2::classname(), [
        'data' => $model->getdropServices(),
        'options' => ['placeholder' => 'Select a Services ...', 'multiple' => true],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ])->label('Services');?>

    <?= $form->field($model, 'metrosIds')->widget(Select2::classname(), [
        'data' => $model->getdropMetros(),
        'options' => ['placeholder' => 'Select a Metros ...', 'multiple' => true],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ])->label('Metros');?>

    <?= $form->field($model, 'description')->widget(CKEditor::className(),[
        'editorOptions' => [
            'preset' => 'basic', //разработанны стандартные настройки basic, standard, full данную возможность не обязательно использовать
            'inline' => false, //по умолчанию false
        ],
    ]); ?>



    <?= $form->field($model, 'status')->checkbox([ 'value' => '0','label' => 'Active', 'uncheck' => '1']) ?>

    <?= $form->field($model, 'price_from')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'price_to')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'slug')->textInput(['maxlength' => true]) ?>


    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

    <?= FileInput::widget([
        'name' => 'Photos[imageFiles]',
        'attribute' => 'Photos[imageFiles]',
        'language' => 'ru',
        'options' => ['multiple' => true],
        'pluginOptions' => ['previewFileType' => 'any',
//            'showRemove'=>false,
//            'showUpload'=>false,
//            'showUploadedThumbs'=>false,
//            'initialPreviewShowDelete'=>false,
            'uploadUrl' => Url::to(['/place/upload']),]
    ]); ?>
    <!--    --><?php //ActiveForm::begin([
    //        'method' => 'post',
    //        'action' => ['/place/upload'],
    //        'options'=>['enctype'=>'multipart/form-data']
    //    ]); ?>
    <!---->
    <!--    --><? //= FileInput::widget([
    //        'model' => $model2,
    //        'attribute' => 'imageFiles',
    //        'options' => ['multiple' => true]
    //    ]);?>
    <!--    --><?php //ActiveForm::end(); ?>

</div>
