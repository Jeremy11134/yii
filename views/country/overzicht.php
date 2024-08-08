<?php
use app\models\Countrylanguage;
use app\models\CountrySearch;
use yii\helpers\Html;
?>


    // Jeremy




<h1>Overzicht Europe</h1>

<table style="border-collapse: collapse; width: 100%;">
    <thead>
        <tr>
            <th><strong>Land</strong></th>
            <th><strong>Hoofdstad</strong></th>
            <th><strong>Surface Area</strong></th>
            <th><strong>Languages</strong></th>
        </tr>
    </thead>
    <tbody>
        <?php
        usort($countries, function ($a, $b) {
            return $b->SurfaceArea - $a->SurfaceArea;
        });

        foreach ($countries as $country):
        ?>
            <tr>
                <td><?= Html::encode($country->Name) ?></td>
                <td>
                    <?php
                    if ($country->Capital !== null) {
                        echo Html::a(Html::encode($country->hoofdstad->Name), ['city/view', 'ID' => $country->hoofdstad->ID]);
                    }
                    ?>
                </td>
                <td><?= number_format($country->SurfaceArea, 0, ',', ',') ?></td>
                <td>
                    <?php
                    $langs = $country->countrylanguages;

                    
                    usort($langs, function ($a, $b) {
                        return $b->Percentage <=> $a->Percentage;
                    });

                    
                    foreach ($langs as $taal) {
                        echo Html::encode($taal->Language) . ' (' . $taal->Percentage . '%)<br>';
                    }
                    ?>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>