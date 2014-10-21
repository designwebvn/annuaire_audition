<?php class Utils {
    function number_format($value){
        return number_format($value, 2, ',', '.');
    }
    function date_format($value, $type='datetime'){
        if (!is_numeric($value))
            $value = strtotime($value);
            
        if ($type == 'date') $format = 'd.m.Y';
        else $format = 'd.m.Y h:i A';
        
        return date($format, $value);
    }

    function CER($price){ // Convert Exchange Rate
        $lang = Yii::app()->language;
        if($lang =='en'){
            $exchangeRate = self::getExchangeRate();
            if(isset($exchangeRate->exchange_rate)) {
                $price_exchange = $price * $exchangeRate->exchange_rate;
                $icon = $exchangeRate->currency->text;
            } else {
                $price_exchange = $price;
                $icon = '$';
            }
            $end_price = $price_exchange -($price_exchange * (Yii::app()->settings->decrease_price/100)) + ($price_exchange * (Yii::app()->settings->increase_price/100));
            return $icon." ".number_format($end_price, 2, ',', '.');
        } else {
            $exchangeRate = self::getExchangeRate();
            if(isset($exchangeRate->exchange_rate)){
                $price_exchange = $price * $exchangeRate->exchange_rate;
                $icon = $exchangeRate->currency->text;
            }else {
                $price_exchange = $price;
                $icon = '$';
            }
            $end_price = $price_exchange -($price_exchange * (Yii::app()->settings->decrease_price/100)) + ($price_exchange * (Yii::app()->settings->increase_price/100));
            return $icon." ".number_format($end_price, 2, ',', '.');
        }

    }

    function CERNoPro($price){ // Convert Exchange Rate
        $lang = Yii::app()->language;
        if($lang =='en'){
            $exchangeRate = self::getExchangeRate();
            if(isset($exchangeRate->exchange_rate)) {
                $price_exchange = $price * $exchangeRate->exchange_rate;
                $icon = $exchangeRate->currency->text;
            } else {
                $price_exchange = $price;
                $icon = '$';
            }
            return $icon." ".number_format($price_exchange, 2, ',', '.');
        } else {
            $exchangeRate = self::getExchangeRate();
            if(isset($exchangeRate->exchange_rate)){
                $price_exchange = $price * $exchangeRate->exchange_rate;
                $icon = $exchangeRate->currency->text;
            }else {
                $price_exchange = $price;
                $icon = '$';
            }
            return $icon." ".number_format($price_exchange, 2, ',', '.');
        }

    }
    public function getExchangeRate(){
        $currency =Yii::app()->session['currency'];
        if($currency == null){
            $currency = self::getCurrency();
        }
        $criteria = new CDbCriteria();
        $criteria->condition ="currency_id=".$currency;
        $criteria->order = " date DESC";
        $exchange = ExchangeRate::model()->find($criteria);
        if($exchange){
            return $exchange;
        } else {
            return 1;
        }
    }
    public function getCurrency(){
        $lang= Yii::app()->language;
        $sql = "SELECT * FROM languages where region_code = '{$lang}'";
        $currency_id =  Languages::model()->findBySql($sql);
        if($currency_id){
            return $currency_id->currency_id;
        } else {
            return 0;
        }
    }
    function sendMail($from, $to, $subject, $message){
        $email = Yii::app()->email;
		$email->subject = $subject;
		$email->to = $to;
		$email->from = $from;
		$email->replyTo = $from;
		$email->message = $message;
		return $email->send();
    }
    
    function number_format_compare($value){
        return number_format($value, 2, '.', '.');
    }
    
    function  short_description( $title = '', $limit = 60 ){
   	    if (strlen($title) > $limit) {
            $title=substr($title, 0, $limit);
   	    	       return $title=substr($title,0,strrpos($title,' '));
                  
                      }
                  else {
                    return  $title=$title;
                   }
   	    
    }
    function date_format24h( $value, $option=0 ){
        $datetime = '';
        if($value!=''){
            if( $option == 1 )
                $datetime = date("d.m.Y H:i:s",strtotime($value));
            else
                $datetime = date("d/m/Y H:i:s",strtotime($value));
        }

        $datetimenew = ( $datetime =='01/01/1970 00:00:00' )? '':$datetime;
        return $datetimenew;
    }

    function date_formatStrtotime( $value, $option=0 ){
        $datetime = '';
        if($value!=''){
            if( $option == 1 )
                $datetime = date("d.m.Y H:i:s",$value);
            else
                $datetime = date("d/m/Y H:i:s",$value);
        }

        $datetimenew = ( $datetime =='01/01/1970 00:00:00' )? '':$datetime;
        return $datetimenew;
    }
   
    function seoUrl($string) {
        $string = strtolower($string);
        //Strip any unwanted characters
        $string = preg_replace("/[^a-z0-9_\s-]/", "", $string);
        //Clean multiple dashes or whitespaces
        $string = preg_replace("/[\s-]+/", " ", $string);
        //Convert whitespaces and underscore to dash
        $string = preg_replace("/[\s_]/", "-", $string);
        return $string;
    }


    function getLocationInfoByIp(){
        if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
            $ip = $_SERVER['HTTP_CLIENT_IP'];
        } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
            $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
        } else {
            $ip = $_SERVER['REMOTE_ADDR'];
        }
        $result  = array('country'=>'');
        $ip_data = @json_decode(file_get_contents("http://www.geoplugin.net/json.gp?ip=".$ip));
        if($ip_data && $ip_data->geoplugin_countryName != null){
            $result['country'] = $ip_data->geoplugin_countryCode;

        }
        return $result['country'];
    }

    public function setLangAndCurrency(){
        $locationCode =  Utils::getLocationInfoByIp();
        $allCountry = Languages::model()->findAll();
        $listLang= 0;
        foreach($allCountry as $country){
            if(strtolower($country->ISO_country_code) == strtolower($locationCode) ){
                Yii::app()->language = $country->region_code;
                Yii::app()->session['currency'] = $country->currency_id;
                $listLang =1;
            }
        }
        if($listLang == 0){
            Yii::app()->language = 'en';
            //Yii::app()->session['currency'] = "";
        }
    }
    
    function slugify_new( $text ){ 
      $text = strtolower(str_replace(' ', '_', $text));
      $text = strtolower(str_replace('~[^-\w]+~', '', $text));
      $text = strtolower(str_replace("'", '', $text));	
      if (empty( $text )){
        return ' ';
      }
        return $text;
    }
   
    function rmdirfile($dir) {
       if (is_dir($dir)) {
             $objects = scandir($dir);
             foreach ($objects as $object) {
               if ($object != "." && $object != "..") {
                 if (filetype($dir."/".$object) == "dir") rmdir($dir."/".$object); else unlink($dir."/".$object);
               }
             }
             reset($objects);
             rmdir($dir);
         }
    }

    public function getTypeCustomizeTheme( $type, $name, $modelName = 'SiteTemplates' ){
        $value = isset( $setting->value ) ? $setting->value : '';

        switch( $type )
        {
            case 'textarea':
            echo CHtml::textArea( $name, $value, array( 'rows' => 5, 'class' => 'text-input' ) );
            break;

            case 'editor_full':
            $this->createWidget('application.widgets.ckeditor.CKEditor', array( 'name' => $name, 'value' => $value, 'editorTemplate' => 'full' ))->run();
            break;

            case 'dropdown':
            echo CHtml::dropDownList( $name, $value, $this->convertExtraToArray( $setting->extra ), array( 'class' => 'text-input' ) );
            break;

            case 'image':
            echo '<input type="file" name="'.$modelName.'['.$name.']" value="" />';
            break;

            case 'text':
            default:
            echo CHtml::textField( $modelName.'['.$name.']', $value, array( 'class' => 'text-input medium-input' ) );
            break;
        }
    }

    static function table2model($table){
        $tmp = explode('_', $table);
        for ($i = 0; $i < count($tmp); $i ++){
            $tmp[$i] = ucfirst($tmp[$i]);
        }

        $model_name = implode('', $tmp);

        if ($model_name == 'Sourcemessage')
            $model_name = 'SourceMessage';
        else if ($model_name == 'Customsupportpages')
            $model_name = 'CustomSupportPages';
        else if ($model_name == 'Blogcomments')
            $model_name = 'BlogComments';
        else if ($model_name == 'Custompages')
            $model_name = 'CustomPages';
        else if ($model_name == 'Settingscats')
            $model_name = 'SettingsCats';
        else if ($model_name == 'Blogcats')
            $model_name = 'BlogCats';


        return $model_name;
    }

    function remove_http($url = '')
    {
        if ($url == 'http://' OR $url == 'https://')
        {
            return $url;
        }
        $matches = substr($url, 0, 7);
        if ($matches=='http://')
        {
            $url = substr($url, 7);
        }
        else
        {
            $matches = substr($url, 0, 8);
            if ($matches=='https://')
                $url = substr($url, 8);
        }
        $url = str_replace('/', '', $url);
        return $url;
    }
    function fomatDateCeate($data){
        $date = new DateTime($data);
        return $date->format('d M Y');
    }

    public function getStatusCommon(){
        return array( Yii::t('global','No'), Yii::t('global','Yes') );
    }

    public function getTitleCommon(){
        return array( 'Mr'=>Yii::t('admin','Mr'), 'Me'=>Yii::t('admin','Me'), 'Miss'=>Yii::t('admin','Miss') );
    }

    public function getTypeOfTraining(){

    }

    public function dateToIso8601( $date ){
        return date(DATE_ISO8601, strtotime( $date ));
    }

}
	