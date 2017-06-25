<?php

namespace app\controllers;

use Yii;
use app\models\Patents;
use app\models\PatentsSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use app\models\Clients;
/**
 * PatentsController implements the CRUD actions for Patents model.
 */
class PatentsController extends Controller
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
     * Lists all Patents models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new PatentsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Patents model.
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
     * Creates a new Patents model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Patents();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {

            //实例化一个专利相关人员的Clients对象
            $patentRelatedPersonnelObject = new Clients();

            //创建了一个专利，给专利部门主管 发邮件
            //或者流程管理员也可以直接指定某个具体代理人，给他或她发邮件
            $patentAgentStringValue = $model->patentAgent;
            $patentAgentEmail = $patentRelatedPersonnelObject::findByClientName($patentAgentStringValue)->clientEmail;

            if ($patentAgentStringValue == "张金珠") {
                Yii::$app->mailer->compose('patentMsgToAgentManager', ['model' => $model,
                    'patentAgentStringValue' => $patentAgentStringValue])
                    ->setFrom('kf@shineip.com')
                    ->setTo($patentAgentEmail)
                    ->SetSubject('阳光惠远客服中心通知邮件')
                    ->send();
            }
            else {
                Yii::$app->mailer->compose('patentMsgToAgent', ['model' => $model,
                    'patentAgentStringValue' => $patentAgentStringValue])
                    ->setFrom('kf@shineip.com')
                    ->setTo($patentAgentEmail)
                    ->SetSubject('阳光惠远客服中心通知邮件')
                    ->send();
            }

            //创建专利后，给流程管理员发邮件
            $patentPMStringValue = $model->patentProcessManager;
            $patentProcessManagerEmail = $patentRelatedPersonnelObject::findByClientName($patentPMStringValue)->clientEmail;

            Yii::$app->mailer->compose('patentMsgToPM', ['model' => $model,
            'patentPMStringValue' => $patentPMStringValue])
                ->setFrom('kf@shineip.com')
                ->setTo($patentProcessManagerEmail)
                ->SetSubject('阳光惠远客服中心通知邮件')
                ->send();

            return $this->redirect(['view', 'id' => $model->patentID]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Patents model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {

            //实例化一个专利相关人员的Clients对象，下面有2个地方要用到
            $patentRelatedPersonnelObject = new Clients();

            //专利信息有更新，给具体负责的专利代理人发邮件
            $patentAgentStringValue = $model->patentAgent;
            $patentAgentEmail = $patentRelatedPersonnelObject::findByClientName($patentAgentStringValue)->clientEmail;

            Yii::$app->mailer->compose('patentMsgToAgent', ['model' => $model,
                'patentAgentStringValue' => $patentAgentStringValue])
                ->setFrom('kf@shineip.com')
                ->setTo($patentAgentEmail)
                ->SetSubject('阳光惠远客服中心通知邮件')
                ->send();

            //专利信息有更新，给流程流程管理员发邮件
            $patentPMStringValue = $model->patentProcessManager;
            $patentProcessManagerEmail = $patentRelatedPersonnelObject::findByClientName($patentPMStringValue)->clientEmail;

            Yii::$app->mailer->compose('patentMsgToPM', ['model' => $model,
                'patentPMStringValue' => $patentPMStringValue])
                ->setFrom('kf@shineip.com')
                ->setTo($patentProcessManagerEmail)
                ->SetSubject('阳光惠远客服中心通知邮件')
                ->send();

            return $this->redirect(['view', 'id' => $model->patentID]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Patents model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {


        //删除某个专利信息，给总经理，具体客户负责人，以及流程管理员和具体负责此专利的代理人发通知
        $patentModelObject = $this->findModel($id);

        $patentClientLiaisonStringValue = $patentModelObject->client->clientLiaison;
        $patentPMStringValue = $patentModelObject->patentProcessManager;
        $patentAgentStringValue = $patentModelObject->patentAgent;

        $patentRelatedPersonnelObject = new Clients();
        $patentClientLiaisonEmail = $patentRelatedPersonnelObject::findByClientName($patentClientLiaisonStringValue)->clientEmail;
        $patentPMEmail = $patentRelatedPersonnelObject::findByClientName($patentPMStringValue)->clientEmail;
        $patentAgentEmail = $patentRelatedPersonnelObject::findByClientName($patentAgentStringValue)->clientEmail;

        Yii::$app->mailer->compose('patentDelWarning', ['patentModelObject' => $patentModelObject,
        'patentClientLiaisonStringValue' => $patentClientLiaisonStringValue,
        'patentPMStringValue' => $patentPMStringValue,
        'patentAgentStringValue' => $patentAgentStringValue])
            ->setFrom('kf@shineip.com')
            ->setTo(['dy@shineip.com', $patentClientLiaisonEmail, $patentPMEmail, $patentAgentEmail])
            ->SetSubject('阳光惠远客服中心警告邮件：专利信息被删除')
            ->send();

        //先发邮件，再删除
        $patentModelObject->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Patents model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Patents the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Patents::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
