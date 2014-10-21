<div class="artcl-main float-width">
    <div class="artcl-prev-nxt float-width">
    </div>
    <div class="artcl-body float-width">
        <h2><?php  echo $model->title;?></h2>
        <h5>
            <span><i class="fa fa-clock-o"></i><?php echo Utils::fomatDateCeate($model->created); ?></span>
            <span><i class="fa fa-comment-o"></i><?php echo Videos::model()->totalCommentById( $model->id ); ?></span>
        </h5>
        <article class="float-width articl-data">
            <script type="text/javascript" src="http://releases.flowplayer.org/js/flowplayer-3.2.12.min.js"></script>
            <div class="content-detail-video"><?php echo Videos::model()->getVideoFrontEnd($model->video); ?></div>
            <div><?php  echo $model->description;?></div>
        </article>
    </div>
</div>

