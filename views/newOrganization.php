<?php
/** @var $model \app\models\Organization */
/** @var $this app\core\View */

use app\core\Application;
use app\core\form\Form;

$this->title = 'Új szervezet létrehozása | PassManager';
?>

 <section class="content-header">
     <div class="container-fluid">
         <div class="row mb-2">
             <div class="col-sm-6">
                 <h1>Új szervezet létrehozása</h1>
             </div>
         </div>
     </div>
 </section>

 <section class="content">
     <div class="container-fluid">
         <div class="row">
            <div class="col-12 col-md-4">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Adatok megadása</h3>
                    </div>
                    <?php $form = Form::begin('', 'post'); ?>
                        <div class="card-body">
                            <?php echo $form->field($model, 'orgName', 'fa-solid fa-building') ?>
                            <div>
                                <p class="m-0">Ön létre fog hozni egy szervezetet az alábbi névvel! Biztosan folytatja?</p>
                            </div>
                        </div>

                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Létrehozás</button>
                        </div>
                    <?php Form::end();  ?>
                </div>
            </div>
         </div>
     </div>
 </section>