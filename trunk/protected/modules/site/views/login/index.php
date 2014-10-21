<div class="container">
    <div class="float-width ticker">
        <h3 class="cat-label1"><a href="/"> <?php  echo Yii::t('global', 'Home'); ?> </a> </h3>
        <ul>
            <li style="margin-top: 0px;">
                <h4> <a href="/users-login"> <?php echo Yii::t('global','Login'); ?> </a> </h4>
            </li>
        </ul>
    </div>

<?php $form=$this->beginWidget('CActiveForm', array(
			                    'id'=>'contactus-form',
			                    'enableAjaxValidation'=>false,
			                    'htmlOptions'=>array(
                                'class'=>'form-horizontal contentForm',
                                'data-validate'=>'parsley',
                                )
                			)); ?>


<div class="main-left-side" id="loginform">
	<?php $this->widget('widgets.admin.notifications'); ?>
	<?php echo $form->errorSummary($model, '', '', array('class'=> 'bg-danger'));?>
<div class="post-item post-thumb-hor">

	<p><?php echo Yii::t('login', 'Please fill all required fields and hit the submit button once your done.'); ?></p>
	
	<?php echo CHtml::form($this->createUrl('login/index'), 'post', array('class'=>'frmcontact', 'id'=>'validation2')); ?>

		<?php if($model->hasErrors()): ?>

				<?php echo Yii::t('login', 'Sorry, But we can\'t find a member with those login information.'); ?>
		<?php endif; ?>
		
		<div class="row-fluid">
            <div class="span3 bold"><?php echo CHtml::activeLabel($model, 'Email'); ?></div>
			<div class="span4"><input type="text" placeholder="Email*" class="text tooltipsy validate[required,custom[email]]" name="LoginForm[email]" id="LoginForm_email" value="<?php echo $model->email; ?>" title="<?php echo Yii::t('login', 'Enter your email address'); ?>"/></div>
		</div>
		
		<div class="row-fluid">
            <div class="span3 bold"><?php echo CHtml::activeLabel($model, 'Password'); ?></div>
			<div class="span4"><input type="password" placeholder="Password*" class="text tooltipsy validate[required]" name="LoginForm[password]" id="LoginForm_password" value="" title="<?php echo Yii::t('login', 'Enter your password'); ?>"/></div>
		</div>
		
		<div class="row-fluid">
			<div class="span3 bold" style="margin-left:20px ;"></div>
			<?php echo CHtml::link( Yii::t('login', 'Forgot Password?'), array('lostpassword'), array('id'=>'forgot','class' => 'forget-pass-user') ); ?></div></br>
			<div class="span4" style="margin: -20px 0px 0px 200px;"><?php echo CHtml::submitButton(Yii::t('global', 'Submit'), array('class'=>'btn btn-primary', 'name'=>'submit', )); ?>
			 <span class="space-change"></span>
		</div>
	<?php echo CHtml::endForm(); ?>
	<?php
    foreach(Yii::app()->user->getFlashes() as $key => $message) {
        echo '<div class="flash-' . $key . '">' . $message . "</div>\n";
    }
	?>
</div>
<?php $this->endWidget(); ?>
</div>
<?php $this->renderPartial('/elements/sidebar_right'); ?>
</div>