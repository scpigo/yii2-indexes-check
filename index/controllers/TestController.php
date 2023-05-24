<?php

namespace app\controllers;

use app\models\IssueData;
use yii\web\Controller;

class TestController extends Controller
{
    public $enableCsrfValidation = false;

    public function actionIndex()
    {
        ini_set("memory_limit","512M");
        $result = IssueData::find()->where(['project_id' => 423])->all();

        return $this->asJson([
            'data' => $result
        ]);
    }
}