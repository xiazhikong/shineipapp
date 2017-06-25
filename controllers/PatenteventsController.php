<?php

namespace app\controllers;

use Yii;
use app\models\Patentevents;
use app\models\PatenteventsSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use app\models\Clients;

/**
 * PatenteventsController implements the CRUD actions for Patentevents model.
 */
class PatenteventsController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['@']
                    ]
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Patentevents models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new PatenteventsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Patentevents model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Patentevents model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Patentevents();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {

            //实例化一个专利相关人员的Clients对象
            $patentRelatedPersonnelObject = new Clients();

            //给负责此专利的专利代理人发邮件
            $patentAgentStringValue = $model->patent->patentAgent;
            $patentAgentEmail = $patentRelatedPersonnelObject::findByClientName($patentAgentStringValue)->clientEmail;

            Yii::$app->mailer->compose('eventMsgToAgent', ['model' => $model,
            'patentAgentStringValue' => $patentAgentStringValue])
                    ->setFrom('kf@shineip.com')
                    ->setTo($patentAgentEmail)
                    ->SetSubject('阳光惠远客服中心通知邮件')
                    ->send();

            //给负责此专利的流程管理员发通知邮件
            $patentPMStringValue = $model->patent->patentProcessManager;
            $patentProcessManagerEmail = $patentRelatedPersonnelObject::findByClientName($patentPMStringValue)->clientEmail;

            Yii::$app->mailer->compose('eventMsgToPM', ['model' => $model,
            'patentPMStringValue' => $patentPMStringValue])
                ->setFrom('kf@shineip.com')
                ->setTo($patentProcessManagerEmail)
                ->SetSubject('阳光惠远客服中心通知邮件')
                ->send();

            //给此专利的client发通知邮件
            $patentClientStringValue = $model->patent->client->clientName;
            $patentClientEmail = $model->patent->client->clientEmail;

            Yii::$app->mailer->compose('eventMsgToPM', ['model' => $model,
                'patentClientStringValue' => $patentClientStringValue])
                ->setFrom('kf@shineip.com')
                ->setTo($patentClientEmail)
                ->SetSubject('阳光惠远客服中心通知邮件')
                ->send();

            //create event的时候，不给eventCreator发通知
            //update的时候再发

            return $this->redirect(['view', 'id' => $model->eventID]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Patentevents model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {

            //专利事件有update，给client发邮件
            $patentClientEmail = $model->patent->client->clientEmail;
            $patentClientStringValue = $model->patent->client->clientName;

            Yii::$app->mailer->compose('eventToTheClient', ['model' => $model,
                'patentClientStringValue' => $patentClientStringValue])
                ->setFrom('kf@shineip.com')
                ->setTo($patentClientEmail)
                ->SetSubject('阳光惠远客服中心通知邮件')
                ->send();

            //实例化一个专利相关人员的Clients对象
            $patentRelatedPersonnelObject = new Clients();

            //专利事件有update，给负责此专利的流程管理员发邮件
            $patentPMStringValue = $model->patent->patentProcessManager;
            $patentProcessManagerEmail = $patentRelatedPersonnelObject::findByClientName($patentPMStringValue)->clientEmail;

            Yii::$app->mailer->compose('eventMsgToPM', ['model' => $model,
                'patentPMStringValue' => $patentPMStringValue ])
                ->setFrom('kf@shineip.com')
                ->setTo($patentProcessManagerEmail)
                ->SetSubject('阳光惠远客服中心通知邮件')
                ->send();

            //专利事件有update，给负责此专利事件的创建人发邮件
            $eventCreatorEmail = $patentRelatedPersonnelObject::findByClientName($model->eventCreator)->clientEmail;

            Yii::$app->mailer->compose('eventMsgToEventCreator', ['model' => $model])
                ->setFrom('kf@shineip.com')
                ->setTo($eventCreatorEmail)
                ->SetSubject('阳光惠远客服中心通知邮件')
                ->send();

            //给负责此专利的专利代理人发邮件
            $patentAgentStringValue = $model->patent->patentAgent;
            $patentAgentEmail = $patentRelatedPersonnelObject::findByClientName($patentAgentStringValue)->clientEmail;

            Yii::$app->mailer->compose('eventMsgToAgent', ['model' => $model,
                'patentAgentStringValue' => $patentAgentStringValue])
                ->setFrom('kf@shineip.com')
                ->setTo($patentAgentEmail)
                ->SetSubject('阳光惠远客服中心通知邮件')
                ->send();

            return $this->redirect(['view', 'id' => $model->eventID]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Patentevents model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {

        //删除某个专利事件之前，先给流程管理员、具体负责此专利的代理人、专利事件创建人发通知
        $patentEventObject = $this->findModel($id);

        //实例化一个专利相关人员的Clients对象
        $patentRelatedPersonnelObject = new Clients();

        $patentPMStringValue = $patentEventObject->patent->patentProcessManager;
        $patentAgentStringValue = $patentEventObject->patent->patentAgent;
        $patentEventCreatorStringValue = $patentEventObject->eventCreator;

        $patentPMEmail = $patentRelatedPersonnelObject::findByClientName($patentPMStringValue)->clientEmail;
        $patentAgentEmail = $patentRelatedPersonnelObject::findByClientName($patentAgentStringValue)->clientEmail;
        $patentEventCreatorEmail = $patentRelatedPersonnelObject::findByClientName($patentEventCreatorStringValue)->clientEmail;

        Yii::$app->mailer->compose('eventDelWarning', ['patentEventObject' => $patentEventObject,
            'patentPMStringValue' => $patentPMStringValue,
            'patentAgentStringValue' => $patentAgentStringValue,
            'patentEventCreator' => $patentEventCreatorStringValue])
            ->setFrom('kf@shineip.com')
            ->setTo([$patentPMEmail,$patentAgentEmail,$patentEventCreatorEmail])
            ->SetSubject('阳光惠远客服中心警告邮件：专利事件被删除')
            ->send();

        //先发邮件，再删除
        $patentEventObject->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Patentevents model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Patentevents the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Patentevents::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
