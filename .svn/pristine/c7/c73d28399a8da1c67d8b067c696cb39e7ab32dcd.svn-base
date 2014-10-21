<!-- Main Right side -->
<div class="main-right-side">
    <?php $this->renderPartial('/elements/right-banner'); ?>


    <div class="flkr-cont lefty">
        <div class="tabs-elements float-width">
            <h3 class="sec-title"><?php echo Yii::t('global','Most Popular'); ?></h3>
            <!-- Nav tabs -->
            <ul class="nav nav-tabs magalla-tabz-ul">
                <li class="active"><a data-toggle="tab" href="#tab1"><?php echo Yii::t('global','News'); ?></a></li>
                <li class=""><a data-toggle="tab" href="#tab2"><?php echo Yii::t('global','Videos'); ?></a></li>
                <li class=""><a data-toggle="tab" href="#tab3"><?php echo Yii::t('global','Articles'); ?></a></li>
            </ul>
            <!-- Tab panes -->
            <div class="tab-content magalla-tabz-cont" style="background: #ffffff;">
                <div id="tab1" class="tab-pane fade  active in">
                    <?php
                        $var_limit = 7;
                        $news = News::model()->findAll('is_active = '.News::STATUS_ACTIVE.' ORDER BY id DESC LIMIT '.$var_limit);
                        $i = 1;
                        foreach( $news as $new ):
                    ?>
                    <div class="content-most-popular <?php if($i==$var_limit) echo 'fix-border-bottom-popular'; ?>"  >
                        <div class="img-most-popular">
                            <a href="/news/view/<?php echo $new['alias']; ?>"> <img src="/uploads/news/<?php echo $new['image']; ?>"> </a>
                        </div>
                        <div class="description-most-popular">
                            <div class="title-in-most-popular"><a href="/news/view/<?php echo $new['alias']; ?>"> <?php echo $new['title']; ?> </a> </div>
                            <div class="description-in-most-popular"><?php echo Utils::short_description(strip_tags($new['description']),100); ?> </div>
                        </div>
                    </div>
                    <div style="clear: both;"></div>
                    <?php
                        $i++;
                        endforeach; ?>
                </div>
                <div id="tab2" class="tab-pane fade">
                    <?php
                    $videos = Videos::model()->findAll('is_home = '.Videos::STATUS_ACTIVE.' ORDER BY id DESC LIMIT '.$var_limit );
                    $i = 1;
                    foreach( $videos as $video ):
                        ?>
                        <div class="content-most-popular <?php if($i==$var_limit) echo 'fix-border-bottom-popular'; ?>"  >
                            <div class="img-most-popular">
                                <a href="/hearing-tv/detail/<?php echo $video['alias']; ?>"> <img src="/uploads/video/<?php echo $video['pictures']; ?>"> </a>
                            </div>
                            <div class="description-most-popular">
                                <div class="title-in-most-popular"><a href="/hearing-tv/detail/<?php echo $video['alias']; ?>"> <?php echo $video['title']; ?> </a> </div>
                                <div class="description-in-most-popular"><?php echo Utils::short_description(strip_tags($video['description']),100); ?> </div>
                            </div>
                        </div>
                        <div style="clear: both;"></div>
                        <?php
                        $i++;
                    endforeach; ?>
                </div>
                <div id="tab3" class="tab-pane fade">
                    <?php
                    $products = Products::model()->findAll( 'is_home = '.Videos::STATUS_ACTIVE.' ORDER BY id DESC LIMIT '.$var_limit );
                    $i = 1;
                    foreach( $products as $product ):
                        ?>
                        <div class="content-most-popular <?php if($i==$var_limit) echo 'fix-border-bottom-popular'; ?>"  >
                            <div class="img-most-popular">
                                <a href="/articles/view/<?php echo $product['alias']; ?>"> <img src="/uploads/product/<?php echo $product['image']; ?>"> </a>
                            </div>
                            <div class="description-most-popular">
                                <div class="title-in-most-popular"><a href="/articles/view/<?php echo $product['alias']; ?>"> <?php echo $product['name']; ?> </a> </div>
                                <div class="description-in-most-popular"><?php echo Utils::short_description(strip_tags($product['description']),100); ?> </div>
                            </div>
                        </div>
                        <div style="clear: both;"></div>
                        <?php
                        $i++;
                    endforeach; ?>
                </div>
            </div>
        </div>
    </div>

    <div class="subscribe lefty">
        <h3 class="sec-title"><?php echo Yii::t('global', 'NEWSLETTER'); ?></h3>
        <h6><?php echo Yii::t('global','Subscribe to our newsletter and be first to know about new, products and hearing TV releases.'); ?></h6>
     
            <?php $form=$this->beginWidget('CActiveForm', array(
                                'id'=>'newsletter-form',
                                'action'=> '/index/newsletter',
                                'enableAjaxValidation'=>false,
                                'htmlOptions'=>array(
                                'class'=>'form-horizontal contentForm',
                                'data-validate'=>'parsley',
                                )
                            )); ?>
            <?php $this->widget('widgets.admin.notifications'); ?>
            <div class="form-group">
                    <input type="email" data-required="true" name="Newsletter[email]" class="form-control" id="newsletter" placeholder="Enter your email adress.">
                    <button class="lefty trans1" type="submit"><?php echo Yii::t('global', 'Subscribe')?></button>
            </div>
            <?php $this->endWidget(); ?>
    </div>
    <!-- Calender Widget -->
    <div class="calendar-cont float-width">
        <div id="cal">
            <div class="header float-width">
                <h2 class="month-year lefty w50" id="label">
                    <span id="month" > MAR </span> <span id="year" > 2014 </span>
                </h2>
                <h6 class="float-width">this is today's event details!</h6>
            </div>
            <table id="days">
                <tr>
                    <td>sun</td>
                    <td>mon</td>
                    <td>tue</td>
                    <td>wed</td>
                    <td>thu</td>
                    <td>fri</td>
                    <td>sat</td>
                </tr>
            </table>
            <div id="cal-frame">
                <table class="curr">
                    <tr>
                        <td class="nil"></td>
                        <td class="nil"></td>
                        <td>1</td>
                        <td>2</td>
                        <td>3</td>
                        <td>4</td>
                        <td>5</td>
                    </tr>
                    <tr>
                        <td>6</td>
                        <td>7</td>
                        <td>8</td>
                        <td>9</td>
                        <td>10</td>
                        <td class="today">11</td>
                        <td>12</td>
                    </tr>
                    <tr>
                        <td>13</td>
                        <td>14</td>
                        <td>15</td>
                        <td>16</td>
                        <td>17</td>
                        <td>18</td>
                        <td>19</td>
                    </tr>
                    <tr>
                        <td>20</td>
                        <td>21</td>
                        <td>22</td>
                        <td>23</td>
                        <td>24</td>
                        <td>25</td>
                        <td>26</td>
                    </tr>
                    <tr>
                        <td>27</td>
                        <td>28</td>
                        <td>29</td>
                        <td>30</td>
                        <td class="nil"></td>
                        <td class="nil"></td>
                        <td class="nil"></td>
                    </tr>
                </table>
                <a class="cal-btm-arw trans1 cal-pre">&#59237;</a>
                <a class="cal-btm-arw trans1 cal-nxt">&#59238;</a>
            </div>
        </div>
    </div>

</div>