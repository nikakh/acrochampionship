<?php
$mysql_sort = "done DESC";
if(isset($_GET['sort']) && $_GET['sort'] != '') {
	$sort = $_GET['sort'];
	if ($sort == 'name_d') {
		$mysql_sort = 'user_name ASC';
	}elseif($sort == 'name_a') {
		$mysql_sort == 'user_name DESC';
	}elseif($sort == 'done_d') {
		$mysql_sort == 'done DESC';
	}elseif($sort == 'done_a') {
		$mysql_sort = 'done ASC';
	}
}
$tasks = mysql :: select('tasks',
						 "",
						 "".$mysql_sort."",
						 '*',
						 ''); 

$one_task = mysql :: select_one('tasks',
                                "done = 1");
$i = 1;
$b = 0;
$c = count($tasks);
$done = 'No!';
$done_class = '';
$prop = '';
if($tasks) {
?>
<link rel="stylesheet" href="/work/beejee/admin/includes/edit/styles/edit.css">
<div class="container">
	<?= bsw :: set_bsw('sort_by', 'Sort By')?>
		<a href="?sort=name_d"><option><?= bsw :: get_bsw('name_a_z')?></option></a>
		<a href="?sort=name_a"><option><?= bsw :: get_bsw('name_z_a')?></option></a>
		<a href="?sort=done_d"><option><?= bsw :: get_bsw('done_y_n')?></option></a>
		<a href="?sort=done_a"><option><?= bsw :: get_bsw('done_n_y')?></option></a>
  <h2>Tasks List For All Users</h2>         
  <table class="table table-hover">
    <thead>
      <tr>
        <th><?= bsw :: get_bsw('firstname')?></th>
        <th><?= bsw :: get_bsw('email')?></th>
        <th><?= bsw :: get_bsw('text')?></th>
        <th><?= bsw :: get_bsw('done')?></th>
      </tr>
    </thead>
    <tbody>
<?php
  	   foreach ($tasks as $tasks) {
          if($tasks['done'] == '1') {
             $done_class = 'done_task';
             $prop = 'checked';
             $done = 'Yes';
           }
?>
	      		<tr>
	      	      <td class="<?= $done_class?>"><?= $tasks['user_name'] ?></td>
	      	      <td class="<?= $done_class?>"><?= $tasks['user_email'] ?></td>
	      	      <td class="<?= $done_class?>"><?= $tasks['task_description'] ?></td>
	              <td class="<?= $done_class?>"><?= $done ?></td>
	              <input type="hidden" name="id" value="<?= $tasks['id']?>">
	          </tr>
<?php	
		$done_class = '';
		$done = 'No!';
		$i++;
	   }
?>
      </form>
    </tbody>
  </table>
</div>
<?php
}