<?php
$image 	 = Videos::model()->renImageVideo($data->pictures,$alt='',$class='blocky');
$comment = Videos::model()->totalCommentById($data->id);
$date 	 = Utils::fomatDateCeate($data->created);
$description = Utils::short_description(strip_tags($data->description),250);
$linkNews = Yii::app()->params['homeUrl'].'/hearing-tv/detail/'.$data->alias;
?>
<div class="sec-1-big float-width">
    <?php echo $image; ?>
    <div class="sec-1-big-text lefty">
        <h3><a href="<?php echo $linkNews; ?>"><?php echo $data->title; ?></a></h3>
        <h6>
            <span><i class="fa fa-clock-o"></i><?php echo $date; ?></span>
            <span><i class="fa fa-comment-o"></i><?php echo $comment; ?></span>
        </h6>
        <p><?php echo $description; ?></p>
    </div>
</div>