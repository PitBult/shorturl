<?php

class SiteController extends SController
{
	
	/**
	 * Declares class-based actions.
	 */
	public function actions()
	{
		return array(
			// captcha action renders the CAPTCHA image
			// this is used by the contact page
			'captcha'=>array(
				'class'=>'CCaptchaAction',
				'backColor'=>0xFFFFFF,
				//'maxLength'=> 2,
				//'minLength'=> 5,
				'foreColor'=> 0xED3100,
				//'width'=> 120,
				'height'=> 40,
			),
		);
	}
	
	public function actionIndex()
	{
		$criteria=new CDbCriteria;
		$criteria->limit = 10;
		$criteria->order = 'url_counter DESC';
		$links = Urls::model()->findAll($criteria);
			
		$this->render('index', array('links' => $links));
	}
	
	public function actionRedirect()
	{
		if(isset($_GET['hash_code'])) {
			$hash_code = trim($_GET['hash_code']);
			
			$criteria=new CDbCriteria;
			$criteria->condition = "url_short_code = :short_code";
			$criteria->params = array(':short_code' => $hash_code);
			$model = Urls::model()->find($criteria);
			
			if($model) {
				$model->url_counter = $model->url_counter+1;
				$model->save();
				$this->redirect($model->url_long_url);
			} else {
				throw new CHttpException(500,'Not found URL');
			}
			
		} else throw new CHttpException(404,'The requested page does not exist.');
	}
	
	public function actionGetShortUrl()
	{
		$out = array('error' => '');
		if(isset($_POST['url']) && $_POST['url']) {
			
			$url = trim($_POST['url']);
			
			if($url) {
					Yii::import('ext.myurl');
					$hash_url = myurl::shorturl2($url);
					$short_url = Yii::app()->getBaseUrl(true).'/'.$hash_url;
					
					$criteria=new CDbCriteria;
					$criteria->condition = "url_short_code = :short_code";
					$criteria->params = array(':short_code' => $hash_url);
					$model = Urls::model()->find($criteria);
					
					if($model) {
						$out['short_url'] = Yii::app()->getBaseUrl(true).'/'.$model->url_short_code;
					} else {
						$model = new Urls;
						$model->url_long_url = $url;
						$model->url_short_code = $hash_url;
						if($model->validate()) {
							$model->save();
							$out['short_url'] = $short_url;
						} else {
							$out['error'] = print_r($model->getErrors(), true);
						}
					}
				
				
			} else $out['error'] = 'No URL was supplied';
			/*$criteria = new CDbCriteria();
			$criteria->addSearchCondition('city_name_ru', $match);
			$criteria->addSearchCondition('city_name_en', $match, true, 'OR');
			
			$criteria->addCondition('city_country_id = :country_id');
			$criteria->params[':country_id'] = 341;
			
			
			$items = City::model()->findAll($criteria);
			
			$arr = array();
			if($items)
				foreach($items as $v) {
					$cnt = Cars::model()->count(array('condition' => 'car_disable=0 AND car_hidden=0 AND car_site_enable=1 AND car_city_id=:car_city_id', 'params' => array(':car_city_id' => $v->city_id) ));
					$arr[] = array('id' => $v->city_id, 'name' => $v->city_name, 'name_ru' => $v->city_name_ru, 'name_en' => $v->city_name_en, 'cnt' => $cnt);
				}*/

			
			echo json_encode($out);
		} else throw new CHttpException(404,'The requested page does not exist.');
	}
	
		
	/**
	 * This is the action to handle external exceptions.
	 */
	public function actionError()
	{
	    if($error=Yii::app()->errorHandler->error)
	    {
	    	if(Yii::app()->request->isAjaxRequest)
	    		echo $error['message'];
	    	else
	        	$this->render('error', $error);
	    }
	}


}