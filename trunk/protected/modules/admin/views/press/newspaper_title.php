<?php
if(isset($model->newspapersTitles)){
    foreach($model->newspapersTitles as $item){
        if(isset( $item->title )) { ?>
            <div class="row-form  clearfix group_<?php echo $item->id ?>">

                <div class="isb-right_circle point_group"></div>
                <div class="row-form fix-create-group clearfix">
                    <div class="span3">
                        <input type="text" class="title_newspaper<?php echo $item->id ?> validate[required]" name="newspapersTitles[<?php echo $item->id?>][nameTitle]" value="<?php echo $item->title ?>">
                    </div>
                    <div class="span3">
                        <input type="text" class="theme_newspaper<?php echo $item->id ?>" name="newspapersTitles[<?php echo $item->id?>][themeTitle]" value="<?php echo $item->theme ?>">
                    </div>
                    <div class="span3">
                        <input type="text" class="periodicity_newspaper<?php echo $item->id ?>" name="newspapersTitles[<?php echo $item->id?>][periodicityTitle]" value="<?php echo $item->periodicity ?>">
                    </div>
                    <div class="span3">
                        <div class="btn btn-warning  delete-group" onclick="deleteGroup('<?php echo $item->id ?>')" >
                            <span class="isw-delete "><?php echo Yii::t('global','Delete'); ?></span>
                        </div>
                    </div>
                </div>
           </div>
            <div style="margin-top: 5px !important;"></div>
        <?php       }
    }
}
?>

