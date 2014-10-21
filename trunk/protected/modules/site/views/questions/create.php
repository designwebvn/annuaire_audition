 <div id="wrapper-indexC">

    <div class="spacer">
      <div class="contain-qs">
        <table class="" width="100%" border="0" align="left" style="padding-top:9px; background-color:#f6f6f6;">
        
            <tr>
                <td width="100%" style="vertical-align:top;">
                    <div class="shopping-cart"> <span class="address" style="padding-left: 15px; font: 24px;"><?php echo Yii::t('global','Questions'); ?></span></div>
                    <div style="width:100%; float:left;">
    <a href="/questions/create#takeqs" class="btn btnqs"><i class="fa fa-question-circle"></i><?php echo Yii::t('global','Take a question')?></a>
    <?php   
      $this->widget('zii.widgets.CListView',array(      
      'dataProvider'=> $dataProvider,               
      'itemView'=>'../elements/question_box',
      'id'=>'clearfix',
                                                                                                       
          ) ); ?>
    
            </div>

                </td>
            </tr>
           
           <tr><td style="height: 35px;">
           </td></tr>
           <tr>
           <td >
           
           <div class="blockquote" id="">
                <div id="takeqs"><?php echo $this->renderPartial('_form', array('model'=>$model)); ?></div>
          </div>
           
           </td>
           </tr>
           <tr><td style="height: 35px;">
           </td></tr>
        </table>
        
     
          
         </div>
        
        </div>
     
     
    
    <div class="spacer fix-bottom-question"></div>
</div>