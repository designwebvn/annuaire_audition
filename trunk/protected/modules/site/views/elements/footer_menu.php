<!-- Footer Menu -->
<div class="container">
	<div class="row">
		<div class="col-lg-10" id="footer-menu">
			<!-- Main Menu -->
			<?php $this->widget('zii.widgets.CMenu',array(
				'items'=>array(
					array(	'label'=>Yii::t('global', 'Home'), 'url'=>array('index/index'),
							//'active'=>Yii::app()->controller->id=='index',
							// 'active' => Yii::app()->controller->id == 'site' && 
							// Yii::app()->controller->action->id == 'page' && 
							//Yii::app()->request->getParam('view') == 'about'
					),
					array('label'=>Yii::t('global', 'Classified Ads'), 'url'=>'/classified-ads',
					),
					array('label'=>Yii::t('global', 'Contact'), 'url'=>'/contact-us',
					),
					array('label'=>Yii::t('global', 'Appear In The Directory'), 'url'=>'/appear-directory',
					),
					array('label'=>Yii::t('global', 'Buy The Directory'), 'url'=>'/directory-orders',
					),
					array('label'=>Yii::t('global', 'Legal Information'), 'url'=>'/mentions-legales',
					),
				),
				'id'=>'footer-menu-items',
				'htmlOptions'=>array('class'=>'sm sm-menu menu-efct')
			)); ?>
		</div>
	</div>
	<a class="fxd-mnu-x trans1" title="Close" id="hidemenu"><span class="fa-stack fa-lg"> <i class="fa fa-times fa-stack-1x fa-inverse"></i> </span></a>
</div>