<?php


namespace app\controllers;


use app\models\TripUser;
use Yii;
use app\models\BusinessTrip;
use app\models\User;
use app\models\BusinessTripUser;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\data\ActiveDataProvider;

class BusinessTripController extends Controller
{
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => BusinessTrip::find(),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionCreate()
    {
        $model = new BusinessTrip();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    public function actionView($id)
    {
        $model = $this->findModel($id);

        return $this->render('view', [
            'model' => $model,
        ]);
    }

    protected function findModel($id)
    {
        if (($model = BusinessTrip::findOne($id)) !== null) {
            return $model;
        }
        throw new NotFoundHttpException('Командировка не найдена.');
    }
}