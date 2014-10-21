<div class="sec-1-big float-width">
    <a href="/hearing-tv/detail/<?php echo $data->alias; ?>"> <?php echo Videos::model()->renImageVideo($data->pictures, '',$class='blocky'); ?> </a>
    <div class="sec-1-big-text lefty">
        <h3><a href="/hearing-tv/detail/<?php echo $data->alias; ?>"><?php echo $data->title; ?></a></h3>
        <h6>
            <span><i class="fa fa-clock-o"></i><?php echo Utils::fomatDateCeate($data->created); ?></span>
            <span><i class="fa fa-comment-o"></i><?php echo Videos::model()->totalCommentById( $data->id ); ?></span>
        </h6>
        <p><?php echo Utils::short_description(strip_tags($data->description),250); ?></p>
    </div>
</div>