<?php

/**
 * This is the model class for table "banner".
 *
 * The followings are the available columns in table 'banner':
 * @property integer $id
 * @property string $title
 * @property string $image
 * @property integer $weight
 * @property integer $views
 * @property string $created
 * @property string $showed
 */
class Banner extends CActiveRecord
{
  /**
   * Returns the static model of the specified AR class.
   * @param string $className active record class name.
   * @return Banner the static model class
   */
  public static function model($className = __CLASS__)
  {
    return parent::model($className);
  }

  /**
   * @return string the associated database table name
   */
  public function tableName()
  {
    return 'banner';
  }

  /**
   * @return array validation rules for model attributes.
   */
  public function rules()
  {
    return array(
      array('title', 'required'),
      array('weight, views', 'numerical', 'integerOnly' => true),
      array('title, image', 'length', 'max' => 256),
      // The following rule is used by search().
      array('id, title, weight, views, created, showed', 'safe', 'on' => 'search'),

      array('image', 'file', 'types' => 'jpg, gif, png', 'maxSize' => 1048576 * 4, 'on' => 'insert'),
      array('image', 'file', 'types' => 'jpg, gif, png', 'allowEmpty' => true, 'on' => 'update'),
    );
  }

  /**
   * @return array relational rules.
   */
  public function relations()
  {
    return array();
  }

  /**
   * @return array customized attribute labels (name=>label)
   */
  public function attributeLabels()
  {
    return array(
      'id' => 'ID',
      'title' => 'Title',
      'image' => 'image',
      'weight' => 'Weight',
      'views' => 'Views',
      'created' => 'Created',
      'showed' => 'Showed',
    );
  }

  /**
   * Retrieves a list of models based on the current search/filter conditions.
   * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
   */
  public function search()
  {
    $criteria = new CDbCriteria;

    $criteria->compare('id', $this->id);
    $criteria->compare('title', $this->title, true);
    $criteria->compare('weight', $this->weight);
    $criteria->compare('views', $this->views);
    $criteria->compare('created', $this->created, true);
    $criteria->compare('showed', $this->showed, true);

    return new CActiveDataProvider($this, array(
      'criteria' => $criteria,
    ));
  }

  protected function beforeSave()
  {
    if (parent::beforeSave())
    {
      if ($this->isNewRecord)
      {
        $this->created = time();
      }
      return true;
    }
    return false;
  }

  public function getThumb()
  {
    return CHtml::image(Yii::app()->getBaseUrl() . Yii::app()->params['bannersDir'] . $this->image, "", array('width' => 124));
  }

  public function getImage()
  {
    return Yii::app()->getBaseUrl() . Yii::app()->params['bannersDir'] . $this->image;

  }

  public static function selectRandomBanner()
  {
    $banners = Yii::app()->db->createCommand()->select('id, weight')->from('banner')->queryAll();
    $totalWeight = 0;
    foreach ($banners as $banner)
    {
      $totalWeight += $banner['weight'];
    }

    $randomWeight = rand(0, $totalWeight);

    $accumulativeWeight = 0;
    foreach ($banners as $banner)
    {
      $accumulativeWeight += $banner['weight'];
      if ($accumulativeWeight >= $randomWeight)
      {
        return Banner::model()->findByPk($banner['id']);
      }
    }
    return null;
  }
}