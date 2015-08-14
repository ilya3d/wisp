<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "design_grid".
 *
 * @property integer $id
 * @property integer $section
 * @property string $module
 * @property string $layout
 * @property integer $position
 */
class DesignGrid extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'design_grid';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['section', 'position'], 'integer'],
            [['module', 'layout'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'section' => 'Section',
            'module' => 'Module',
            'layout' => 'Layout',
            'position' => 'Position',
        ];
    }
}
