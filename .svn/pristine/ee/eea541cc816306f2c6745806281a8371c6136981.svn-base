<script>

    $(document).ready(function() {

        $('#calendar').fullCalendar({
            header: {
                left: '',
                center: 'title',
                right: 'month,agendaWeek,agendaDay prev,today,next'
            },
            defaultDate: '<?php echo Utils::dateToIso8601( $event->starting_date ); ?>',
            defaultView: 'month',
            editable: true,
            events: [
                {
                    title:  '<?php echo $event->name; ?>',
                    url: '/event/<?php echo $event->id."-".Yii::app()->func->makeAlias( $event->name );  ?>',
                    start:  '<?php echo Utils::dateToIso8601( $event->starting_date ); ?>',
                    end:    '<?php echo Utils::dateToIso8601( $event->ending_date ); ?>'
                }
            ]
        });

    });

</script>
<style>
    #calendar {
        max-width: 900px;
        margin: 0 auto;
    }
</style>
<div class="container">
    <div class="float-width ticker">
        <h3 class="cat-label1"><a href="/"> <?php  echo Yii::t('global', 'Home'); ?> </a> </h3>
        <ul>
            <li style="margin-top: 0px;">
                <h4> <a href="/events"> <?php echo Yii::t('global','Events'); ?>  </a> > <a href="/event/<?php echo $event->id ?>-<?php echo Yii::app()->func->makeAlias( $event->name ); ?>"> <?php echo $event->name; ?> </a> </h4>
            </li>
        </ul>
    </div>
    <div class="main-left-side fix-events-around">
            <div style="padding-top: 35px;"></div>
            <div class="floatingBox">
                <div class="container-fluid">
                    <div id='calendar'></div>
                    <div class="content-event"> <div class="image-event-detail"> <img src="/themes/default/img/events-calendar.png"> </div><div class="name-event-detail"><h1> <?php echo $event->name; ?> </h1></div> </div>
                    <ul class="view-events">
                        <li><div class="title-event-detail"><?php echo Yii::t('global','Start date'); ?></div> <div class="content-event-detail"> <?php echo $event->starting_date; ?></div></li>
                        <li><div class="title-event-detail"><?php echo Yii::t('global','Ending date'); ?></div> <div class="content-event-detail"><?php echo $event->ending_date; ?></div></li>
                        <li><div class="title-event-detail"><?php echo Yii::t('global','Location'); ?></div> <div class="content-event-detail"><?php echo $event->location; ?> </div> </li>
                        <li><div class="title-event-detail"><?php echo Yii::t('global','Type'); ?></div> <div class="content-event-detail"><?php echo Events::model()->getEventsCategory( $event->type_events, 1 ); ?></div></li>
                        <li><div class="title-event-detail"><?php echo Yii::t('global','Organizer'); ?></div> <div class="content-event-detail"><?php echo Events::model()->getOrganizer( $event->organizer_id, 1 ); ?></div></li>
                        <li><div class="title-event-detail"><?php echo Yii::t('global','Address'); ?></div> <div class="content-event-detail"><?php echo $event->address; ?></div></li>
                        <li><div class="title-event-detail"><?php echo Yii::t('global','City'); ?></div> <div class="content-event-detail"><?php echo $event->city; ?></div></li>
                        <li><div class="title-event-detail"><?php echo Yii::t('global','Zip'); ?></div> <div class="content-event-detail"><?php echo $event->zip; ?></div></li>
                        <li><div class="title-event-detail"><?php echo Yii::t('global','Description'); ?></div> <div class="content-event-detail"><?php echo $event->description; ?></div></li>
                        <li><div class="title-event-detail"><?php echo Yii::t('global','Website 1'); ?></div> <div class="content-event-detail"><?php echo CHtml::link(CHtml::encode($event->website1), $event->website1, array('target'=>'_blank')); ?></div></li>
                        <li><div class="title-event-detail"><?php echo Yii::t('global','Website 2'); ?></div> <div class="content-event-detail"><?php echo CHtml::link(CHtml::encode($event->website2), $event->website2, array('target'=>'_blank')); ?></div></li>
                        <?php if(isset($event->pdf)): ?>
                        <li><div class="title-event-detail"><?php echo Yii::t('global','Pdf file'); ?></div> <div class="content-event-detail"><?php echo CHtml::link(CHtml::encode($event->pdf), Yii::app()->baseUrl . '/uploads/events/pdf/'.$event->pdf); ?></div></li>
                        <?php endif ?>
                    </ul>

                </div>
            </div>
        <div style="padding-top: 35px;"></div>
        </div>
    <?php $this->renderPartial('/elements/sidebar_right'); ?>
</div>
