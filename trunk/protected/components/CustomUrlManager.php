<?php
/**
 * Custom rules manager class
 *
 * Override to load the routes from the DB rather then a file
 *
 */
class CustomUrlManager extends CUrlManager {
    /**
     * Build the rules from the DB
     */
    protected function processRules() {
		$active_lang = implode('|', array_keys( Yii::app()->params['languages'] ));
		$domain = Yii::app()->params['current_domain'];
		
		// if( ($urlrules = Yii::app()->cache->get('customurlrules')) === false )
		// {
			$_more = array();
			
			$dbCommand = Yii::app()->db->createCommand("SELECT alias, language FROM {{custompages}}")->query();
			$urlRules = $dbCommand->readAll();
			foreach($urlRules as $rule)
			{
				$_more[ "/<alias:({$rule['alias']})>" ] = array('site/custompages/index');
			}

			//set url news category
			$dbCommand = Yii::app()->db->createCommand("SELECT alias FROM {{news_categorys}}")->query();
			$urlRules = $dbCommand->readAll();
			foreach($urlRules as $rule)
			{
				$_more[ "news/category/<alias:({$rule['alias']})>" ] = array('site/news/viewcategory');
			}

			//set url news
			$dbCommand = Yii::app()->db->createCommand("SELECT alias FROM {{news}}")->query();
			$urlRules = $dbCommand->readAll();
			foreach($urlRules as $rule)
			{
				$_more[ "news/view/<alias:({$rule['alias']})>" ] = array('site/news/viewpost');
			}

			//set url Products category
			$dbCommand = Yii::app()->db->createCommand("SELECT alias FROM {{categories}}")->query();
			$urlRules = $dbCommand->readAll();
			foreach($urlRules as $rule)
			{
				$_more[ "articles/category/<alias:({$rule['alias']})>" ] = array('site/products/viewcategory');
			}

			//set url Products
			$dbCommand = Yii::app()->db->createCommand("SELECT alias FROM {{products}}")->query();
			$urlRules = $dbCommand->readAll();
			foreach($urlRules as $rule)
			{
				$_more[ "articles/view/<alias:({$rule['alias']})>" ] = array('site/products/detail');
			}

            //set url Videos
            $dbCommand = Yii::app()->db->createCommand("SELECT alias FROM {{videos}}")->query();
            $urlRules = $dbCommand->readAll();
            foreach($urlRules as $rule)
            {
                $_more[ "hearing-tv/detail/<alias:({$rule['alias']})>" ] = array('site/auditionTV/detail');
            }

			$dbCommand = Yii::app()->db->createCommand("SELECT id, seoname FROM {{members}}")->query();
			$urlUsers = $dbCommand->readAll();
			foreach($urlUsers as $uu)
			{
				$_more[ "/user/<id:({$uu['id']})>-<alias:({$uu['seoname']})>" ] = array('site/users/viewprofile');
			}
            
           	//$dbCommand = Yii::app()->db->createCommand("SELECT alias FROM {{products}}")->query();
			//$urlRules = $dbCommand->readAll();
			$urlRules = array();
			foreach($urlRules as $rule)
			{
				$_more[ "/articles/detail/<alias:({$rule['alias']})>" ] = array('site/products/detail');
			}

			$this->rules = array(

				//-----------------------ADMIN--------------
				"/admin"                        => 'admin/index/index',
                "/admin/articles"               => 'admin/products/index',
                "/admin/articles/create"        => 'admin/products/create',
                "/admin/articles/view"          => 'admin/products/view',
                "/admin/articles/update"        => 'admin/products/update',
                "/admin/articles/delete"        => 'admin/products/delete',
                "/admin/articleComments"        => 'admin/ProductComments/index',
                "/admin/articleComments/create" => 'admin/ProductComments/create',
                "/admin/articleComments/view"   => 'admin/ProductComments/view',
                "/admin/articleComments/update" => 'admin/ProductComments/update',
                "/admin/articleComments/delete" => 'admin/ProductComments/delete',

				"/admin/<_c:([a-zA-z0-9-]+)>" => 'admin/<_c>/index',
				"/admin/<_c:([a-zA-z0-9-]+)>/<_a:([a-zA-z0-9-]+)>" => 'admin/<_c>/<_a>',
				"/admin/<_c:([a-zA-z0-9-]+)>/<_a:([a-zA-z0-9-]+)>//*" => 'admin/<_c>/<_a>/',
				//-----------------------ADMIN--------------

                //gii
                "/gii" => array('gii'),
                "/gii/<_c:([a-zA-z0-9-_]+)>" => array('gii/<_c>/'),
                "/gii/<_c:([a-zA-z0-9-_]+)>/<_a:([a-zA-z0-9-_]+)>/*" => array('gii/<_c>/<_a>/'),

				"/products/category/<alias:.*?>" => 'site/products/category/',
                "/products/active/<type:(lowprice|cent|all)>/" => 'site/products/active/',
                "/products/ended/<type:(lowprice|cent|all)>/" => 'site/products/ended/',
                "/products/upcoming/<type:(lowprice|cent|all)>/" => 'site/products/upcoming/',
                "/products/label/<id:([a-zA-z0-9-_]+)?>" => 'site/products/label/',
                "/articles" => 'site/products/index/',
                
                "/register/" => 'site/profile/create/',
                "/Anmeldung/" => 'site/profile/create/',
                "/guestbook" => 'site/index/guestbook/',
                "/grand-public" => 'site/auditionTV/grandPublic',
                "/videos-pro" => 'site/auditionTV/videosPro',
                "/hearing-TV" => 'site/auditionTV/index',
                "/classified-ads" => 'site/Announcements/index',
                "/formulaire_annonce" => 'site/Announcements/register',
                "/classified-ads/<id:([a-zA-z0-9-_]+)?>" => 'site/Announcements/detail/',
                "/hearing-care-centers" => 'site/directoryOrders/directory',
                "/hearing-aid-suppliers" => 'site/directoryOrders/hearingAidSuppliers',
                "/ENT-doctors" => 'site/directoryOrders/doctors',
                "/instrumentation-ORL" => 'site/directoryOrders/InstrumentationORL',
                "/services-ORL" => 'site/directoryOrders/ServicesORL',
                "/speech-therapists" => 'site/directoryOrders/speechTherapists',
                "/associative-sector" => 'site/directoryOrders/associativeSector',
                "/organizations" => 'site/directoryOrders/organizations',
                "/organizations/type/<alias:.*?>" => 'site/directoryOrders/typeAgency/',
                "/organizations/departement/<alias:.*?>" => 'site/directoryOrders/department/',
                "/organizations/ville/<alias:.*?>" => 'site/directoryOrders/department/',
                "/services/departement/<alias:.*?>" => 'site/directoryOrders/services/',
                "/services/ville/<alias:.*?>" => 'site/directoryOrders/services/',
                "/hospitals/<alias:.*?>/<id:.*?>" => 'site/directoryOrders/hospitals/',
                "/orthophonistes/departement/<alias:.*?>" => 'site/directoryOrders/orthophonistes/',
                "/orthophonistes/ville/<alias:.*?>" => 'site/directoryOrders/orthophonistes/',
                "/speech/<alias:.*?>/<id:.*?>" => 'site/directoryOrders/speech/',
                "/event/<id:([a-zA-z0-9-_]+)?>" => 'site/Events/detail',
                "/laureates-CNA" => 'site/students/laureatesCNA',
                "/espace-pro" => 'site/regulation/espacePro',
                "/appear-directory" => 'site/directoryOrders/appearDirectory',
                "/doctors/departement/<alias:.*?>" => 'site/directoryOrders/doctorsByDepartment/',
                "/doctors/ville/<alias:.*?>" => 'site/directoryOrders/doctorsByDepartment/',
                "/doctor/<alias:.*?>/<id:.*?>" => 'site/directoryOrders/detailDoctor/',

                "/search" => 'site/index/search',
                "/search-advanced" => 'site/index/searchAdvanced',
                "/searchalpha" => 'site/index/searchAlpha',
                "/supports" => 'site/index/supports',
                "/orders/customer/<shop_id:([a-zA-z0-9-_]+)>" => 'site/orders/customer/',
                "/admin/orders/vi_customer/<id:([a-zA-z0-9-_]+)>" => 'site/admin/orders/vi_customer/',
                "/custompages/detail/<alias:.*?>" => 'site/custompages/detail',
                "/products/detail/<id:([a-zA-z0-9-_]+)>" => 'site/products/detail/',
                "/support/detail/<id:([a-zA-z0-9-_]+)>" => 'site/support/detail/',
                "/tags/detail/<slug:([a-zA-z0-9-_]+)>" => 'site/tags/detail/',
                

				"/<_a:(register|login|logout|verify)>" => 'site/users/<_a>',
				"/admin-login" => 'site/users/admin',
				"/affiliate-login" => 'site/users/affiliate',
				"/forgot-password" => 'site/users/lostpassword',
				"/change-password" => 'site/users/changepass',
				"/contact-us" => 'site/contactus/index',
				"/news-letter" => 'site/newsletter/index',
				"/messages" => 'site/usermessages/index',
				"/users-login" => 'site/login/index',
				"/directory-orders" => 'site/directoryOrders/create',
				"/<_a:(viewmessage|sendmessage)>" => 'site/usermessages/<_a>',
				// "/invoices" => 'site/transactions/index',
				// "/buy-a-plan" => 'site/transactions/buyplan',
				// "/<_a:(earning|cashout)>" => 'site/transactions/<_a>',
				// "/<id:(\d+)>-<ualias:(.*?)>/blog/<alias:(.*)>" => array('site/blog/viewpost'),
				// Blogs
				"/blog/category/<alias:(.*)>" => 'site/blog/viewcategory',
				"/blog/view/<alias:(.*)>" => 'site/blog/viewpost',

				"/" => 'site/index/index',
				"/<_c:([a-zA-z0-9-]+)>" => 'site/<_c>/index',
				"/<_c:([a-zA-z0-9-]+)>/<_a:([a-zA-z0-9-]+)>" => 'site/<_c>/<_a>',
				"/<_c:([a-zA-z0-9-]+)>/<_a:([a-zA-z0-9-]+)>//*" => 'site/<_c>/<_a>/',
                
                
               
			);

			$urlrules = array_merge( $_more, $this->rules );
			//Yii::app()->cache->set('customurlrules', $urlrules);
		// }
		
		$this->rules = $urlrules;
		
        // Run parent
        parent::processRules();

    }

	/**
	 * Clear the url manager cache
	 */
	public function clearCache()
	{
		Yii::app()->cache->delete('customurlrules');
	}

    /**
     *
     * @see CUrlManager 
     *
     * Constructs a URL.
     * @param string the controller and the action (e.g. article/read)
     * @param array list of GET parameters (name=>value). Both the name and value will be URL-encoded.
     * If the name is '#', the corresponding value will be treated as an anchor
     * and will be appended at the end of the URL. This anchor feature has been available since version 1.0.1.
     * @param string the token separating name-value pairs in the URL. Defaults to '&'.
     * @return string the constructed URL
     */
    public function createUrl($route,$params=array(),$ampersand='&')
    {
        // We added this by default to all links to show
        // Content based on language - Add only when not excplicity set
		/*if( !isset($params['lang']) )
		{
			$params['lang'] = Yii::app()->language;
		}
		
		if( ( isset($params['lang']) && $params['lang'] === false ) )
		{
			unset($params['lang']);
		}*/
		if( isset($params['lang']) )
		{
			unset($params['lang']);
		}
        // Use parent to finish url construction
        return parent::createUrl($route, $params, $ampersand);
    }
}
