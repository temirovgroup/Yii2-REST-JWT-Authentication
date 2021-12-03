<?php
/**
 * Created by PhpStorm.
 */

namespace api\models\search;

use yii\base\Model;

class RepoSearch extends Model
{
    public $id;
    public $q;

    /**
     * @return array
     */
    public function rules()
    {
        return [
            [['q'], 'required'],
            [['id'], 'integer'],
            [['q'], 'string', 'max' => 255],
        ];
    }
}
