<?php
	$videoMain  =  Videos::model()->getVideoByType($type=0,$postion=0);
	$videoSubs   =  Videos::model()->getVideoByType($type=0,$postion =1);
?>
<?php if(($videoMain) || ($videoSubs)) : ?>
<div class="news-sec-2 float-width">
	<div class="float-width sec-cont3">
		<h3 class="sec-title"><a href="/hearing-TV"><?php echo Yii::t('global','Hearing TV'); ?> </a></h3>
		<div class="polls-cont">
			<div class="polls-left blocky">
				<?php
					if($videoMain){

						$data = $videoMain[0];
						$name = $data['title'];
						$description = Utils::short_description(strip_tags($data['description']),300);
						$date 	 	 = Utils::fomatDateCeate($data["created"]);
						$video 		 = $data['video'];
						$flash = Yii::app()->themeManager->baseUrl.'/plugin/jwplayer/jwplayer.swf';
						$js 	= Yii::app()->themeManager->baseUrl . '/plugin/jwplayer/jwplayer.js';
						$images 	 = '/uploads/video/'.$data['pictures'];
						if($video){
							$video = Yii::app()->params['homeUrl'].'/uploads/video/'.$video;
							echo "<script type='text/javascript' src='".$js."'></script><div id='mediaspace'></div>
										<script type='text/javascript'>
										jwplayer('mediaspace').setup({
										flashplayer: '".$flash."',
										file: '".$video."',
										image: '".$images."',
										width: '346',
										height: '195',
										autostart: 'false',
										});
								</script>";
						}						
						echo '<div class="pol-lft-txt">
								<h4 class="float-width"><a href="/hearing-tv/detail/'.$data->alias.'">'.$name.'</a></h4>
								<h6><span><i class="fa fa-clock-o"></i>'.$date.'</span></h6>
								<p class="float-width">'.$description.'</p>
							</div>';
					}
				?>
			</div>
			<div class="polls-right lefty">
				<?php
					if($videoSubs){
						foreach ($videoSubs as $key => $videoSub) {

								$name = $videoSub['title'];
								$description = Utils::short_description(strip_tags($videoSub['description']),80);
								$date 	 	 = Utils::fomatDateCeate($videoSub["created"]);
								$video 		 = $videoSub['video'];
								$video 		 = $videoSub['video'];
								$images 	 = Videos::renImageVideo($videoSub['pictures']);

							echo '<div class="pol-rt-sm float-width">
								<a href="/hearing-tv/detail/'.$videoSub['alias'].'" class="lefty pol-rt-img">'.$images.'</a>
								<h5><a href="/hearing-tv/detail/'.$videoSub['alias'].'">'.$name.'</a></h5>
								<h6 class="lefty"><span><i class="fa fa-clock-o"></i>'.$date.'</span></h6>
								<p>'.$description.'</p>
							</div>';
						}
						
					}
				?>
			</div>
		</div>
	</div>
</div>
<?php endif; ?>