<?php if($comments ):  ?>
    <div class="comments-section float-width">

        <?php foreach($comments as $comment): ?>
            <?php
            $date 	 = Utils::fomatDateCeate($comment->created);  ?>
            <div class="single-comment">
                <img alt="" class="blocky" src="/themes/default/img/comment2.png" />
                <div class="the-comment lefty">
                    <h4>
                        <span class="comntr-nm lefty"><?php echo $comment->author; ?></span>
                        <span class="cmnt-dt lefty">at <?php echo $date; ?></span>
                    </h4>
                    <p><?php echo $comment->content; ?></p>
                </div>
            </div>
        <?php endforeach; ?>

    </div>
<?php endif;  ?>