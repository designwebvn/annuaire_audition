 <div style="clear: both;"></div>
            <div class="container-fluid" style="margin: 0!important; padding: 0 !important;">
            <div class="col-xm-12 col-sm-4 col-md-3 category_home " id="categories" >
                <?php $this->renderPartial('/elements/category') ?>
            </div>

            <div class="col-md-9 col-sm-8 col-xm-12 item_detail">
                <h4 class="our_product" style="text-transform: uppercase;"><?php echo $category->name; ?></h4>
                <div class="container-fluid fix-container-product"  >
                    
                    <?php $this->widget('zii.widgets.CListView', array(
                            'dataProvider'=>$products,
                            'itemView'=>'/elements/result_search',
                        ));
                    ?>
                                 
                </div>
            </div>
            </div>