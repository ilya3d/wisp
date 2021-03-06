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
 * @property integer $position
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
            [['parent', 'position', 'visible', 'type'], 'integer'],
            //[['cache'], 'required'],
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
            'position' => 'Position',
            'visible' => 'Visible',
            'type' => 'Type',
            'cache' => 'Cache',
        ];
    }


    public function save($runValidation = true, $attributeNames = null) {

        $this->checkAlias();
        $this->checkPosition();

        $this->cache = '';

        $res = parent::save($runValidation, $attributeNames);

        return $res;
    }


    protected function checkAlias() {

        if ( !$this->alias )
            $this->alias = $this->title ?: 'section';

        $alias = substr( $this->alias, 0, 60 );

        $i = '';
        do {
            $this->alias = $alias.$i;

            $res = self::find()
                ->andWhere( ['alias' => $this->alias] )
                ->andWhere( ['<>', 'id', (int)$this->id] )
                ->one();

            $i++;
        } while ( $res );

    }


    protected function checkPosition() {

        if ( !$this->parent || $this->position )
            return true;

        // if ( $this->isAttributeChanged('position') )

        /** @var self $section */
        $section = self::find()
            ->where( ['parent' => $this->parent] )
            ->orderBy( ['position' => SORT_DESC] )
            ->one();

        $this->position = $section ? $section->position + 1 : 1;

        return true;
    }


    public static function getByAlias( $alias ) {
        return self::findOne([ 'alias' => $alias ]);
    }


    /**
     * Return section with id or new
     * @param int $id Section id
     * @return Section
     */
    public static function get( $id ) {

        if ( $section = self::findOne(['id' => $id]) )
            return $section;

        return new self();
    }


    /**
     * Section full list (as array id - title)
     * @return array
     */
    public static function getList() {

        $out = [];

        foreach ( self::find()->each() as $section )
            $out[$section->id] = $section->title;

        return $out;
    }


    public static function create( $title, $parent = 0, $type = 0, $visible = 0, $alias = '' ) {

        $section = new self();
        $section->title = $title;
        $section->parent = $parent;
        $section->type = $type;
        $section->visible = $visible;
        $section->alias = $alias;
        $section->cache = '1';
        $section->position = 0;

        return $section->save() ? $section->id : false;
    }

}
