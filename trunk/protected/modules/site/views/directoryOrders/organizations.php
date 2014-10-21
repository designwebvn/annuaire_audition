<div class="container">
    <div class="float-width ticker">
        <h3 class="cat-label1"><a href="/"> <?php  echo Yii::t('global', 'Home'); ?> </a> </h3>
        <ul>
            <li style="margin-top: 0px;">
                <h4> <a href="/organizations"> <?php echo Yii::t('global','Organizations'); ?>  </a> </h4>
            </li>
        </ul>
    </div>
    <div class="main-left-side">
        <div class="artcl-main float-width">
            <div class="category-description-agency">
                <?php echo Yii::t('global','Veuillez sélectionnez votre département.'); ?>
                <?php foreach( $categories as $val ): ?>
                <div class="category-announ-new-rq fix-cate-agency"> <a href="/organizations/type/<?php echo $val['alias'] ?>"> <?php echo Yii::t('global',$val['type']).' ('.Yii::t('global', $val['name']).')'; ?>  </a> </div>
                <?php endforeach; ?>
                </div>
            <div class="map-directory">
                <img width="521" height="407" border="0" usemap="#map_olr" src="../themes/default/img/carte_def_site.png">
                <map name="map_olr">
                    <?php
                    foreach ( $maps as $map ){
                        ?>
                        <area alt="<?php echo $map['name'] ?>" title="<?php echo $map['name'] ?>" href="/organizations/<?php echo $map['type']; ?>/<?php echo $map['alias'] ?>" coords="<?php echo $map['coords']; ?>" shape="<?php if( $map['name'] == 'Dom Tom' || $map['name'] == 'Principauté de Monaco' ) echo 'rect'; else if( $map['name'] == 'lyon' || $map['name'] == 'marseille' || $map['name'] == 'ville paris'  ) echo ''; else echo 'circle'; ?>">
                    <?php } ?>
                </map>
            </div>
        </div>
    </div>
    <?php $this->renderPartial('/elements/sidebar_right'); ?>
</div>