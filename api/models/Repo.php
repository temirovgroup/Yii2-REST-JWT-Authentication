<?php

namespace api\models;

use Yii;

/**
 * This is the model class for table "repo".
 *
 * @property int $id
 * @property string $q Поисковый запрос
 * @property string $result Результат поиска
 */
class Repo extends \yii\db\ActiveRecord
{
    /**
     * @return string
     */
    public static function tableName()
    {
        return 'repo';
    }

    /**
     * @return array
     */
    public function rules()
    {
        return [
            [['q', 'result'], 'required'],
            [['result'], 'safe'],
            [['q'], 'string', 'max' => 255],
        ];
    }
}
