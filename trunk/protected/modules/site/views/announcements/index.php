<div class="container">
    <div class="float-width ticker">
        <h3 class="cat-label1"><a href="/"> <?php  echo Yii::t('global', 'Home'); ?> </a> </h3>
        <ul>
            <li style="margin-top: 0px;">
                <h4> <a href="/classified-ads"> <?php echo Yii::t('global','Classified Ads'); ?>  </a> </h4>
            </li>
        </ul>
    </div>

    <div class="main-left-side">
        <div class="artcl-main float-width">
            <div class="artcl-prev-nxt float-width">
            </div>
                  <ul>
                     <li> L'annuaire Audition vous propose un système de petites annonces <b>gratuites.</b> </li>
                     <li><b> Pour déposer une nouvelle annonce : </b></li>
                     <li> Merci d'utiliser notre <a href="/formulaire_annonce" style="color:#0000bb"> formulaire </a> prévu à cet effet. </li>
                     <li><b> Pour consulter les annonces : </b></li>
                     <li> Merci de sélectionner la catégorie qui vous intéresse. </li>
                  </ul>
                  <div class="announcement-cate-new">

                      <?php foreach ( $categorys as $val){ ?>
                          <div class="category-announ-new-rq"> <a href="/classified-ads/<?php echo $val['id']; ?>"> <?php echo Yii::t( 'global', $val['name'] ); ?> </a> </div>
                      <?php } ?>
                  </div>
        </div>
    </div>


    <?php $this->renderPartial('/elements/sidebar_right'); ?>
</div>