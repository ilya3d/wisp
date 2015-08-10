<?php

namespace app\models;

use yii\base\Model;


class SectionForm extends Model {

    public $title;
    public $alias;
    public $parent;


    public function attributeLabels() {
        return [
            'id' => 'ID',
            'alias' => 'Alias',
            'title' => 'Title',
            'parent' => 'Parent',
            'position' => 'Position',
            'visible' => 'Visible',
            'type' => 'Type',
            'cache' => 'Cache',
        ];
    }


    public function rules() {
        return [
            [['title','alias'], 'string'],
            [['parent'], 'integer'],
            [['alias','title'], 'required']
        ];
    }

}