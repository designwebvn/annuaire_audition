<?php
class SyncCommand extends CConsoleCommand {
    public function run($args) {
        $soap_request  = "<?xml version=\"1.0\"?>\n";
        $soap_request .= "<soap:Envelope xmlns:soap=\"http://www.w3.org/2001/12/soap-envelope\" soap:encodingStyle=\"http://www.w3.org/2001/12/soap-encoding\">\n";
        $soap_request .= "  <soap:Body xmlns:m=\"http://www.example.org/stock\">\n";
        $soap_request .= "    <m:run>\n";
        $soap_request .= "    </m:run>\n";
        $soap_request .= "  </soap:Body>\n";
        $soap_request .= "</soap:Envelope>";

        $header = array(
            "Content-type: text/xml;charset=\"utf-8\"",
            "Accept: text/xml",
            "Cache-Control: no-cache",
            "Pragma: no-cache",
            "SOAPAction: \"run\"",
            "Content-length: ".strlen($soap_request),
        );

        $soap_do = curl_init();
        curl_setopt($soap_do, CURLOPT_URL, Yii::app()->params->api_url.'/webservice/sync/init');
        curl_setopt($soap_do, CURLOPT_CONNECTTIMEOUT, 10);
        curl_setopt($soap_do, CURLOPT_TIMEOUT,        10);
        curl_setopt($soap_do, CURLOPT_RETURNTRANSFER, true );
        curl_setopt($soap_do, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($soap_do, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($soap_do, CURLOPT_POST,           true );
        curl_setopt($soap_do, CURLOPT_POSTFIELDS,     $soap_request);
        curl_setopt($soap_do, CURLOPT_HTTPHEADER,     $header);

        $data = curl_exec($soap_do);
        if($data !== false) {
            curl_close($soap_do);
            $rows = json_decode($data);

            foreach ($rows as $data){
                $model_name = Utils::table2model($data->table);

                if ($data->table == 'message')
                    $model = $model_name::model()->findByAttributes(array('id' => $data->data->id, 'language' => $data->data->language));
                else
                    $model = $model_name::model()->findByPk($data->data->id);
                if( $data->data->id == 1 ){
                    if (!$model) $model = new $model_name();{
                        $model->model()->findbyPk( $data->data->object_id )->delete();
                    }
                }
                else{
                    $attributes = (Array) $data->data;
                    if (!$model) $model = new $model_name();
                    $model->attributes = $attributes;
                    $model->save();
                }
            }
        }
    }
}