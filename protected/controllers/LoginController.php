<?php

class LoginController extends Controller
{
		
	public function __LoginController()
	{
		$model = new Login();
	}
	
	public function actionIndex()
	{
		$this->render('index');
	}
	
	public function actionGetTableName()
	{
		$model = new Login();
		$tableName = $model->tableName();
		return $tableName;
		
	}
	
	public function actionVerifyCredentials()
	{
			$uname = $_POST["username"];
			$pw = $_POST["password"];
			
			$connection = Yii::app()->db;
			$query = "SELECT * FROM user WHERE username = '$uname' AND password = '$pw'";
			$command = $connection->createCommand($query);
			$data = $command->query();
			$results = $data->read();
			
			$userId = $results["UserID"];

			//if credentials are correct
			if ($results)
			{			
				$this->render('welcome',array('uname2'=>$uname,'UserID'=>$userId));
			}
			else 
			{
				$this->render('error');
			}
	}		

	// Uncomment the following methods and override them if needed
	/*
	public function filters()
	{
		// return the filter configuration for this controller, e.g.:
		return array(
			'inlineFilterName',
			array(
				'class'=>'path.to.FilterClass',
				'propertyName'=>'propertyValue',
			),
		);
	}

	public function actions()
	{
		// return external action classes, e.g.:
		return array(
			'action1'=>'path.to.ActionClass',
			'action2'=>array(
				'class'=>'path.to.AnotherActionClass',
				'propertyName'=>'propertyValue',
			),
		);
	}
	*/
}