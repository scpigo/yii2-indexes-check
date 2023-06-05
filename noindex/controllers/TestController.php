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

        $start = microtime( true );

        IssueData::find()->where(['project_id' => 423])->all();

        $diff = sprintf( '%.6f sec.', microtime( true ) - $start );

        return $this->asJson([
            'time' => $diff
        ]);
    }
}