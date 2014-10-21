<div class="container-fluid">

<div class="row-fluid">
<div class="span12">

<div class="containerHeadline tableHeadline">
    <h2><?php echo Yii::t('global', 'Custompages'); ?></h2>
    <form>
        <div class="input-append">
            <span class="add-on add-on-middle add-on-mini" onclick="window.location.href='<?php echo $this->createUrl('custompages/create') ?>'"><i class="icon-plus-sign" title="Create custompages"></i></span>
            <span class="add-on add-on-middle add-on-mini minimizeTable"><i class="icon-caret-down"></i></span>
            <span class="add-on add-on-last add-on-mini removeTable"><i class="icon-remove"></i></span>
        </div>
    </form>

</div>

<div class="floatingBox table">
<div class="container-fluid">


    <?php
        $columns = array('id', 'title', 'alias');
        foreach( Yii::app()->params['languages'] as $key => $value ){
        $columns[]  = array(
        'header' => '<div align="center"><img src="/uploads/flag/'.$key.'.png" /></div>',
        'value' => '$data->languageButton("'.$key.'")' ,
        'type' => 'raw',
        'htmlOptions'=>array( 'style'=>'text-align: center' )
        );
        }
        $columns[] = array(
        'class'=>'ButtonColumn',
        'template'=>'{delete}',
        'buttons'=>array(
                'delete' => array
                (
                    'label'=>'<span class="label red" ><i class="icon-trash delete" title="'.Yii::t('adminlang', 'Delete').'"></i></span>',
                    'options' => array( 'class' => 'tipb delete-icon-tooltip',
                        'data-original-title' => Yii::t('adminlang', 'Delete'),
                        'title'       => Yii::t('adminlang', 'Delete') , ),
                ),
            ),
        );
        $this->widget('zii.widgets.grid.CGridView', array(
        'id'=>'custompages-grid',
        'htmlOptions' => array('class' => 'table table-bordered table-hover table-striped'),
        'dataProvider'=>$model->search(),
        'filter'=>$model,
        'columns'=> $columns
        ));
    ?>

</div>
</div>

</div>
</div>

</div>
<script>
    $('.update-icon-tooltip').tooltip({
    });
    $('.view-icon-tooltip').tooltip({
    });
    $('.delete-icon-tooltip').tooltip({
    });
</script>