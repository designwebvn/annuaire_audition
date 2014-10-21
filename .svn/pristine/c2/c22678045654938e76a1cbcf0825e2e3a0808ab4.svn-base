<script>
    $(document).ready(function() {

        $('#calendar').fullCalendar({
            header: {
                left: '',
                center: 'title',
                right: 'month,agendaWeek,agendaDay prev,today,next'
            },
            defaultDate: '<?php echo date("Y-m-d");  ?>',
            editable: true,
            eventLimit: true, // allow "more" link when too many events
            events: [
                <?php
                    foreach ( $events as $val ){ ?>
                {
                    title: '<?php echo $val["name"];  ?>',
                    url: '/event/<?php echo $val["id"]."-".Yii::app()->func->makeAlias( $val["name"] );  ?>',
                    start: '<?php echo Utils::dateToIso8601( $val["starting_date"] ); ?>',
                    end: '<?php echo Utils::dateToIso8601( $val["ending_date"] ); ?>'
                },
                <?php    }
                ?>
              /*
                {
                    title: 'Click for Google',
                    url: 'http://google.com/',
                    start: '2014-09-28'
                }*/
            ]
        });

    });

</script>
<div class="container">
    <div class="float-width ticker">
        <h3 class="cat-label1"><a href="/"> <?php  echo Yii::t('global', 'Home'); ?> </a> </h3>
        <ul>
            <li style="margin-top: 0px;">
                <h4> <a href="/events"> <?php echo Yii::t('global','Events'); ?>  </a> </h4>
            </li>
        </ul>
    </div>
    <div class="main-left-side fix-events-around">
        <div style="padding-top: 35px;">

        </div>
        <div class="floatingBox">
            <div class="container-fluid">
                <div id='calendar'></div>
            </div>
        </div>

    </div>
    <?php $this->renderPartial('/elements/sidebar_right'); ?>
</div>
