<div class="hstack gap-3 p-2 noprint">
  <h4><?= esc($title) ?></h4>
  <a class="btn btn-primary" href="/catalogs/new" role="button">Add...</a>
</div>

<table class="table table-striped table-bordered table-striped-columns"> 
  <thead>
    <tr class="align-items-center"> <!-- -->
      <th>V</th>
      <th>Name</th>
      <th class="d-none d-lg-block">Title</th>
      <th class='noprint'>Action</th>
    </tr>
  </thead>
  <tbody class="table-group-divider">

  <?php if ($list !== []): ?>
    <?php foreach ($list as $key=>$item): ?>
        <tr>
            <th>
              <input class="form-check-input" type="checkbox" id="inlineCheckbox<?= $key ?>">
            </th>
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