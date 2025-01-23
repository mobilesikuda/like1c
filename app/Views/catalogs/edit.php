<h2><?= $titles['item'] ?></h2>

<?= session()->getFlashdata('error') ?>
<?= validation_list_errors() ?>

<form action="/catalogs" method="post">
  <?= csrf_field() ?>

  <div class="mb-3 row visually-hidden">
    <label for="inputId" class="form-label">Id</label>
    <input name="id" class="form-control form-control-lg" id="inputId" value="<?= esc($id) ?>"/>
  </div>
  <div class="mb-3 row">
    <label for="InputName" class="form-label">Name</label>
    <input name="name" class="form-control form-control-lg" id="InputName" value="<?= esc($name) ?>" placeholder="Title of catalogs"/>
  </div> 
  <div class="mb-3 row">
    <label for="inputTitle" class="form-label">Title</label>
    <textarea name="title" class="form-control form-control-lg" id="inputTitle" rows="3"><?= esc($title) ?></textarea>
  </div>
  <div class="hstack gap-3">
    <div class="p-2">
        <button type="submit" class="btn btn-primary" name="action" value="edit"><?=$buttons['Write']?></button>
    </div>
    <div class="p-2 ms-auto">
        <a class="btn btn-secondary" href="/catalogs" role="button"><?=$buttons['Back']?></a>
    </div>
    <div class="vr"></div>
    <div class="p-2">
        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#staticDelete">
        <?=$buttons['Delete']?>
      </button>
    </div>
  </div>

<!-- Modal Delete -->
<div class="modal fade" id="staticDelete" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="staticBackdropLabel">Modal delete</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        Are you sure erase item?
        <h2><?= esc($name) ?></h2>
        <p><?= esc($title) ?></p>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-danger" name="action" value="delete"><?=$buttons['Delete']?></button>  
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><?=$buttons['Undo']?></button>
      </div>
    </div>
  </div>
</div>

</form>
