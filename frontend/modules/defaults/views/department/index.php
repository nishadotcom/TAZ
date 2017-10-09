<?php

use yii\helpers\Html;
//use yii\grid\GridView;
use kartik\grid\GridView;
use kartik\editable\Editable;
use kartik\icons\Icon;
use frontend\widgets\Defaults;

$this->title = 'Defaults';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="page-title customTitle">
  <h1>
    <?= Html::encode($this->title) ?>
  </h1>
</div>
<div class="row">
  <div class="col-sm-12">
    <div class="widget-container fluid-height">
      <div class="widget-content padded">
        <div>
          <?= Yii::$app->session->getFlash('msg'); ?>
        </div>
        <?php
                    // Create a panel layout for your GridView widget
                    echo GridView::widget([
                        'dataProvider' => $dataProvider,
                        'filterModel' => $searchModel,
                        //'columns' => $gridColumns,
                        'columns' => [
                            [
                               'attribute'=>'name', 
                                'vAlign'=>'middle',
                                'width'=>'1100px',
                                'value'=> 'name',                                
                                'format'=>'raw' 
                            ],                            
                            /* [
                              'class' => 'kartik\grid\EditableColumn',
                              'attribute'=>'title',
                              'label' => 'Title',
                              'editableOptions'=> [
                              'header' => 'Title',
                              //'format' => Editable::FORMAT_BUTTON, 'button'
                              //'editableValueOptions'=>['class'=>'well well-sm']
                              ]
                              ], */
                            
                            //['header' => 'Actions', 'class' => 'yii\grid\ActionColumn','template'=>'{update} {delete}'],
                            [
                                'header'=>'Action',				
                                'class' => 'yii\grid\ActionColumn',
                                'template'=>'{update} {delete}'
                            ],
                        ],
                        'resizableColumns' => true,
                        'responsive' => false,
                        'containerOptions' => ['style' => 'overflow: auto'], // only set when $responsive = false
                        'headerRowOptions' => ['class' => 'kartik-sheet-style'],
                        'filterRowOptions' => ['class' => 'kartik-sheet-style'],
                        'beforeHeader' => [
                            'columns' => [
                                ['content' => 'Header Before 1', 'options' => ['colspan' => 5, 'class' => 'text-center warning']],
                                ['content' => 'Header Before 2', 'options' => ['colspan' => 3, 'class' => 'text-center warning']],
                                ['content' => 'Header Before 3', 'options' => ['colspan' => 3, 'class' => 'text-center warning']],
                            ],
                            'options' => ['class' => 'skip-export'] // remove this row from export
                        ],
                        'toolbar' => [
                            [
                                'content' =>
                                Html::a('<i class="glyphicon glyphicon-plus"></i>', ['add'], [
                                    'title' => 'Add Department',
                                    'class' => 'btn btn-success'
                                ]) . ' ' .
                                Html::a('<i class="glyphicon glyphicon-import"></i>', ['import'], [
                                    'title' => 'Import',
                                    'class' => 'btn btn-primary'
                                ]) . ' ' .
                                Html::a('<i class="glyphicon glyphicon-repeat"></i>', ['index'], [
                                    'class' => 'btn btn-info',
                                    'title' => 'Reset Grid'
                                ]),
                                
                            //'options' => ['class' => 'btn-group-sm']
                            ],
                            Yii::$app->Common->defaultsExportMenu()
                        ],
                        'pjax' => true, // pjax is set to always true for this demo
                        //'condensed' => true,
                        'pjaxSettings' => [
                            'neverTimeout' => true,
                            'options' => [
                                'id' => 'kv-unique-id-1',
                            ]
                        ],
                        'hover' => true,
                        'panel' => [
                            'type' => GridView::TYPE_PRIMARY,
                            'heading' => '<i class="glyphicon glyphicon-book"></i>  Departments',
/*								'before' => '<div><em>* Resize table columns just like a spreadsheet by dragging the column edges.</em></div>',
*/                        //'after' => '<div style="padding-top: 5px;"><em>* Select a row that you want to delete.</em></div><div class="clearfix"></div>',
                        ],
                            //'export' => false,
                    ]);
                    ?>
      </div>
    </div>
  </div>
</div>
