
<?php

	$cats = array(19,8,6);

	foreach ($cats as $cat_id) {
		$catProduct  =  Products::model()->renCatproduct($cat_id);
		if($catProduct){
		 	echo $catProduct;
		}
	}
	
?>