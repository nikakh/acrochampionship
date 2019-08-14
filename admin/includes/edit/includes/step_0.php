<?php
$result_code = 0;
$user_exists = false;
$refresh_url = '?res='.$result_code;
$done = 0;
$done_class = '';
$prop = '';
if(isset($_GET['hash'])
  ) {
  $id = $_GET['hash'];
  
  $select_task = mysql :: select_one('tasks',
                                      "id = '".$id."'");
                                     
      
  if ($select_task) {
    if($select_task['done'] == '1') {
       $done_class = 'done_task';
       $prop = 'checked';
    }
    $result_code = 1;
    $refresh_url = '?res='.$result_code;
    ?>
    <link rel="stylesheet" href="/work/beejee/admin/includes/edit/styles/edit.css">
    <div class="container">
       <form action="" method="post">
          <h2><?= bsw :: get_bsw('edit_task')?></h2>
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
                  <tr>
                      <td class="<?= $done_class?>"><input type="text" name="user_name" value="<?= $select_task['user_name'] ?>"></td>
                      <td class="<?= $done_class?>"><input type="text" name="user_email" value="<?= $select_task['user_email'] ?>"></td>
                      <td class="<?= $done_class?>"><input type="text" name="task_description" value="<?= $select_task['task_description'] ?>"></td>
                      <td class="<?= $done_class?>"><input type="checkbox" name="done" <?= $prop ?> ></td>
                      <input type="hidden" name="id" value="<?= $select_task['id']?>">
                  </tr>
             </tbody>
          </table>
          <button type="submit" class="btn btn-success" name="edit_submit"> <th><?= bsw :: get_bsw('submit_edit')?></th></button>
      </form>
    </div>
<?php
  }
}
?>
