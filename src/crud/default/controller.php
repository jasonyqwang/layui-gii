<?php
/**
 * This is the template for generating a CRUD controller class file.
 */

use yii\db\ActiveRecordInterface;
use yii\helpers\StringHelper;


/* @var $this yii\web\View */
/* @var $generator yii\gii\generators\crud\Generator */

$controllerClass = StringHelper::basename($generator->controllerClass);
$modelClass = StringHelper::basename($generator->modelClass);
$searchModelClass = StringHelper::basename($generator->searchModelClass);
if ($modelClass === $searchModelClass) {
    $searchModelAlias = $searchModelClass . 'Search';
}

/* @var $class ActiveRecordInterface */
$class = $generator->modelClass;
$pks = $class::primaryKey();
$urlParams = $generator->generateUrlParams();
$actionParams = $generator->generateActionParams();
$actionParamComments = $generator->generateActionParamComments();

echo "<?php\n";
?>

namespace <?= StringHelper::dirname(ltrim($generator->controllerClass, '\\')) ?>;

use Yii;
use <?= ltrim($generator->modelClass, '\\') ?>;
use <?= ltrim($generator->baseControllerClass, '\\') ?>;
use app\core\helpers\RequestHelper;

/**
 * <?= $controllerClass ?> implements the CRUD actions for <?= $modelClass ?> model.
 */
class <?= $controllerClass ?> extends <?= StringHelper::basename($generator->baseControllerClass) . "\n" ?>
{
    /**
    * 列表
    * @return array
    */
    public function actionLists(){
        if(!RequestHelper::instance()->isAjax){
            return $this->render('lists');
        }
        $currentPage = RequestHelper::get('page', 1);
        $pageSize = RequestHelper::get('limit', 10);
        $key = RequestHelper::get('key', '');
        $offset = ($currentPage - 1) * $pageSize;

        $query = <?= $modelClass ?>::find();
        if($key){
            //$query->andWhere('name like :name', [':name' => "%$key%"]);
        }
        $total = $query->count();
        $lists = $query->limit($pageSize)
        ->offset($offset)
        ->asArray()
        ->all();

        return $this->success([
            'lists' => $lists,
            'total' => $total
        ]);
    }

    /**
    * 创建
    * @return array
    */
    public function actionCreate()
    {
        if(!RequestHelper::instance()->isAjax){
            $model = new <?= $modelClass ?>();
            return $this->render('create',[
                'model' => $model
            ]);
        }
        $data = RequestHelper::post();
        //$data['create_time'] = time();
        //$data['update_time'] = time();

        $model = new <?= $modelClass ?>();
        $model->setAttributes($data);
        $ret = $model->save();
        if (!$ret) {
            return $this->error('添加失败');
        }
        return $this->success();
    }


    /**
    * 编辑
    * @return array
    */
    public function actionEdit()
    {
        if(!RequestHelper::instance()->isAjax){
            $id = RequestHelper::get('id');
            $model = <?= $modelClass ?>::find()->where([
                'id' => $id
            ])->one();

            return $this->render('edit',[
                'model' => $model
            ]);
        }
        $id = RequestHelper::get('id');
        $data =  RequestHelper::post();
        $model = <?= $modelClass ?>::find()->where([
            'id' => $id
        ])->one();
        if (!$model) {
            return $this->paramsError('信息不存在');
        }
        $model->setAttributes($data);
        //$model->update_time = time();

        $ret = $model->save();
        if (!$ret) {
            return $this->error('修改失败');
        }
        return $this->success();
    }

    /**
    * 编辑
    */
    public function actionView()
    {
        if(!RequestHelper::instance()->isAjax){
            $id = RequestHelper::get('id');
            $model = <?= $modelClass ?>::find()->where([
                'id' => $id
            ])->one();

            return $this->render('view',[
                'model' => $model
            ]);
        }
        $id = RequestHelper::get('id');
        $model = <?= $modelClass ?>::find()->where([
            'id' => $id
        ])->one();

        return $this->success($model->toArray());
    }

    /**
    * 删除
    */
    public function actionDelete()
    {
        $id = RequestHelper::post('id');
        $model = <?= $modelClass ?>::find()->where([
            'id' => $id
        ])->one();
        if(!$model || $model->delete()){
            return $this->success();
        }
        return $this->error('删除失败');
    }
}