<?php
/**
 * Created by PhpStorm.
 */

namespace api\controllers;

use api\models\Repo;
use api\models\search\RepoSearch;
use sizeg\jwt\JwtHttpBearerAuth;
use Yii;
use yii\data\ActiveDataFilter;
use yii\data\ActiveDataProvider;
use yii\helpers\Json;
use yii\rest\ActiveController;
use yii\rest\Controller;

class RepositoryController extends Controller
{
    public $modelClass = 'api\models\Repo';

    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        $behaviors = parent::behaviors();
        $behaviors['authenticator'] = [
            'class' => JwtHttpBearerAuth::class,
            'optional' => [
                'login',
            ],
        ];

        return $behaviors;
    }

    public function actionIndex()
    {
        $filter = new ActiveDataFilter([
            'searchModel' => RepoSearch::class,
        ]);

        $filterCondition = null;

        // You may load filters from any source. For example,
        // if you prefer JSON in request body,
        // use Yii::$app->request->getBodyParams() below:
        if ($filter->load(\Yii::$app->request->get())) {
            $filterCondition = $filter->build();
            if ($filterCondition === false) {
                // Serializer would get errors out of it
                return $filter;
            }
        }

        $query = Repo::find();
        if ($filterCondition !== null) {
            $query->andWhere($filterCondition);
        }

        if (!$query->count('id')) {
            $q = Yii::$app->getRequest()->get('filter');

            // Запрашиваем данные
            $response = Yii::$app->repoHelper->searchRepo($q['q']);

            if ($response) {
                // Сохраняем данные в БД
                Yii::$app->repoHelper->saveRepo($q['q'], Json::encode($response));
            }
        }

        return new ActiveDataProvider([
            'query' => $query,
        ]);



        /*return new ActiveDataProvider([
            'query' => Repo::find(),
        ]);*/
    }
}
