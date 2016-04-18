<?php

/**
 * ContactForm class.
 * ContactForm is the data structure for keeping
 * contact form data. It is used by the 'contact' action of 'SiteController'.
 */
class ContactForm extends CFormModel {

    public $name;
    public $address;
    public $email;
    public $phone;
    public $subject;
    public $body;
    public $verifyCode;

    /**
     * Declares the validation rules.
     */
    public function rules() {
        return array(
            // name, email, subject and body are required
            array('name, email, subject, body, verifyCode', 'required', 'message' => Yii::t('contact', 'msg0001')),
            // email has to be a valid email address
            array('email', 'email', 'message' => Yii::t('contact', 'msg0002')),
            // verifyCode needs to be entered correctly
            array('verifyCode', 'captcha', 'allowEmpty' => !CCaptcha::checkRequirements(), 'message' => Yii::t('contact', 'msg0003')),
        );
    }

    /**
     * Declares customized attribute labels.
     * If not declared here, an attribute would have a label that is
     * the same as its name with the first letter in upper case.
     */
    public function attributeLabels() {
        return array(
            'name' => Yii::t('contact', 'name'),
            'address' => Yii::t('contact', 'address'),
            'email' => Yii::t('contact', 'email'),
            'phone' => Yii::t('contact', 'phone'),
            'subject' => Yii::t('contact', 'subject'),
            'body' => Yii::t('contact', 'body'),
            'verifyCode' => Yii::t('contact', 'verifyCode'),
        );
    }

}
