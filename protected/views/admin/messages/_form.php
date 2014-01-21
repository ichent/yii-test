<?
/* @var $this MessagesController */
/* @var $model Message */
/* @var $form CActiveForm */
?>

<div class="form">

<?
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'message-form',
        // Please note: When you enable ajax validation, make sure the corresponding
        // controller action is handling ajax validation correctly.
        // There is a call to performAjaxValidation() commented in generated controller code.
        // See class documentation of CActiveForm for details on this.
        'enableAjaxValidation' => false,
    ));
?>
<p class="note">Поля, помеченные <span class="required">*</span>, обязательны для заполнения.</p>

<? echo $form->errorSummary($model); ?>

<div class="row">
    <?php echo $form->labelEx($model,'text'); ?>
    <?php echo $form->textField($model,'text',array('size'=>20,'maxlength'=>50)); ?>
    <?php echo $form->error($model,'text'); ?>
</div>

<div class="row buttons">
    <?php echo CHtml::submitButton($model->isNewRecord ? 'Создать' : 'Сохранить'); ?>
</div>

<? $this->endWidget(); ?>

</div><!-- form -->