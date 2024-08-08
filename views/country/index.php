<?php

use app\models\Country;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\CountrySearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */




$this->title = 'Countries';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="country-index">

    <h1><?= Html::encode($this->title) ?></h1>



    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            

           

            //'Code',
            [
                'label' => 'Naam',
                'attribute' => 'Name',
                'format' => 'raw',
                'value' => function($data) {
                    return '<strong>' . $data->Name . '</strong>';
                },
            ],
            
            //'Continent',
            //'Region',
            //'IndepYear',
            [
                'attribute' => 'Population',
                'contentOptions' => ['style' => 'width:30px; white-space: normal;'],
            ],

            [
                'label' => 'Bovolkingsdichtheid <voornaam>',
                'attribute'=>'Population',
                'contentOptions' => ['style' => 'width:30px; white-space: normal; color: red;'],
                'format' => 'raw',
                 'value' => function ($data) {
                    $density = $data->Population/$data->SurfaceArea;
                    return number_format($density, 2);
                 }
               ],

               ['class' => 'yii\grid\ActionColumn', 'template' => '{update} {delete}',],
            
            
                    ]
            
            //'LifeExpectancy',
            //'GNP',
            //'GNPOld',
            //'LocalName',
            //'GovernmentForm',
            //'HeadOfState',    
            //'Code2',
            
        ],
    );
    
?>

<p>
        <?= Html::a('Create Country', ['create'], ['class' => 'btn btn-success']) ?>
    </p>


</div>




