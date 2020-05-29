<?php
/* @var $generator Jsyqw\Layuigii\crud\Generator */
/* @var $model \yii\db\ActiveRecord */
$model = new $generator->modelClass();
$safeAttributes = $model->safeAttributes();
if (empty($safeAttributes)) {
    $safeAttributes = $model->attributes();
}
?>
<?= "<?php ";?>/* @var $model <?= $generator->modelClass ?> */<?= " ?>";?>
<?php echo "\n" ?>
<div class="view-content">
    <?php
    $model = new $generator->modelClass();
    foreach ($generator->getColumnNames() as $attribute) {
        if (in_array($attribute, $safeAttributes)) {
            $label = $model->getAttributeLabel($attribute);
            $item = <<<ITEM
        <div class="view-row">
            <div class="layui-col-md4 view-row-title">
                $label
            </div>
            <div class="layui-col-md8 view-row-content">
                <?= \$model->$attribute ?>
            </div>
        </div>
ITEM;
            $item .= "\n";
            echo $item;
        }
    } ?>
</div>