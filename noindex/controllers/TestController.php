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

        IssueData::find()
            ->leftJoin('user', 'issue_data.user_id = user.id')
            ->leftJoin('project', 'issue_data.project_id = project.id')
            ->leftJoin('work_type', 'issue_data.work_type_id = work_type.id')
            ->where(['issue_data.parent_id' => 4060])
            ->all();

        $diff = sprintf( '%.6f sec.', microtime( true ) - $start );

        return $this->asJson([
            'time' => $diff
        ]);
    }
}