<?php

/*
 * DateTimeI18NBehavior
 * Automatically converts date and datetime fields to I18N format
 * 
 * Author: Ricardo Grana <rickgrana@yahoo.com.br>, <ricardo.grana@pmm.am.gov.br>
 * Version: 1.1
 * Requires: Yii 1.0.9 version 
 */

class DateTimeI18NBehavior  extends CActiveRecordBehavior
{
	public $dateOutcomeFormat = 'Y-m-d';
	public $dateTimeOutcomeFormat = 'Y-m-d H:i:s';

	public $dateIncomeFormat = 'yyyy-MM-dd';
	public $dateTimeIncomeFormat = 'yyyy-MM-dd hh:mm:ss';

	public function beforeSave($event){
        if (defined('IS_CRON')) return true;

      /*  if ($this->Owner->tableName() == 'sync')
            return true;*/

		//search for date/datetime columns. Convert it to pure PHP date format
		foreach($event->sender->tableSchema->columns as $columnName => $column){
		  
						
			if (($column->dbType != 'date') and ($column->dbType != 'datetime') ) continue;
			
			if ($column->dbType == 'time') {
                
                if ($event->sender->$columnName == '' || $event->sender->$columnName == '00:00:00') continue;
                
                if (strpos($event->sender->$columnName, 'AM') !== false){
				    $event->sender->$columnName = str_replace('AM', ':00', $event->sender->$columnName);
				}
                else if (strpos($event->sender->$columnName, 'PM') !== false){
				    $event->sender->$columnName = str_replace('PM', ':00', $event->sender->$columnName);
                    $tmp = explode(':', $event->sender->$columnName);
                    
                    $event->sender->$columnName = ($tmp[0] + 12).':'.$tmp[1].':'.$tmp[2];
				}
			}
            else if (($column->dbType == 'date')) {	
                if ($event->sender->$columnName){
                    if (strpos($event->sender->$columnName, '-') === false)
                        $event->sender->$columnName = date($this->dateOutcomeFormat, CDateTimeParser::parse($event->sender->$columnName, Yii::app()->locale->dateFormat));
                }
				    
			}else{
			     $event->sender->$columnName = str_replace(array('vorm.', 'nachm.'), array('AM', 'PM'), $event->sender->$columnName );
			     if ($event->sender->$columnName && $event->sender->$columnName != 'NULL')
    			 	$event->sender->$columnName = date($this->dateTimeOutcomeFormat, 
    					strtotime($event->sender->$columnName));
                    
                if ($columnName == 'updated'){
                   $event->sender->$columnName = date('Y-m-d H:i:s');
				}
                else if ($this->Owner->isNewRecord && $columnName == 'created'){
                    $event->sender->$columnName = date('Y-m-d H:i:s'); 
                }	
			}
		}
        
		return true;
	}
    public function afterSave($event){
        if (defined('IS_CRON')) return true;
    }
/*    public function afterDelete($event){
        if(defined('IS_CRON')) return true;

        if( $this->Owner->tableName() == 'sync' )
            return true;

        if ( in_array( $this->Owner->tableName(), Yii::app()->params->sync_tables)){
            $sync               = new Sync();
            $sync->created      = date('Y-m-d H:i:s');
            $sync->table_name   = $this->Owner->tableName();
            $sync->object_id    = $this->Owner->id;
            $sync->type         = 1;
            $sync->save();
        }
        return true;
    }*/

	public function afterFind($event){
        if (defined('IS_CRON')) return true;

        foreach($event->sender->tableSchema->columns as $columnName => $column){
						
			if (($column->dbType != 'date') and ($column->dbType != 'datetime')  and ($column->dbType != 'timestamp')) continue;
			
			if (!strlen($event->sender->$columnName)){ 
				$event->sender->$columnName = null;
				continue;
			}
			
			if ($column->dbType == 'date'){			
                if ($event->sender->$columnName == '0000-00-00')
                    $event->sender->$columnName = '';
                else
				    $event->sender->$columnName = Yii::app()->dateFormatter->formatDateTime(
								CDateTimeParser::parse($event->sender->$columnName, $this->dateIncomeFormat),'medium',null);
			}else{
			 	if ($event->sender->$columnName == '0000-00-00 00:00:00')
                    $event->sender->$columnName = '';
                else
				    $event->sender->$columnName =  Yii::app()->dateFormatter->formatDateTime(
    							CDateTimeParser::parse($event->sender->$columnName,	$this->dateTimeIncomeFormat), 
							'medium', 'medium');
			}
		}
		return true;
	}
}