<?php
    //Temporary
    $criteria = new CDbCriteria();
    $criteria->condition = "best_seller = ".Products::STATUS_BEST_SELLER_ACTIVE." AND is_active =".Products::STATUS_ACTIVE;
    $criteria->limit = Yii::app()->settings->number_best_seller;
    $criteria->order ="id DESC";
    $topProduct = new CActiveDataProvider('Products', array(
        'pagination'=>false,
        'criteria'=>$criteria,
    ));
?>
<div class="top-product">
            <?php

               $this->widget('zii.widgets.CListView', array(
                            'dataProvider'=>$topProduct,
                            'itemView'=>'../elements/top_product_index',
                            'summaryText'=>'',
                            'viewData' => array(
                                'itemCount' => $topProduct->getItemCount(),
                            ),

                        ));
            ?>
</div>



