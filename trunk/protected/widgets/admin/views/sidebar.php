<?php
// Side bar menu
$this->widget('widgets.NBADMenu', array(
	'activateParents' => true,
	'htmlOptions' => array( 'class' => 'nav' ) ,
	'items' => array(
					// DASHBOARD
					 array( 
							'label' => Yii::t('global', 'System'),
							//'icon' => 'icon-dashboard',
							'itemOptions' => array( 'class' => 'dropdown' ),
							'items' => array(
								array(
									'label' => Yii::t('global', 'Manage Settings'),
									'url' => array('settings/index'),
								),
								array(
									'label' => Yii::t('global', 'Manage Languages'),
									'url' => array('languages/index'),
								),
                                array(
                                    'label' => Yii::t('global', 'Payment Method'),
                                    'url' => array('paymentMethods/index'),
                                ),
							),
						  ),
						//Members
						array(
							'label' => Yii::t('global', 'Users'),
							//'icon' => 'icon-user',
							'itemOptions' => array( 'class' => 'dropdown' ),
							'items' => array(
								array(
									'label' => Yii::t('global', 'Administrators'),
									'url' => array('members/admin'),
								),
								array(
									'label' => Yii::t('global', 'Subadministrators'),
									'url' => array('members/index'),
								),
                                array(
                                    'label' => Yii::t('global', 'Supplier'),
                                    'url' => array('members/supplier'),
                                ),
                                array(
                                    'label' => Yii::t('global', 'Hearing care Center'),
                                    'url' => array('members/hearingCareCenter'),
                                ),
                                array(
                                    'label' => Yii::t('global', 'Hearing care Network'),
                                    'url' => array('members/hearingCareNetwork'),
                                ),
                                array(
                                    'label' => Yii::t('global', 'Directory'),
                                    'url' => array('members/directory'),
                                ),
							),
						),
						//Products
						array(
							'label' => Yii::t('global', 'Articles'),
							//'icon' => 'icon-list',
							'itemOptions' => array( 'class' => 'dropdown' ),
							'items' => array(
								array(
									'label' => Yii::t('global', 'Manage Articles'),
									'url' => array('articles/index'),
								),
								array(
									'label' => Yii::t('global', 'Manage Categories'),
									'url' => array('categories/index'),
								),
								array(
									'label' => Yii::t('global', 'Manage Comments'),
									'url' => array('articleComments/index'),
								),
							),
						),
						

					 // // COMPANY
					 // array( 
						// 	'label' => Yii::t('global', 'COMPANY'), 
						// 	'icon' => 'icon-list',
						// 	'itemOptions' => array( 'class' => 'dropdown' ),
						// 	'items' => array(
						// 			array( 
						// 					'label' => Yii::t('global', 'ADD A COMPANY'), 
						// 					'url' => array('add-company/index'),
						// 				 ),
						// 			array( 
						// 					'label' => Yii::t('global', 'MANAGE COMPANIES'), 
						// 					'url' => array('manage-companies/index'),
						// 				 ),
						// 			array( 
						// 					'label' => Yii::t('global', 'ARCHIVED COMPANIES'), 
						// 					'url' => array('archived-companies/index'),
						// 				 ),
						// 			array( 
						// 					'label' => Yii::t('global', 'MANAGE PRODUCTS'), 
						// 					'url' => array('manage-products/index'),
						// 				 ),
						// 			array( 
						// 					'label' => Yii::t('global', 'MANAGE BRANDS'), 
						// 					'url' => array('manage-brands/index'),
						// 				 ),
						// 			array( 
						// 					'label' => Yii::t('global', 'MULTI CP COMPANY'), 
						// 					'url' => array('multi-company/index'),
						// 				 ),
						// 		 ),	
						//  ),
					 // SALON
					 array( 
							'label' => Yii::t('global', 'News'),
							//'icon' => 'icon-list-alt',
							'itemOptions' => array( 'class' => 'dropdown' ),
							'items' => array(
									array( 
											'label' => Yii::t('global', 'Manage News'),
											'url' => array('news/index'),
										 ),
									array( 
											'label' => Yii::t('global', 'Manage Categories'),
											'url' => array('newsCategorys/index'),
										 ),
									array( 
											'label' => Yii::t('global', 'Manage Comments'),
											'url' => array('newsComments/index'),
										 ),
								 ),	
						 ),
					 // HEARING TV
					 array( 
							'label' => Yii::t('global', 'Hearing TV'),
							//'icon' => 'icon-desktop',
							'itemOptions' => array( 'class' => 'dropdown' ),
							'items' => array(
									array(
										'label' => Yii::t('global', 'Manage Videos'),
										'url' => array('Videos/index'),
									),
                                    array(
                                        'label' => Yii::t('global', 'Manage Categories'),
                                        'url' => array('VideoCategories/index'),
                                    ),
									/*array(
									    'label' => Yii::t('global', 'Manage Comments'),
									 	'url' => array('/admin/videoComments'),
									),*/
								 ),	
						 ),
                        array(
                            'label' => Yii::t('global', 'Suppliers'),
                            //'icon' => 'icon-ok-circle',
                            'itemOptions' => array( 'class' => 'dropdown' ),
                            'items' => array(
                                array(
                                    'label' => Yii::t('global', 'Suppliers'),
                                    'itemOptions' => array( 'class' => 'dropdown-submenu' ),
                                    'items'=>array(
                                        array(
                                            'label' => Yii::t('global', 'Manage Suppliers'),
                                            'url' => array('suppliers/index'),
                                        ),
                                        array(
                                            'label' => Yii::t('global', 'Manage Categories'),
                                            'url' => array('suppliersCategories/index'),
                                        ),
                                        array(
                                            'label' => Yii::t('global', 'Manage Activities'),
                                            'url' => array('activities/index'),
                                        ),
                                        array(
                                            'label' => Yii::t('menu', 'Manage Brands'),
                                            'url' => array('brands/index'),
                                        ),
                                        array(
                                            'label' => Yii::t('global', 'Manage Comment'),
                                            'url' => array('supplierComments/index'),
                                        ),
                                    ),
                                ),
                                array(
                                    'label' => Yii::t('global', 'Products'),
                                    'itemOptions' => array( 'class' => 'dropdown-submenu' ),
                                    'items'=>array(
                                        array(
                                            'label' => Yii::t('menu', 'Manage Products '),
                                            'url' => array('supplierProducts/index'),
                                        ),
                                        array(
                                            'label' => Yii::t('global', 'Manage Chip'),
                                            'url' => array('chips/index'),
                                        ),
                                        array(
                                            'label' => Yii::t('global', 'Manage Range'),
                                            'url' => array('ranges/index'),
                                        ),
                                        array(
                                            'label' => Yii::t('global', 'Manage Comments Products'),
                                            'url' => array('supplierProductsComments/index'),
                                        ),
                                    ),
                                ),
                            ),
                        ),
                       /* array(
                            'label' => Yii::t('global', 'Audio'),
                            //'icon' => 'icon-th-large',
                            'itemOptions' => array( 'class' => 'dropdown' ),
                            'items' => array(
                                array(
                                    'label' => Yii::t('global', 'Manage Networks'),
                                    'url' => array('networks/index'),
                                ),
                                array(
                                    'label' => Yii::t('global', 'Manage Professionals'),
                                    'url' => array('professionals/index'),
                                ),
                                array(
                                    'label' => Yii::t('global', 'Manage Centers'),
                                    'url' => array('centers/index'),
                                ),
                                array(
                                    'label' => Yii::t('global', 'Manage Training Centers'),
                                    'url' => array('trainingCenters/index'),
                                ),
                                array(
                                    'label' => Yii::t('global', 'Manage Comments'),
                                    'url' => array('audiosComments/index'),
                                ),
                            ),
                        ),*/
                    array(
                        'label' => Yii::t('global', 'Announcements'),
                        'itemOptions' => array( 'class' => 'dropdown' ),
                        'items' => array(
                            array(
                                'label' => Yii::t('global', 'Manage Announcements'),
                                'url' => array('announcements/index'),
                            ),
                            array(
                                'label' => Yii::t('global', 'Manage Category Announcements'),
                                'url' => array('announcementCategorys/index'),
                            ),
                        ),
                    ),
					 array( 
							'label' => Yii::t('global', 'Diary'),
							//'icon' => 'icon-tint',
							'itemOptions' => array( 'class' => 'dropdown' ),
							'items' => array(
									/*array(
											'label' => Yii::t('global', 'Events'),
                                             'itemOptions' => array( 'class' => 'dropdown-submenu' ),
                                             'items' => array(*/
                                                 array(
                                                     'label' => Yii::t('global', 'Manage Events'),
                                                     'url' => array('events/index'),
                                                 ),
                                                 array(
                                                     'label' => Yii::t('global', 'Manage Organizers'),
                                                     'url' => array('organizers/index'),
                                                 ),
                                                 array(
                                                     'label' => Yii::t('global', 'Manage Category Events'),
                                                     'url' => array('eventsCategory/index'),
                                                 ),
                                       /*      ),
										 ),*/
                            ),
						 ),
                       /* array(
                            'label' => Yii::t('global', 'Users'),
                            //'icon' => 'icon-asterisk',
                            'itemOptions' => array( 'class' => 'dropdown' ),
                            'items' => array(
                                array(
                                    'label' => Yii::t('global', 'Manage User Account'),
                                    'url' => array('usersAccount/index'),
                                ),
                                array(
                                    'label' => Yii::t('global', 'Manage Module'),
                                    'url' => array('usersModule/index'),
                                ),
                            ),
                        ),*/
					array(
							'label' => Yii::t('global', 'Directorys'),
							//'icon' => 'icon-comment',
							'itemOptions' => array( 'class' => 'dropdown' ),
							'items' => array(
                                 array(
                                            'label' => Yii::t('global', 'Manage Directory Orders'),
                                            'url' => array('directoryOrders/index'),
                                  ),
                                array(
                                    'label' => Yii::t('global', 'Centers'),
                                    'itemOptions' => array( 'class' => 'dropdown-submenu' ),
                                    //'url' => array('centers/index'),
                                    'items'=>array(
                                                array(
                                                    'label' => Yii::t('global', 'Manage Networks'),
                                                    'url' => array('networks/index'),
                                                ),
                                                array(
                                                    'label' => Yii::t('global', 'Manage Professionals'),
                                                    'url' => array('professionals/index'),
                                                ),
                                                array(
                                                    'label' => Yii::t('global', 'Manage Memories Study'),
                                                    'url' => array('memoriesStudy/index'),
                                                ),
                                                array(
                                                    'label' => Yii::t('global', 'Manage Centers'),
                                                    'url' => array('centers/index'),
                                                ),
                                                array(
                                                    'label' => Yii::t('global', 'Manage Category Centers'),
                                                    'url' => array('centersCategory/index'),
                                                ),
                                                array(
                                                    'label' => Yii::t('global', 'Manage Comments'),
                                                    'url' => array('audiosComments/index'),
                                                ),
                                    ),
                                ),
                                array(
                                    'label' => Yii::t('global', 'AGENCIES'),
                                    'itemOptions' => array( 'class' => 'dropdown-submenu' ),
                                    'items'=>array(
                                        array(
                                            'label' => Yii::t('global', 'Manage Agencies'),
                                            'url' => array('agencies/index'),
                                        ),
                                        array(
                                            'label' => Yii::t('global', 'Manage Category'),
                                            'url' => array('agenciesCategory/index'),
                                        ),
                                    ),
                                ),
                                /*array(
                                    'label' => Yii::t('global', 'PRESS'),
                                    'itemOptions' => array( 'class' => 'dropdown-submenu' ),
                                    'items'=>array(
                                        array(
                                            'label' => Yii::t('global', 'MANAGE PRESS'),
                                            'url' => array('press/index'),
                                        ),
                                        array(
                                            'label' => Yii::t('global', 'Manage Titles'),
                                            'url' => array('newspapersTitles/index'),
                                        ),
                                    ),
                                ),*/

                                array(
                                    'label' => Yii::t('global', 'Training Centers'),
                                    'itemOptions' => array( 'class' => 'dropdown-submenu' ),
                                    //'url' => array('trainingCenters/index'),
                                    'items'=>array(
                                        array(
                                            'label' => Yii::t('global', 'Manage Training Centers'),
                                            'url' => array('trainingCenters/index'),
                                        ),
                                        array(
                                            'label' => Yii::t('global', 'Category Training Centers'),
                                            'url' => array('typeTraining/index'),
                                        ),
                                        array(
                                            'label' => Yii::t('global', 'Manage Degrees'),
                                            'url' => array('degrees/index'),
                                        ),
                                    ),
                                ),
                                array(
                                    'label' => Yii::t('global', 'ENT doctors / services'),
                                    'itemOptions' => array( 'class' => 'dropdown-submenu' ),
                                    'items'=>array(
                                        array(
                                            'label' => Yii::t('global', 'Manage Hospitals'),
                                            'url' => array('hospitals/index'),
                                        ),
                                        array(
                                            'label' => Yii::t('global', 'Manage Services'),
                                            'url' => array('services/index'),
                                        ),
                                        array(
                                            'label' => Yii::t('global', 'Manage Practices'),
                                            'url' => array('practices/index'),
                                        ),
                                        array(
                                            'label' => Yii::t('global', 'Manage Doctors'),
                                            'url' => array('doctors/index'),
                                        ),
                                    ),
                                ),
                                array(
                                    'label' => Yii::t('menu', 'Special education schools'),
                                    'itemOptions' => array( 'class' => 'dropdown-submenu' ),
                                    'items'=>array(
                                        array(
                                            'label' => Yii::t('global', 'Manage Special education schools'),
                                            'url' => array('specialEducationSchools/index'),
                                        ),
                                        array(
                                            'label' => Yii::t('global', 'Manage Structures'),
                                            'url' => array('structureSes/index'),
                                        ),
                                    ),
                                ),
                                array(
                                    'label' => Yii::t('global', 'MANAGE PRESS'),
                                    'url' => array('press/index'),
                                ),
                                array(
                                    'label' => Yii::t('global', 'Manage Speech therapist'),
                                    'url' => array('speechTherapist/index'),
                                ),
                                array(
                                    'label' => Yii::t('global', 'Manage Maps'),
                                    'url' => array('maps/index'),
                                ),
						     ),
						 ),

					 // EXPORT
					 array( 
							'label' => Yii::t('global', 'Export'),
							//'icon' => 'icon-paste',
							'itemOptions' => array( 'class' => 'dropdown' ),
							'items' => array(

									array( 
											'label' => Yii::t('export', 'Centers / Professionals'),
											'url' => array('Centers/export'),
										 ),
									array( 
											'label' => Yii::t('export', 'Networks'),
											'url' => array('networks/export'),
										 ),
									array( 
											'label' => Yii::t('export', 'Suppliers'),
											'url' => array('suppliers/export'),
										 ),
									array( 
											'label' => Yii::t('export', 'Products'),
											'url' => array('products/export'),
										 ),
									array( 
											'label' => Yii::t('export', 'ENT Doctors'),
											'url' => array('doctors/export'),
										 ),
									array( 
											'label' => Yii::t('export', 'ENT Services'),
											'url' => array('services/export'),
										 ),
									array( 
											'label' => Yii::t('export', 'Speech Therapists'),
											'url' => array('speechTherapist/export'),
										 ),
									array( 
											'label' => Yii::t('export', 'Special Education Schools'),
											'url' => array('specialEducationSchools/export'),
										 ),
									array( 
											'label' => Yii::t('export', 'Agencies'),
											'url' => array('agencies/export'),
										 ),
									array( 
											'label' => Yii::t('export', 'Press'),
											'url' => array('press/export'),
										 ),
									array( 
											'label' => Yii::t('export', 'Events'),
											'url' => array('events/export'),
										 ),
									array( 
											'label' => Yii::t('export', 'Formations'),
											'url' => array('trainingCenters/export'),
										 ),
									array( 
											'label' => Yii::t('export', 'Advertisers'),
											'url' => array('directoryOrders/export'),
										 ),
                                    array(
                                        'label' => Yii::t('export', 'Contacts'),
                                        'url' => array('contactus/export'),
                                    ),
                                    array(
                                        'label' => Yii::t('export', 'Brands'),
                                        'url' => array('brands/export'),
                                    ),
								 ),	
						 ),
                        array(
                            'label' => Yii::t('global', 'CMS'),
                            //'icon' => 'icon-th-large',
                            'itemOptions' => array( 'class' => 'dropdown' ),
                            'items' => array(
                                array(
                                    'label' => Yii::t('global', 'Manage Banners'),
                                    'url' => array('banners/index'),
                                ),
                                array(
                                    'label' => Yii::t('global', 'Manage Newsletters'),
                                    'url' => array('newsletter/index'),
                                ),
                                array(
                                    'label' => Yii::t('global', 'Manage Pages'),
                                    'url' => array('custompages/index'),
                                ),
                                array(
                                    'label' => Yii::t('global', 'Manage Contact'),
                                    'url' => array('contactus/index'),
                                ),
                                array(
                                    'label' => Yii::t('global', 'Manage Animation Home'),
                                    'url' => array('slidershow/index'),
                                ),
                                array(
                                    'label' => Yii::t('global', 'Manage ZipCode'),
                                    'url' => array('zipcode/index'),
                                ),
                            ),
                        ),


				)
));
?>