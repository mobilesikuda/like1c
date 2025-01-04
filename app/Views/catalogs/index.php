<div id="catalog_index">
<div class="hstack gap-3 p-2 noprint">
  <h4><?= esc($title) ?></h4>
  <a class="btn btn-primary" href="/catalogs/new" role="button">Add...</a>
  <input class="form-control me-auto" type="text" oninput="refreshView()" id="findString" placeholder="Filter..." value="<?= esc($findString) ?>">
  <a class="btn btn-secondary" onclick="refreshView()" role="button">Update</a>
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
            <td class='noprint'><a class="btn btn-primary btn-sm" href="<?= 'catalogs/'.esc($item['id']) ?>">Edit</td>
        </tr>
    <?php endforeach ?> 
  <?php endif ?>
  </tbody>
</table>
<?= $pager->links() ?>

<script type="text/javascript">
 
  //make style - https://getbootstrap.com/docs/5.3/components/pagination/
  nodeNavUl = document.querySelector("ul.pagination");
  nodeNavUl.classList.add("justify-content-end");
  const nodeList1 = document.querySelectorAll("ul.pagination > li"); 
  for (let i = 0; i < nodeList1.length; i++) {
    nodeList1[i].classList.add("page-item");
  }
  const nodeList2 = document.querySelectorAll("ul.pagination > li > a"); 
  for (let i = 0; i < nodeList2.length; i++) {
    nodeList2[i].classList.add("page-link");
  }
 

  function refreshView() { 

    var data = JSON.stringify({
      'strFind': document.getElementById("findString").value,
    });

    return fetch('catalogs/update_view', {
      method: "POST",
      body: data,
      headers: {
        "Content-Type": "application/json", //"text/plain"
        "X-Requested-With": "XMLHttpRequest"
      }})
      .then( response => response.text() )
      .then( result => {
          document.getElementById("catalog_index").innerHTML = result;
          //alert("Ok"); 
      });
  }

</script>