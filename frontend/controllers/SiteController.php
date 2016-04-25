<?php
namespace frontend\controllers;

use Yii;
use common\models\LoginForm;
use frontend\models\PasswordResetRequestForm;
use frontend\models\ResetPasswordForm;
use frontend\models\SignupForm;
use frontend\models\ContactForm;
use yii\base\InvalidParamException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\data\Pagination;

/**
 * Site controller
 */
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
                'only' => ['logout', 'signup'],
                'rules' => [
                    [
                        'actions' => ['signup'],
                        'allow' => true,
                        'roles' => ['?'],
                    ],
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
     * @return mixed
     */
    public function actionIndex(){
        $title = \common\models\NewsBlocks::findOne(['id'=>23]);

        $pool = \common\models\Pool::find()->where(['3'=>1])->orderBy(new \yii\db\Expression('rand()'))->one();

        $comments = \common\models\Comments::find()->orderBy('addTime DESC')->limit(8)->all();

        $news = \common\models\Publ::find()->with('category')->orderBy('publ.addtime DESC')->limit(8)->all();

        $query = \common\models\News::find()->orderBy('ontop DESC')->addOrderBy('addtime DESC');

        $count = clone $query;

        $pages = new Pagination(['totalCount' => $count->count(), 'pageSize' => 20]);

        $pages->pageSizeParam = false;
        $models = $query->offset($pages->offset)->limit($pages->limit)->all();

        return $this->render('index', [
            'models'=>$models, 
            'pages'=>$pages, 
            'news'=>$news, 
            'comments'=>$comments,
            'pool'=>$pool,
            'title'=>$title,
            ]);
    }

    public function actionNews(){
        $title = \common\models\NewsBlocks::findOne(['id'=>23]);

        $query = \common\models\News::find()->orderBy('ontop DESC')->addOrderBy('addtime DESC');

        $count = clone $query;

        $pages = new Pagination(['totalCount' => $count->count(), 'pageSize' => 20]);

        $pages->pageSizeParam = false;
        $models = $query->offset($pages->offset)->limit($pages->limit)->all();

        return $this->render('news', ['models'=>$models, 'pages'=>$pages, 'title'=>$title,]);
    }

    public function actionNewsCategory($slug, $id){
        $title = \common\models\NewsBlocks::findOne(['id'=>23]);

        $cat = \common\models\NewsCategory::findOne(['description'=>$slug]);

        $query = \common\models\News::find()->joinWith('categories')->where(['nw_nw.description'=>$slug])->orderBy('news.ontop DESC')->addOrderBy('addtime DESC');

        $count = clone $query;

        $pages = new Pagination(['totalCount' => $count->count(), 'pageSize' => 20]);

        $pages->pageSizeParam = false;
        $models = $query->offset($pages->offset)->limit($pages->limit)->all();

        return $this->render('news', ['models'=>$models, 'pages'=>$pages, 'title'=>$title, 'category'=>$cat]);
    }

    public function actionNewsItem($slug, $date){
        $model = \common\models\News::findOne(['sbscr'=>$slug]);

        return $this->render('news-item', ['model'=>$model]);
    }

    public function actionPubl() {
        $title = \common\models\NewsBlocks::findOne(['id'=>27]);

        $query = \common\models\Publ::find()->orderBy('addtime DESC');

        $count = clone $query;

        $pages = new Pagination(['totalCount' => $count->count(), 'pageSize' => 20]);

        $pages->pageSizeParam = false;
        $models = $query->offset($pages->offset)->limit($pages->limit)->all();

        return $this->render('publ', ['title'=>$title,'models'=>$models, 'pages'=>$pages]);
    }


    public function actionOrderdesc(){
        $title = \common\models\NewsBlocks::findOne(['id'=>28]);

        $query = \common\models\OrderDesc::find()->orderBy('date DESC');

        $count = clone $query;

        $pages = new Pagination(['totalCount' => $count->count(), 'pageSize' => 20]);

        $pages->pageSizeParam = false;
        $models = $query->offset($pages->offset)->limit($pages->limit)->all();

        return $this->render('orderdesc', ['models'=>$models, 'pages'=>$pages, 'title'=>$title]);
    }

    public function actionTv(){
        $model = \common\models\StaticPages::findOne(['id'=>17804]);

        return $this->render('tv', ['model'=>$model]);
    }


    /**
     * Logs in a user.
     *
     * @return mixed
     */
    public function actionLogin()
    {
        if (!\Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        } else {
            return $this->render('login', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Logs out the current user.
     *
     * @return mixed
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return mixed
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail(Yii::$app->params['adminEmail'])) {
                Yii::$app->session->setFlash('success', 'Thank you for contacting us. We will respond to you as soon as possible.');
            } else {
                Yii::$app->session->setFlash('error', 'There was an error sending email.');
            }

            return $this->refresh();
        } else {
            return $this->render('contact', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Displays about page.
     *
     * @return mixed
     */
    public function actionAbout()
    {
        return $this->render('about');
    }

    /**
     * Signs user up.
     *
     * @return mixed
     */
    public function actionSignup()
    {
        $model = new SignupForm();
        if ($model->load(Yii::$app->request->post())) {
            if ($user = $model->signup()) {
                if (Yii::$app->getUser()->login($user)) {
                    return $this->goHome();
                }
            }
        }

        return $this->render('signup', [
            'model' => $model,
        ]);
    }

    /**
     * Requests password reset.
     *
     * @return mixed
     */
    public function actionRequestPasswordReset()
    {
        $model = new PasswordResetRequestForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail()) {
                Yii::$app->session->setFlash('success', 'Check your email for further instructions.');

                return $this->goHome();
            } else {
                Yii::$app->session->setFlash('error', 'Sorry, we are unable to reset password for email provided.');
            }
        }

        return $this->render('requestPasswordResetToken', [
            'model' => $model,
        ]);
    }

    /**
     * Resets password.
     *
     * @param string $token
     * @return mixed
     * @throws BadRequestHttpException
     */
    public function actionResetPassword($token)
    {
        try {
            $model = new ResetPasswordForm($token);
        } catch (InvalidParamException $e) {
            throw new BadRequestHttpException($e->getMessage());
        }

        if ($model->load(Yii::$app->request->post()) && $model->validate() && $model->resetPassword()) {
            Yii::$app->session->setFlash('success', 'New password was saved.');

            return $this->goHome();
        }

        return $this->render('resetPassword', [
            'model' => $model,
        ]);
    }
}
