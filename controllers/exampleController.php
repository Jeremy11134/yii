<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;


/**
 * CountryController implements the CRUD actions for country model.
 * Code by Jeremy Versteeg
 */

class ExampleController extends Controller
{
  public function actionSay($message = 'jeremy')
  {
    echo "Hello $message";
    exit;
  }
}