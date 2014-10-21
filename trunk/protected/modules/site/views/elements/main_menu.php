<!-- Main Menu -->
<div class="container">
	<div class="row">
		<div class="col-lg-10">
			<!-- Main Menu -->
			<?php $this->widget('zii.widgets.CMenu',array(
				'items'=>array(

					//Home
					array(	'label'=>Yii::t('global', 'Home'), 'url'=>array('index/index'),
							'active'=>Yii::app()->controller->id == 'index',
					),
					//Directory
					array('label'=>Yii::t('global', 'Directory'), 'url'=>'/hearing-care-centers',
						'linkOptions' => array(
							'class' => 'has-submenu',   
						),
						'items' => array(
							array('label'=>Yii::t('global', 'Hearing care centers'), 'url'=>'/hearing-care-centers'),
							array('label'=>Yii::t('global', 'Hearing aid suppliers'), 'url'=>'/hearing-aid-suppliers'),
							array('label'=>Yii::t('global', 'ENT doctors'), 'url'=>'/ENT-doctors'),
							array('label'=>Yii::t('global', 'Instrumentation ORL'), 'url'=>'/instrumentation-ORL'),
							array('label'=>Yii::t('global', 'Services ORL'), 'url'=>'/services-ORL'),
							array('label'=>Yii::t('global', 'Speech Therapists'), 'url'=>'/speech-therapists'),
							array('label'=>Yii::t('global', 'Associative Sector'), 'url'=>'/associative-sector'),
							array('label'=>Yii::t('global', 'Organizations'), 'url'=>'/organizations'),
						),
						'submenuOptions' => array(
							'class' => 'main-menu-sub sm-nowrap',
						)
					),
					//Hearing TV
					array('label'=>Yii::t('global', 'Hearing TV'), 'url'=>'/hearing-TV',
                        'active'=>Yii::app()->controller->id == 'grand-public',
						'linkOptions' => array(
							'class' => 'has-submenu',   
						),
						'items' => array(
							array('label'=>Yii::t('global', 'Grand Public'), 'url'=>'/grand-public'),
							array('label'=>Yii::t('global', 'Videos Pro'), 'url'=>'/videos-pro'),
						),
						'submenuOptions' => array(
							'class' => 'main-menu-sub sm-nowrap',
						)
					),
					//INFORMATIONS
					array('label'=>Yii::t('global', 'Informations'), 'url'=>'/loreille-anatomie',
						'linkOptions' => array(
							'class' => 'has-submenu',   
						),
						'items' => array(
							array('label'=>Yii::t('global', 'Ear: Anatomy'), 'url'=>'/loreille-anatomie'),
							array('label'=>Yii::t('global', 'Scale Decibels'), 'url'=>'/lechelle-des-decibels'),
							array('label'=>Yii::t('global', 'The Different Types Of Deafness'), 'url'=>'/les-differents-types-de-surdite'),
							array('label'=>Yii::t('global', 'Presbycusis'), 'url'=>'/la-presbyacousie'),
							array('label'=>Yii::t('global', 'The Apparatus'), 'url'=>'/lappareillage'),
							array('label'=>Yii::t('global', 'Hearing Aids'), 'url'=>'/les-aides-auditives'),
                            array('label'=>Yii::t('global', 'Audition TV'), 'url'=>'audition-tv'),
						),
						'submenuOptions' => array(
							'class' => 'main-menu-sub sm-nowrap cwidth',
						)
					),
					//NEWSLETTERS
					array('label'=>Yii::t('global', 'Newsletters'), 'url'=>'/news-letter',
						// 'linkOptions' => array(
						// 	'class' => 'has-submenu',   
						// )
					),
					//ESPACE PRO
					array('label'=>Yii::t('global', 'Espace Pro'), 'url'=>'/espace-pro',
						'linkOptions' => array(
							'class' => 'has-submenu',   
						),
						'items' => array(
							array('label'=>Yii::t('global', 'Regulation'), 'url'=>'/regulation'),
							array('label'=>Yii::t('global', 'Classified Ads'), 'url'=>'/classified-ads'),
							array('label'=>Yii::t('global', 'Auditiontv Pro'), 'url'=>'/videos-pro'),
							array('label'=>Yii::t('global', 'En Construction'), 'url'=>'/en-construction'),
						),
						'submenuOptions' => array(
							'class' => 'main-menu-sub sm-nowrap',
						)
					),
					//Guestbook
					array('label'=>Yii::t('global', 'Guestbook'),
                            'url'=>'',
						    'linkOptions' => array(
                            //'target'=>'_blank',
							'class' => 'has-submenu guestbook-click',
						)
					),
					//Students
					array('label'=>Yii::t('global', 'Students'), 'url'=>'/students',
						'linkOptions' => array(
							'class' => 'has-submenu',   
						),
						'items' => array(
							array('label'=>Yii::t('global', 'Laureates C.N.A.'), 'url'=>'/laureates-CNA'),
							array('label'=>Yii::t('global', 'Classified Ads'), 'url'=>'/classified-ads'),
						),
						'submenuOptions' => array(
							'class' => 'main-menu-sub sm-nowrap',
						)
					),
				),
				'id'=>'main-menu-items',
				'htmlOptions'=>array('class'=>'sm sm-menu menu-efct')
			)); ?>
		</div>
		<div class="col-lg-2 main-search-bar">
            <form class="navbar-form float-width" role="search" action="/search" method="post">
                <div class="form-group float-width">
                    <input id="mbHeadSearchInput" class="form-control float-width" name="q" value ="<?php echo (isset($_GET['condition'])?$_GET['condition']:(isset($_GET['q'])?$_GET['q']:''));?>" type="text" placeholder="<?php echo Yii::t('global', 'Input keyword'); ?>" style="width: 95%;">
                </div>
                <button type="submit" class="fa fa-search fix-button-search" />
            </form>
		</div>
	</div>
	<a class="fxd-mnu-x trans1" title="Close" id="hidemenu"><span class="fa-stack fa-lg"> <i class="fa fa-times fa-stack-1x fa-inverse"></i> </span></a>
</div>