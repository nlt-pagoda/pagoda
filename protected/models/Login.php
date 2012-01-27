<?php

/**
 * This is the model class for table "user".
 *
 * The followings are the available columns in table 'user':
 * @property string $UserID
 * @property string $username
 * @property string $password
 *
 * The followings are the available model relations:
 * @property Course[] $courses
 * @property Document[] $documents
 * @property Message[] $messages
 * @property Message[] $messages1
 * @property Preferences[] $preferences
 * @property Profile[] $profiles
 * @property Rubric[] $rubrics
 * @property Roles[] $roles
 */
class Login extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Login the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'user';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('username, password', 'required'),
			array('username', 'length', 'max'=>45),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('UserID, username, password', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'courses' => array(self::MANY_MANY, 'Course', 'course_has_students(StudentID, CourseID)'),
			'documents' => array(self::HAS_MANY, 'Document', 'StudentID'),
			'messages' => array(self::HAS_MANY, 'Message', 'ToWho'),
			'messages1' => array(self::HAS_MANY, 'Message', 'FromWho'),
			'preferences' => array(self::HAS_MANY, 'Preferences', 'UserID'),
			'profiles' => array(self::HAS_MANY, 'Profile', 'UserID'),
			'rubrics' => array(self::HAS_MANY, 'Rubric', 'Creator'),
			'roles' => array(self::MANY_MANY, 'Roles', 'users_has_roles(UsersID, RolesID)'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'UserID' => 'User',
			'username' => 'Username',
			'password' => 'Password',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('UserID',$this->UserID,true);
		$criteria->compare('username',$this->username,true);
		$criteria->compare('password',$this->password,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	
	
}