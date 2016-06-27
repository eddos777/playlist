<?php

namespace app\controllers;

use app\models\Video;
use Yii;
use yii\base\InvalidParamException;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use yii\web\UploadedFile;

class SiteController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index', ['videos' => Video::find()->all()]);
    }

    public function actionCreate()
    {
        $model = new Video();

        switch (Yii::$app->request->isAjax)
        {
            case "youtube":
                $model->name = Yii::$app->request->post('name');
                $model->url = str_replace("watch?v=", "embed/",Yii::$app->request->post('youtube'));
                break;
            case "vimeo":
                $model->name = Yii::$app->request->post('name');
                $model->url = Yii::$app->request->post('vimeo');
                break;
            case 'vk':
                $model->name = Yii::$app->request->post('name');
                $model->url = Yii::$app->request->post('vk');
                break;
            default :
                new InvalidParamException('Not valid data',400);
        }




        if (Yii::$app->request->isPost) {
            $model->imageFile = UploadedFile::getInstance($model, 'imageFile');
            if ($model->upload()) {
                // file is uploaded successfully
                return;
            }
        }

        return $this->render('upload', ['model' => $model]);
    }


    private function getDomainName()
    {
        $domain = $_SERVER['SERVER_NAME'];
        $scriptPath = $_SERVER['SCRIPT_NAME'];

        switch ($domain) {

            case "youtube.com":
                $domain = "youtube.com";
                break;

            case "vk.com":
                $domain = "vk.com";
                break;

            default:
                $domain = "localhost";
                $folder = "thirdsubfolder";

        }

        $scriptPath = preg_replace('%^/.*?/%', "/$folder/", $scriptPath);
        return "//{$domain}{$scriptPath}";
    }
  

}
