<div id="catalog_index">
<h4><?= esc($titles['title']) ?></h4>
<div class="hstack gap-3 p-2 d-print-none">
  <a class="btn btn-secondary" onclick="refreshView()" role="button"><?= $buttons['Update']?></a>
  <a class="btn btn-primary" href="/catalogs/new" role="button"><?=$buttons['Add'] ?></a>
  <input class="form-control me-auto" type="text" onchange="refreshView()" id="findString" placeholder=<?=$buttons['Filter_place_holder']?> value="<?= esc($findString) ?>">
</div>

<table class="table table-striped table-bordered table-striped-columns"> 
  <thead>
    <tr class="align-items-center"> 
      <th>V</th>
      <th><?= esc($titles['name']) ?></th>
      <th class="d-none d-lg-block d-print-block"><?= esc($titles['comment']) ?></th>
      <th class='d-print-none'><?=$buttons['Action'] ?></th>
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
            <td class="d-none d-lg-block d-print-block"><?= esc($item['title']) ?></td>
            <td class='d-print-none'><a class="btn btn-primary btn-sm" href="<?= 'catalogs/'.esc($item['id']) ?>"><?=$buttons['Edit'] ?></td>
        </tr>
    <?php endforeach ?> 
  <?php endif ?>
  </tbody>
</table>
<div class="d-print-none">
<?= $pager->links() ?>
</div>

<script type="text/javascript">

  makeStylePager();

  function makeStylePager(){
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
      if(nodeList2[i].children.length > 0){
        text = nodeList2[i].children.item(0).innerHTML;
        switch(text){ 
          case "Last": 
            nodeList2[i].children[0].innerHTML = ">>|";
            break;
          case "Next":
            nodeList2[i].children[0].innerHTML = ">>";
            break;
          case "First": 
            nodeList2[i].children[0].innerHTML = "|<<";
            break;
          case "Previous":
            nodeList2[i].children[0].innerHTML = "<<";
            break;
        }
      } 
    }
  }
 
  function refreshView() { 

    var data = JSON.stringify({
      'strFind': document.getElementById("findString").value,
    });

    return fetch('catalogs/update_view', {
      method: "POST",
      body: data,
      headers: {
        "Content-Type": "application/json", 
        "X-Requested-With": "XMLHttpRequest"
      }})
      .then( response => response.text() )
      .then( result => {
          document.getElementById("catalog_index").innerHTML = result;
          makeStylePager();
      });
  }
</script>