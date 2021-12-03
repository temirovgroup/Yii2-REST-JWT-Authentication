<?php
/**
 * Created by PhpStorm.
 */

namespace common\components;

use frontend\models\Repo;
use yii\helpers\Json;
use yii\httpclient\Client;

class RepoHelper
{
    /**
     * @param string $query
     * @return false|mixed
     * @throws \yii\base\InvalidConfigException
     * @throws \yii\httpclient\Exception
     */
    public function searchRepo(string $query)
    {
        $client = new Client();
        $response = $client->createRequest()
            ->addHeaders([
                'user-agent' => '',
            ])
            ->setMethod('GET')
            ->setFormat(Client::FORMAT_CURL)
            ->setUrl('https://api.github.com/search/repositories')
            ->setData([
                'per_page' => 100,
                'q' => $query,
            ])
            ->send();

        if ($response->isOk) {
            return $response->getData();
        }

        return false;
    }

    /**
     * @param string $data
     * @return array
     */
    public function getItems(string $data): array
    {
        $datas = Json::decode($data, false);

        return $datas->items;
    }

    /**
     * @param string $query
     * @param string $result
     * @return Repo|false
     */
    public function saveRepo(string $query, string $result)
    {
        $model = new Repo();
        $model->q = $query;
        $model->result = $result;

        if ($model->save()) {
            return $model;
        }

        return false;
    }
}
