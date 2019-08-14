<?php
$tasks = mysql :: select('tasks');
$done_class = '';
$prop = '';
if($tasks) {
?>
<link rel="stylesheet" href="/work/beejee/admin/includes/edit/styles/edit.css">
<div class="container">
  <h2>Hover Rows</h2>
  <p>The .table-hover class enables a hover state on table rows:</p>            
  <table class="table table-hover">
    <thead>
      <tr>
        <th>Firstname</th>
        <th>Email</th>
        <th>Text</th>
        <th>Edit</th>
        <th>Done</th>
      </tr>
    </thead>
    <tbody>
<?php
  	   foreach ($tasks as $tasks) {
          if($tasks['done'] == '1') {
             $done_class = 'done_task';
             $prop = 'checked';
           }
?>
      		<tr>
      	      <td class="<?= $done_class?>"><?= $tasks['user_name'] ?></td>
      	      <td class="<?= $done_class?>"><?= $tasks['user_email'] ?></td>
      	      <td class="<?= $done_class?>"><?= $tasks['task_description'] ?></td>
              <td class="<?= $done_class?>"><a href="?hash=<?= $tasks['id']?>">Edit</a></td>
              <td class="<?= $done_class?>"><?= $tasks['done'] ?></td>
              <input type="hidden" name="id" value="<?= $tasks['id']?>">
          </tr>
<?php
            $done_class = '';
	       }
?>
      </form>
    </tbody>
  </table>
  <a href="?act=add"><button type="button" class="btn btn-primary" style="margin-left: 500px;margin-top: 30px;width: 100px;">Add</button></a>
</div>
<?php
}