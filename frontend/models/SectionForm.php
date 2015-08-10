<?php

namespace app\models;

use yii\base\Model;


class SectionForm extends Model {

    public $title;


    public function attributeLabels() {
        return [
            'title' => 'title'
        ];
    }


    public function rules() {
        return [
            [['title'], 'string']
        ];
    }

}