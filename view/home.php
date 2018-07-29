<body>
<div class="content">
<table class="table table-striped table-hover">Список
  <thead class="table-info">
    <tr >
    <?php foreach ($date['SortButton']  as $key => $named){ 
      foreach ($named as $href) {
      
      ?>
      <th scope="col" ><a href=?sortby=<?=$key?>&order=<?=$href['sort']?>&page=<?=$date['page']['current_page'] ?><?=$date['search']?> ><i class="<?=$href['image']?>" id="order by name"></i></a><?=$date['theads'][$key]?></th>
       
      
       <?php }} ?>
      
    </tr>
  </thead>
  <tbody>
  
  <?php foreach ($date['users']  as $value){ ?>
      <tr>
         <td> <?=$value['name']?></td>
         <td> <?=$value['surname']?></td>
         <td> <?=$value['mark']?></td>
         <td> <?=$value['age']?></td>
      
      </tr>
  
    <tr>
        <?php } ?>
</tbody>
</table>
<div class="container">
<div class="row">
<div class="col-md-10 col-sm-12 col-xs-12 my-col text-center">
<?php foreach ($date['page'] as $key => $page) { ?>
 

<a href=?sortby=<?=$date['SelectSort']['field']?>&order=<?=$date['SelectSort']['order']?>&page=<?=$page?> ><?=$page?></a>
<?php } ?>
</div>
</div>
</div>
</tr>
</div>
</body> 