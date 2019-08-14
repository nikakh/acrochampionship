<div class="container" style="width: 380px; margin: auto;">
  <h1><?= bsw :: get_bsw('add_task')?></h1>
    <div class="card bg-light">
      <article class="card-body mx-auto">
        <form method="post" action="">
          <div class="form-group input-group">
            <div class="input-group-prepend">
              <span class="input-group-text"> <i class="fa fa-user"></i> </span>
            </div>
              <input name="name" class="form-control" placeholder="Full name" type="text">
            </div>
            <div class="form-group input-group">
              <div class="input-group-prepend">
                 <span class="input-group-text"> <i class="fa fa-envelope"></i> </span>
              </div>
              <input name="email" class="form-control" placeholder="Email address" type="email">
            </div>
            <div class="form-group input-group">
              <textarea class="form-control" placeholder="Add text" type="password" name="text"></textarea>
            </div>
            <div class="form-group input-group">            
          <div class="form-group">
              <button type="submit" class="btn btn-primary btn-block" name="add_submit"> <?= bsw :: get_bsw('create_account')?> </button>
          </div>                                                              
        </form>
      </article>
    </div>
  </div> 