
<h2><?= esc($title) ?></h2>
  <div class="hstack gap-3 p-2 noprint">
    <a class="btn btn-primary" href="/catalogs/new" role="button">Add...</a>
  </div>

<!-- p>< = var_dump( esc($news_list)) ></p -->

<table class="table table-bordered">
  <thead >
    <tr class="align-items-center">
      <!-- th scope="col">#</th -->
      <th scope="col">V</th>
      <th scope="col">Name</th>
      <th scope="col" class="d-none d-lg-block">Title</th>
      <th scope="col" class='noprint'>Action</th>
    </tr>
  </thead>
  <tbody class="table-group-divider">

  <?php if ($list !== []): ?>
    <?php foreach ($list as $key=>$item): ?>
        <tr>
            <td>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" id="inlineCheckbox<?= $key ?>">
            </div>
            </td>
            <td><?= esc($item['name']) ?></td>
            <td class="d-none d-lg-block"><?= esc($item['title']) ?></td>
            <td class='noprint'><a class="btn btn-primary btn-sm" href="<?= 'catalogs/'.esc($item['id']) ?>"/>Edit</td>
        </tr>
    <?php endforeach ?>
  <?php endif ?>

  </tbody>
</table>

<!-- script type="text/javascript">
  document.getElementById("findString").onchange = function() {
    document.getElementById("updateButton").href= "/news/?find=" + document.getElementById("findString").value; 
    return false;
  };
</script -->