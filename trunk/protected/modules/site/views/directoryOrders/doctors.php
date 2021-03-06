<div class="container">
    <div class="float-width ticker">
        <h3 class="cat-label1"><a href="/"> <?php  echo Yii::t('global', 'Home'); ?> </a> </h3>
        <ul>
            <li style="margin-top: 0px;">
                <h4> <a href="/ENT-doctors"> <?php echo Yii::t('global','ENT Doctors'); ?>  </a> </h4>
            </li>
        </ul>
    </div>
    <div class="main-left-side">
        <div class="artcl-main float-width">
            <div class="map-directory">
                <div class="title-service-orl"><?php echo Yii::t('global','ENT specialists and speech pathologists doctors'); ?></div>
                <div class="description-service-orl"><?php echo Yii::t('global','Veuillez sélectionnez votre département.'); ?></div>
                <img width="521" height="407" border="0" usemap="#map_olr" src="../themes/default/img/carte_def_site.png">
                <map name="map_olr">
                    <?php
                    foreach ( $maps as $map ){
                        ?>
                        <area alt="<?php echo $map['name'] ?>" title="<?php echo $map['name'] ?>" href="/doctors/<?php echo $map['type']; ?>/<?php echo $map['alias'] ?>" coords="<?php echo $map['coords']; ?>" shape="<?php if( $map['name'] == 'Dom Tom' || $map['name'] == 'Principauté de Monaco' ) echo 'rect'; else if( $map['name'] == 'lyon' || $map['name'] == 'marseille' || $map['name'] == 'ville paris'  ) echo ''; else echo 'circle'; ?>">
                    <?php } ?>
                </map>
            </div>
        </div>
    </div>
    <?php $this->renderPartial('/elements/sidebar_right'); ?>
</div>