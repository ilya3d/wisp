<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "section".
 *
 * @property integer $id
 * @property string $alias
 * @property string $title
 * @property integer $parent
 * @property integer $visible
 * @property integer $type
 * @property string $cache
 */
class Section extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'section';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['parent', 'visible', 'type'], 'integer'],
            [['cache'], 'required'],
            [['cache'], 'string'],
            [['alias', 'title'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'alias' => 'Alias',
            'title' => 'Title',
            'parent' => 'Parent',
            'visible' => 'Visible',
            'type' => 'Type',
            'cache' => 'Cache',
        ];
    }
}
