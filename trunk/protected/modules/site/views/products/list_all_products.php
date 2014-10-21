<?php

$image 	 = Products::model()->renImageProduct($data->image,$alt='',$class='blocky');
$comment = News::model()->countNewByCategory($data->id);
$date 	 = Utils::fomatDateCeate($data->created);
$description = Utils::short_description(strip_tags($data->description),250);
$linkNews = '/articles/view/'.$data->alias;

?>
<div class="sec-1-big float-width">
    <?php echo $image; ?>
    <div class="sec-1-big-text lefty">
        <h3><a href="<?php echo $linkNews; ?>"><?php echo $data->name; ?></a></h3>
        <h6>
            <span><i class="fa fa-clock-o"></i><?php echo $date; ?></span>
            <span><i class="fa fa-comment-o"></i><?php echo $comment; ?></span>
        </h6>
        <p><?php echo $description; ?></p>
    </div>
</div>