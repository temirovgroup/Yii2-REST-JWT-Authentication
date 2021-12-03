<?php

namespace api\models;

use Yii;
use yii\base\NotSupportedException;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
use yii\web\IdentityInterface;

/**
 * User model
 *
 * @property integer $id
 * @property string $username
 * @property string $password_hash
 * @property string $password_reset_token
 * @property string $verification_token
 * @property string $email
 * @property string $auth_key
 * @property integer $status
 * @property integer $created_at
 * @property integer $updated_at
 * @property string $password write-only password
 */
class User extends ActiveRecord implements IdentityInterface
{
    /**
     * @return string
     */
    public static function tableName()
    {
        return '{{%user}}';
    }

    public static function findIdentity($id)
    {
    }

    /**
     * @param mixed $token
     * @param null $type
     * @return User|IdentityInterface|null
     */
    public static function findIdentityByAccessToken($token, $type = null) {
        return static::findOne(['id' => $token->getClaim('id'), 'status' => 10]);
    }

    public function getId()
    {
    }

    public function getAuthKey()
    {
    }

    public function validateAuthKey($authKey)
    {
    }
}
