<div class="container">
         <!-- Main left side -->
         <div class="main-left-side">
            <div class="contact-maps float-width">
               <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d12679.021280862107!2d-121.89079389021241!3d37.39561832456384!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x808fcea7e190e829%3A0xf812f1635c1b7ec5!2sSilicon+Valley+University!5e0!3m2!1sen!2s!4v1393959144037" width="100%" height="250" frameborder="0" style="border:0"></iframe>
            </div>
            <div class="news-sec-1 float-width">
               <!-- Website Contact us page Info -->
               <div class="float-width sec-cont">
                  <div class="sec-1-big float-width">
                     <!-- Contact us Form -->
                     <div class="contact-form float-width">
                        <h3 class="sec-title">Contact</h3>
                        <p class="note"><?php echo Yii::t('global','Fields with'); ?><span class="required"> * </span><?php echo Yii::t('global','are required'); ?>.</p>
                        <?php $form=$this->beginWidget('CActiveForm', array(
			                    'id'=>'contactus-form',
			                    'enableAjaxValidation'=>false,
			                    'htmlOptions'=>array(
                                'class'=>'form-horizontal contentForm',
                                'data-validate'=>'parsley',
                                )
                			)); ?>
                        <?php $this->widget('widgets.admin.notifications'); ?>
                        <?php echo $form->errorSummary($model, '', '', array('class'=> 'bg-danger'));?>
				               <div class="alert" id="formmsg" style="display:none;" >
                              <button type="button" class="close" data-dismiss="alert" aria-hidden="true"><i class="fa fa-times"></i></button>
                              <span class="error" ></span>
                           </div>
                           <div class="form-group">
                              <input type="corporatename" name="Contactus[corporate_name]" class="form-control" id="corporatename" placeholder="Corporate name">
                           </div>
                           <div class="form-group">
                              <input type="name" data-required="true" name="Contactus[name]" class="form-control" id="name" placeholder="Name *">
                           </div>
                           <div class="form-group">
                              <input type="address" name="Contactus[address]" class="form-control" id="address" placeholder="Address 1">
                           </div>
                           <div class="form-group">
                              <input type="address1" name="Contactus[address1]" class="form-control" id="address1" placeholder="Address 2">
                           </div>
                           <div class="form-group">
                              <input type="zip" name="Contactus[zip]" class="form-control" id="zip" placeholder="ZIP Code">
                           </div>
                           <div class="form-group">
                              <input type="city" name="Contactus[city]" class="form-control" id="city" placeholder="City">
                           </div>
                           <div class="form-group">
                              <input type="phone" name="Contactus[phone]" class="form-control" id="phone" placeholder="Phone number ">
                           </div>
                           <div class="form-group">
                              <input type="fax" name="Contactus[fax]" class="form-control" id="fax" placeholder="Fax">
                           </div>
                           <div class="form-group">
                              <input type="email" data-required="true" name="Contactus[email]" class="form-control" id="email" placeholder="E-mail *">
                           </div>
                           <div class="form-group">
                              <input type="Subject" name="Contactus[subject]" class="form-control" id="Subject" placeholder="Subject">
                           </div>
                           <div class="form-group">
                              <input type="type" name="Contactus[type]" class="form-control" id="type" placeholder="Type of application">
                           </div>
                           <div class="form-group">
                           <textarea data-required="true" class="form-control" rows="6" name="Contactus[content]" placeholder="Text *"></textarea>
                           </div>
                        <div class="radio-inline">
                           <div>
                              <label>
                              <input type="checkbox" name="Contactus[is_receive]" id="informations" value="informations"/>
                              <?php echo Yii::t('global', 'I wish to receive informations'); ?>
                              </label>
                           </div>
                           <div>
                              <label>
                              <input type="checkbox" name="Contactus[is_directory]" id="directory" value="directory"/>
                              <?php echo Yii::t('global', 'I wish to be in the directory'); ?>
                              </label>
                           </div>
                        </div>
                        <?php if(CCaptcha::checkRequirements()): ?>
                           <div class="form-group">
                              <div class="capcha">
                                 <?php $this->widget('CCaptcha'); ?>
                                 <?php echo $form->textField($model,'verifyCode',array('size'=>60,'maxlength'=>12,'class'=>'form-control', 'data-validation-minlength'=>'0','data-trigger'=>'change','data-required'=>'true')); ?>
                              </div>
                           </div>
                           <?php endif; ?>
                        <div>
                           <button type="submit" class="cmnt-btn trans2">
                           <?php echo Yii::t('global', 'SUBMIT YOUR MESSAGE'); ?>
                           </button>
                        </div>
                        <?php $this->endWidget(); ?>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <?php $this->renderPartial('/elements/sidebar_right'); ?>
      </div>
