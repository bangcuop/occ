<?php

/**
 * This is the model class for table "occ.image".
 *
 * The followings are the available columns in table 'occ.image':
 * @property integer $imageId
 * @property string $imageName
 * @property string $imageUrl
 * @property string $createDate
 */
class Image extends CActiveRecord {

    /**
     * @return string the associated database table name
     */
    public $imageId;
    public $imageName;
    public $imageUrl;
    public $createDate;

    public function tableName() {
        return 'occ.image';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('imageId', 'numerical', 'integerOnly' => true),
            array('imageName, imageUrl', 'length', 'max' => 200),
            array('createDate', 'safe'),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('imageId, imageName, imageUrl, createDate', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'imageId' => Yii::t('image', 'imageId'),
            'imageName' => Yii::t('image', 'imageName'),
            'imageUrl' => Yii::t('image', 'imageUrl'),
            'createDate' => Yii::t('image', 'createDate'),
        );
    }

    /**
     * Retrieves a list of models based on the current search/filter conditions.
     *
     * Typical usecase:
     * - Initialize the model fields with values from filter form.
     * - Execute this method to get CActiveDataProvider instance which will filter
     * models according to data in model fields.
     * - Pass data provider to CGridView, CListView or any similar widget.
     *
     * @return CActiveDataProvider the data provider that can return the models
     * based on the search/filter conditions.
     */
    public function search() {
        // @todo Please modify the following code to remove attributes that should not be searched.

        $criteria = new CDbCriteria;

        $criteria->compare('imageId', $this->imageId);
        $criteria->compare('imageName', $this->imageName, true);
        $criteria->compare('imageUrl', $this->imageUrl, true);
        $criteria->compare('createDate', $this->createDate, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return Image the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

}
