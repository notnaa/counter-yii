<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "kafedra".
 *
 * @property integer $kafedra_id
 * @property string $name
 * @property integer $created_at
 * @property integer $updated_at
 *
 * @property Group $group
 */
class Kafedra extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'kafedra';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'created_at', 'updated_at'], 'required'],
            [['created_at', 'updated_at'], 'integer'],
            [['name'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'kafedra_id' => 'Kafedra ID',
            'name' => 'Name',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGroup()
    {
        return $this->hasOne(Group::className(), ['kafedra' => 'kafedra_id']);
    }
}
