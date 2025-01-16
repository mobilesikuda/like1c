<h2><?= esc($titleForm) ?></h2>

<?= session()->getFlashdata('error') ?>
<?= validation_list_errors() ?>

<form action="/news" method="post">
  <?= csrf_field() ?>

  <div class="mb-3 row visually-hidden">
    <label for="inputId" class="form-label">Id</label>
    <input name="id" class="form-control form-control-lg" id="inputId" value="<?= esc($id) ?>"/>
  </div>
  <div class="mb-3 row">
    <label for="InputTitle" class="form-label">Title</label>
    <input name="title" class="form-control form-control-lg" id="InputTitle" value="<?= esc($title) ?>" placeholder="Title of news"/>
  </div> 
  <div class="mb-3 row">
    <label for="inputBody" class="form-label">Body</label>
    <textarea name="body" class="form-control form-control-lg" id="inputBody" rows="3"><?= esc($body) ?></textarea>
  </div>
  <div class="hstack gap-3">
    <div class="p-2">
        <button type="submit" class="btn btn-primary" name="action" value="edit">Write</button>
    </div>
    <div class="p-2 ms-auto">
        <a class="btn btn-secondary" href="/news" role="button">Back to list</a>
    </div>
    <div class="vr"></div>
    <div class="p-2">
        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#staticDelete">
        Delete
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
        <h2><?= esc($title) ?></h2>
        <p><?= esc($body) ?></p>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-danger" name="action" value="delete">Delete</button>  
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Undo</button>
      </div>
    </div>
  </div>
</div>


</form>
