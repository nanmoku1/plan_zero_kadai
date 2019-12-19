<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Customer $customer
 */
$this->assign('title', '顧客管理更新');
?>
<!-- コンテンツヘッダ -->
<section class="content-header">
    <h1>顧客管理_更新</h1>
</section>

<!-- メインコンテンツ -->
<section class="content">
    <div class="box">
        <!-- コンテンツ1 -->
        <div style="height:120px;">
            <?php if($customer->hasErrors()){ ?>
            <div class="alert alert-danger alert-dismissible">

                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <?php
                $errors = $customer->getErrors();
                foreach($errors as $err1){
                    foreach($err1 as $err2){
                ?>
                <p><?= "※{$err2}" ?></p>
                <?php
                    }
                }
                ?>
            </div>
            <?php } ?>
        </div>

        <?= $this->Form->create($customer) ?>
        <div class="form-group">
            <label class="col-sm-2 control-label">id</label>

            <div class="col-sm-10">
                <label class="control-label"><?= $customer->id ?></label>
            </div>
        </div>
        <div class="form-group">
            <label for="name" class="col-sm-2 control-label">必須</label>

            <div class="col-sm-10">
                <?= $this->Form->control('name', ["type"=>"text", "class"=>"form-control", "label"=>false, 'required' => false, 'error'=>false, "placeholder"=>"氏名"]) ?>
            </div>
        </div>

        <div class="form-group">
            <label for="tel" class="col-sm-2 control-label">必須</label>

            <div class="col-sm-10">
                <?= $this->Form->control('tel', ["type"=>"text", "class"=>"form-control", "label"=>false, 'required' => false, 'error'=>false, "placeholder"=>"電話番号（半角数字・ハイフン無し）"]) ?>
            </div>
        </div>

        <div class="form-group">
            <label for="pref_id" class="col-sm-2 control-label">必須</label>
            <div class="col-sm-10">
                <?= $this->Form->control('pref_id', [
                'type' => 'select',
                'label'=>false,
                'class'=>'form-control',
                'required' => false,
                'error'=>false,
                'options' => $cPrefs,
                'multiple' => false,
                'empty' => ''
            ]) ?>
            </div>
        </div>

        <div class="form-group">
            <?= $this->Form->button("更新する", ["class"=>"btn btn-primary"]) ?>
            <?= $this->Html->link("戻る", ['action' => 'index'], ["class"=>"btn btn-primary pull-right"]) ?>
        </div>

        <?= $this->Form->end() ?>
    </div>
</section>
