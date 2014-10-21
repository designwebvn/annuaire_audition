<div class="container">
    <div class="float-width ticker">
        <h3 class="cat-label1"><a href="/"> <?php  echo Yii::t('global', 'Home'); ?> </a> </h3>
        <ul>
            <li style="margin-top: 0px;">
                <h4><a href="/services-ORL"> <?php echo Yii::t('global','Services ORL'); ?> </a> > <a href="/services/<?php echo $maps['type'] ?>/<?php echo $maps['alias']; ?>"> <?php echo Yii::t('global',$maps['name']); ?>  </a> > <a href="/hospitals/<?php echo $maps['alias']; ?>/<?php echo $hospitals['id'].'-'.Yii::app()->func->makeAlias($hospitals['corporate_name']); ?>"> <?php echo $hospitals['corporate_name']; ?> </a> </h4>
            </li>
        </ul>
    </div>

    <div class="main-left-side">
        <div class="news-sec-1 float-width">
            <div class="float-width sec-cont2">
                <h2> <span style="border-bottom: 1px solid #505050;"> <?php echo $hospitals['corporate_name']; ?> </span> </h2>
                <div class="announcements-content-rq">
                    <address>
                        <?php echo $hospitals['address']; ?>
                        <div style="margin-left: 25px;">
                            <abbr title="Phone">P:</abbr> <?php echo $hospitals['phone']; ?><br>
                            <abbr title="Fax">F:</abbr> <?php echo $hospitals['fax']; ?>
                        </div>
                    </address>
                </div>
            </div>
        </div>
    </div>
    <?php $this->renderPartial('/elements/sidebar_right'); ?>
</div>