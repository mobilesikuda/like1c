
<h2><?= esc($title) ?></h2>
  <div class="hstack gap-3 p-2">
    <a class="btn btn-primary" href="/news/new" role="button">Add...</a>
    <input class="form-control me-auto" type="text" id="findString" placeholder="Filter..." value="<?= esc($findString) ?>">
    <a class="btn btn-secondary" href="/news/?find=" id="updateButton" role="button">Update</a>
  </div>

<!-- p><= var_dump( esc($news_list)) ?></p -->

<table class="table table-striped table-bordered">
  <thead >
    <tr class="align-items-center">
      <!-- th scope="col">#</th -->
      <th scope="col">V</th>
      <th scope="col">Title</th>
      <th scope="col" class="d-none d-lg-block">Context</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody class="table-group-divider">

  <?php if ($news_list !== []): ?>

    <?php foreach ($news_list as $key=>$news_item): ?>

        <tr>
            <td>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" id="inlineCheckbox<?= $key ?>">
            </div>
            </td>
            <td><?= esc($news_item->title) ?></td>
            <td class="d-none d-lg-block"><?= esc($news_item->body) ?></td>
            <td><a class="btn btn-primary btn-sm" href="<?= 'news/'.esc($news_item->id) ?>"/>Edit</td>
        </tr>

    <?php endforeach ?>

  <?php endif ?>

  </tbody>
</table>

<script type="text/javascript">
  document.getElementById("findString").onchange = function() {
    document.getElementById("updateButton").href= "/news/?find=" + document.getElementById("findString").value; 
    return false;
  };
</script>