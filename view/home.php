<body>
<div class="content">
<div class="text-center">
  <H4>
    <?=$date['error_search']['search'] ?>
  </H4>
</div>
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
  
  <?php foreach ($date['users']  as $key => $value){ ?>
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
<ul class="pagination">
 
<li><a href=?sortby=<?=$date['SelectSort']['field']?>&order=<?=$date['SelectSort']['order']?>&page=<?=$date['page']['current_page'] -1?> >Назад</a></li>
<?php foreach ($date['page'] as $key => $page ) { ?>
 

<li><a href=?sortby=<?=$date['SelectSort']['field']?>&order=<?=$date['SelectSort']['order']?>&page=<?=$page?> class=<?=$page['active']?> ><?=$page?></a></li>
<?php } ?>
<li><a href=?sortby=<?=$date['SelectSort']['field']?>&order=<?=$date['SelectSort']['order']?>&page=<?=$date['page']['current_page'] +1?> >Вперед</a></li>
</ul>
</div>
</div>
</div>
</tr>
</div>
</body> 