<?php

namespace app\controllers;

use Yii;
use app\models\Clients;
use app\models\ClientsSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

/**
 * ClientsController implements the CRUD actions for Clients model.
 */
class ClientsController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['@']
                    ]
                ],
            ],
        ];
    }

    /**
     * Lists all Clients models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ClientsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Clients model.
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
     * Creates a new Clients model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Clients();
        $model->generateAuthKey();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {

            //创建一个客户，给总经理邓宇\销售总监赵万里以及对应的销售人员发邮件
            $clientLiaisonStringValue = $model->clientLiaison;
            $clientLiaisonEmail = Clients::findByClientName($clientLiaisonStringValue)->clientEmail;

            Yii::$app->mailer->compose('clientCreatedMsgToAll', ['model' => $model,
                'clientLiaisonStringValue' => $clientLiaisonStringValue])
                ->setFrom('kf@shineip.com')
                ->setTo(['dy@shineip.com', '53707942@qq.com', $clientLiaisonEmail])
                ->SetSubject('阳光惠远客服中心通知邮件：客户信息有更新')
                ->send();

            return $this->redirect(['view', 'id' => $model->clientID]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Clients model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {

            //客户信息更新后，给邓宇、赵万里以及负责此客户的具体销售人员发邮件
            $clientLiaisonStringValue = $model->clientLiaison;
            $clientLiaisonEmail = Clients::findByClientName($clientLiaisonStringValue)->clientEmail;

            Yii::$app->mailer->compose('clientUpdatedMsgToAll', ['model' => $model,
            'clientLiaisonStringValue' => $clientLiaisonStringValue])
                ->setFrom('kf@shineip.com')
                ->setTo(['dy@shineip.com', '53707942@qq.com', $clientLiaisonEmail])
                ->SetSubject('阳光惠远客服中心通知邮件：客户信息有更新')
                ->send();



            return $this->redirect(['view', 'id' => $model->clientID]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Clients model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        //删除一个客户信息，给总经理，销售总监，以及相应的销售人员发邮件
        $clientModelObject = $this->findModel($id);
        $clientLiaison = $clientModelObject->clientLiaison;
        $clientLiaisonEmail = (new Clients())::findByClientName($clientLiaison)->clientEmail;

        Yii::$app->mailer->compose('clientDelWarning', ['clientModelObject' => $clientModelObject])
            ->setFrom('kf@shineip.com')
            ->setTo(['dy@shineip.com', '53707942@qq.com', $clientLiaisonEmail])
            ->SetSubject('阳光惠远客服中心警告邮件：客户信息被删除')
            ->send();

        //先发邮件，再删除
        $clientModelObject->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Clients model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Clients the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Clients::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
