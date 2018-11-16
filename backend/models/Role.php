<?php

namespace backend\models;
use common\models\User;

use Yii;

/**
 * This is the model class for table "role".
 *
 * @property int $id
 * @property string $role_name
 * @property int $role_value
 */
class Role extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'role';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['role_name', 'role_value'], 'required'],
            [['role_value'], 'integer'],
            [['role_name'], 'string', 'max' => 45],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'role_name' => 'Role Name',
            'role_value' => 'Role Value',
        ];
    }

    /** 
    *To map role_id from user table to id in role table
    *Add relationship tables bwt role and user table

    */

    public function getUsers()  // getUsers is the standard way of establishing the relationship from role to users cz one role can have many users
    {
      return $this->hasMany(User::className(), ['role_id'=>'id']);
    }
}
