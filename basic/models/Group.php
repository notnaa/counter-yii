<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "group".
 *
 * @property integer $group_id
 * @property string $group_name
 * @property integer $kafedra
 * @property integer $created_at
 * @property integer $updated_at
 *
 * @property Kafedra $kafedra0
 * @property User[] $users
 */
class Group extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'group';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['group_name', 'kafedra', 'created_at', 'updated_at'], 'required'],
            [['kafedra', 'created_at', 'updated_at'], 'integer'],
            [['group_name'], 'string', 'max' => 255],
            [['kafedra'], 'unique'],
            [['kafedra'], 'exist', 'skipOnError' => true, 'targetClass' => Kafedra::className(), 'targetAttribute' => ['kafedra' => 'kafedra_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'group_id' => 'Group ID',
            'group_name' => 'Group Name',
            'kafedra' => 'Kafedra',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKafedra0()
    {
        return $this->hasOne(Kafedra::className(), ['kafedra_id' => 'kafedra']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUsers()
    {
        return $this->hasMany(User::className(), ['group' => 'group_id']);
    }
}
