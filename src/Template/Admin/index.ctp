<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User[]|\Cake\Collection\CollectionInterface $users
 */
?>
<!-- コンテンツヘッダ -->
<section class="content-header">
    <h1>顧客管理一覧</h1>
</section>

<!-- メインコンテンツ -->
<section class="content">

    <!-- コンテンツ1 -->
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">検索フォーム</h3>
        </div>
        <div class="form-group">
            <?= $this->Form->create('', ['url'=>['action'=>'index'], 'type'=>'get']) ?>
            <label></label>
            <?= $this->Form->control('s_name', ["type"=>"text", "value"=>$sName, "class"=>"form-control", "label"=>false, "placeholder"=>"氏名（部分一致）"]) ?>
            <?= $this->Form->control('s_tel', ["type"=>"text", "value"=>$sTel, "class"=>"form-control", "label"=>false, "placeholder"=>"電話番号（完全一致）"]) ?>
            <?= $this->Form->button("検索", ["class"=>"btn btn-primary"]) ?>
            <?= $this->Form->end() ?>
        </div>

        <div class="form-group">
            <?= $this->Html->link("新規登録", ['action' => 'add'], ["class"=>"btn btn-primary"]) ?>
        </div>
    </div>

    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">顧客一覧</h3>
            <p><?= $this->Paginator->counter(['format' => "総件数{{count}}件"]) ?></p>
        </div>

        <div class="dataTables_paginate paging_simple_numbers" id="example2_paginate">
            <ul class="pagination">
                <?= $this->Paginator->prev('<<') ?>
                <?= $this->Paginator->numbers([
                    "modulus"=>4
                ]) ?>
                <?= $this->Paginator->next('>>') ?>
            </ul>
        </div>

        <table id="example2" class="table table-bordered table-hover dataTable" role="grid">
            <thead>
                <tr role="row">
                    <th rowspan="1" colspan="1">id</th>
                    <th rowspan="1" colspan="1">氏名</th>
                    <th rowspan="1" colspan="1">電話番号</th>
                    <th rowspan="1" colspan="1">都道府県</th>
                    <th rowspan="1" colspan="1"></th>
                    <th rowspan="1" colspan="1"></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($customers as $customer){ ?>
                <tr role="row" class="odd">
                    <td><?= $this->Number->format($customer->id) ?></td>
                    <td><?= h($customer->name) ?></td>
                    <td><?= h($customer->tel) ?></td>
                    <td><?= isset($customer->pref) ? h($customer->pref->name):"" ?></td>
                    <td>
                        <?= $this->Html->link("編集", ['action' => 'edit', $customer->id]) ?>
                    </td>
                    <td>
                    <?= $this->Form->postLink("削除", ['action' => 'delete', $customer->id], ['confirm' => __('ID:{0}のデータを削除しますか?', $customer->id)]) ?>
                    </td>
                </tr>
                <?php } ?>
            </tbody>
        </table>

        <?= $this->Html->link("csvダウンロード", ['action' => 'downCsvCus']) ?>
        <div class="dataTables_paginate paging_simple_numbers" id="example2_paginate">
            <ul class="pagination">
                <?= $this->Paginator->prev('<<') ?>
                <?= $this->Paginator->numbers([
                    "modulus"=>4
                ]) ?>
                <?= $this->Paginator->next('>>') ?>
            </ul>
        </div>


    </div>
</section>
