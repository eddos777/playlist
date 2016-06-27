<?php
use yii\bootstrap\Html;
use yii\helpers\Url;

?>

<div class="raw">
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#downloadFromWeb"
            data-type="youtube">Open for Youtube
    </button>
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#downloadFromWeb"
            data-type="vimeo">Open for Vimeo
    </button>
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#downloadFromWeb"
            data-type="vk">Open for Vk
    </button>
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#downloadLocal"
            id="download">Open
        for Download
    </button>
</div>
<div class="raw">
    <?php
    $createUrl = 'create';


    foreach ($videos as $video): ?>

        <iframe width="420" height="345"

        <!--                src="https://www.youtube.com/embed/6t8GF30hs0E">
        -->       </iframe>

    <?php endforeach; ?>
</div>

<div class="modal fade" id="downloadFromWeb" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="exampleModalLabel">New message</h4>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group">
                        <label for="name" class="control-label">Name:</label>
                        <input type="text" class="form-control" id="name" name="name">
                    </div>
                    <div class="form-group">
                        <label for="url" class="control-label">Url:</label>
                        <input type="text" class="form-control" id="url" name="url">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <?= Html::a('Download Video', $createUrl, ['class' => 'btn btn-primary', 'id' => 'create', 'ng-click' => 'save()', "ng-href" => "#here"]) ?>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="downloadLocal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="exampleModalLabel">New message</h4>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group">
                        <label for="name" class="control-label">Name:</label>
                        <input type="text" class="form-control" id="name" name="name">
                    </div>
                    <div class="form-group">
                        <input type="file" class="form-control" id="url" name="url">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <?= Html::a('Download Video', $createUrl, ['class' => 'btn btn-primary', 'id' => 'create']) ?>
            </div>
        </div>
    </div>
</div>