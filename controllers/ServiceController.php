<?php


namespace app\controllers;

use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use app\models\Service;
use app\models\ServiceType;
use app\models\ServiceParticipant;
use app\models\BusinessTrip;
use app\models\User;

class ServiceController extends Controller
{
    public function actionCreate($trip_id)
    {
        $service = new Service();
        $service->business_trip_id = $trip_id;
        $users = BusinessTrip::findOne($trip_id)->users;
        $types = ServiceType::find()->all();

        if ($service->load(Yii::$app->request->post()) && $service->save()) {
            $selectedUsers = Yii::$app->request->post('users', []);
            foreach ($selectedUsers as $userId) {
                $participant = new ServiceParticipant();
                $participant->service_id = $service->id;
                $participant->user_id = $userId;
                $participant->save();
            }
            return $this->redirect(['business-trip/view', 'id' => $trip_id]);
        }

        return $this->render('create', [
            'model' => $service,
            'users' => $users,
            'types' => $types,
        ]);
    }

    public function actionConfirm($id)
    {
        $service = $this->findModel($id);
        $service->status = 'active';
        $service->save();
        return $this->redirect(['business-trip/view', 'id' => $service->business_trip_id]);
    }

    public function actionCancel($id)
    {
        $service = $this->findModel($id);
        $service->status = 'canceled';
        $service->save();
        return $this->redirect(['business-trip/view', 'id' => $service->business_trip_id]);
    }

    protected function findModel($id)
    {
        if (($model = Service::findOne($id)) !== null) {
            return $model;
        }
        throw new NotFoundHttpException('Услуга не найдена.');
    }
}