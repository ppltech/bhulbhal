<?php

namespace app\controllers;

use Yii;
use app\models\Company;
use app\models\CompanyrSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * CompanyController implements the CRUD actions for Company model.
 */
class CompanyController extends Controller
{
public $layout = 'ums';
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
        ];
    }

    /**
     * Lists all Company models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new CompanyrSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
    public function actionTree()
    {	
    	$model = new Company();
    	if(Yii::$app->request->post()){
    		$date=date("Y-m-d H:i:s");
    		$praam=Yii::$app->request->post()['Company'];
    		$syscompanyid=$praam['sys_company_id'];
    		if($syscompanyid!=''){
    			$company=Company::findOne($syscompanyid);
    			$company->company_name=$praam['company_name'];
    			$company->label_name=$praam['label_name'];
    			$company->custom_label=$praam['custom_label'];
    			$company->address_id=$praam['address_id'];
    			$company->company_status=$praam['company_status'];
    			$company->parent_sys_company_id=$praam['parent_sys_company_id'];
    			$company->company_id=$praam['company_id'];
    			$company->company_updated_time=$date;
    			$company->company_updated_by=1;
    			$company->save();
    		}else{
    			$model->company_name=$praam['company_name'];
    			$model->label_name=$praam['label_name'];
    			$model->custom_label=$praam['custom_label'];
    			$model->address_id=$praam['address_id'];
    			$model->company_status=$praam['company_status'];
    			$model->parent_sys_company_id=$praam['parent_sys_company_id'];
    			$model->company_id=$praam['company_id'];
    			$model->company_creation_time=$date;
    			$model->company_created_by=1;
    			$model->company_updated_time=$date;
    			$model->company_updated_by=1;
    			$model->save();
    		}
    		return $this->redirect(Yii::$app->request->baseUrl.'/company/tree');
    	}else{
    		return $this->render('tree',['model'=>$model]);
    	}
    	
    	
    }

    /**
     * Displays a single Company model.
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
     * Creates a new Company model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Company();
        
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->sys_company_id]);
        } else {
        	return $this->render('create', ['model' => $model]);
                
            
        }
    }
    


    /**
     * Updates an existing Company model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->sys_company_id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Company model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }
    
    public function actionDeletecompanyfromtree()
    {
    	if(Yii::$app->request->post()){
    		$id=Yii::$app->request->post('id');
    		if(Company::findOne($id)->delete()){
    			echo 'Successfully Deleted';
    		}else{
    			'Not Deleted';
    		}
    	}
    }

    /**
     * Finds the Company model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Company the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Company::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    
    public function actionGetcompanybyid(){
    	$input=Yii::$app->request->post();
    	$company=Company::findOne($input['id']);
    	$companyArr=array('sys_company_id'=>$company['sys_company_id'],'company_name'=>$company['company_name'],'label_name'=>$company['label_name'],'custom_label'=>$company['custom_label'],'address_id'=>$company['address_id'],'company_status'=>$company['company_status'],'company_id'=>$company['company_id'],'parent_sys_company_id'=>$company['parent_sys_company_id'],'company_id'=>$company['company_id'],'company_creation_time'=>$company['company_creation_time']);
    	echo json_encode($companyArr);
    }
}
