<?php
$search = isset( $_REQUEST['search'] ) ? $_REQUEST['search'] : '';
?>
<form action="index.php" method="get"
  class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
    <input type="hidden" name="controller" value='<?php echo $controller;?>'>
    <input type="hidden" name="action" value='search'>
    <div class="input-group">
        <input type="search" class="form-control bg-light border-0 small" placeholder="Search" name='search' value='<?= $search?>'>
        <div class="input-group-append">
            <button class="btn btn-primary" type="submit">
                <i class="fas fa-search fa-sm"></i>
            </button>
        </div>
    </div>
</form>