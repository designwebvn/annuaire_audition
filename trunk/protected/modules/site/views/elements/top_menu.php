<div class="container">
	<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav">
            <li class="dropdown">
                <a href="#" class="dropdown-toggle fix-color-top" data-toggle="dropdown"> <?php echo Yii::t('global', 'Language'); ?> <img src="/uploads/flag/<?php echo Yii::app()->language; ?>.png" /> <i class="fa fa-angle-down"></i></a>
                <ul class="dropdown-menu">
                    <?php
                    $params = $_GET;
                    if (isset($params['lang'])) unset($params['lang']);
                    foreach( Yii::app()->params['languages'] as $key => $value ){
                        if ($key != Yii::app()->language){
                            if(http_build_query($params)!='')
                                echo '<li><a href="?lang='.$key.'&'.http_build_query($params).'"><img src="/uploads/flag/'.$key.'.png" /> '.$value.'</a></li>';
                            else
                                echo '<li><a href="?lang='.$key.'"><img src="/uploads/flag/'.$key.'.png" /> '.$value.'</a></li>';

                        }
                    }
                    ?>
                </ul>
            </li>
        </ul>
		<ul class="nav navbar-nav righty">
            <?php if( !Yii::app()->user->id ){ ?>
			<li><a href="users-login/" class="fix-color-top"><?php echo Yii::t('global','Login'); ?></a></li>
            <?php } else { ?>
            <li class="dropdown"><a href="" class="dropdown-toggle fix-color-top" data-toggle="dropdown"><?php echo Yii::t('global','Hello').' '.Yii::app()->user->name; ?>  <i class="fa fa-angle-down"></i> </a>
                <ul class="dropdown-menu fix-menu-profile">
                    <li> <a href="/profile/index"> <?php echo Yii::t('global','Update Profile'); ?></a> </li>
                    <li> <a href="/login/lostpassword"> <?php echo Yii::t('global','Change Password'); ?></a> </li>
                    <li> <a href="/logout"> <?php echo Yii::t('global','Log out'); ?></a> </li>
                </ul>
            </li>
            <?php } ?>
		</ul>
	</div>
</div>