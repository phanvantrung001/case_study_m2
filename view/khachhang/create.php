<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-header">
                        <form action="?controller=user&action=store" method="post" enctype="multipart/form-data">
                            <div class="mb-3">
                                <label class="form-label">TÊN</label>
                                <input type="text" name="ten" class="form-control">
                                <?php if (isset($errors['ten'])) : ?>
                                    <p class="text-danger"><?php echo $errors['ten'] ?></p>
                                <?php endif; ?>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">CCCD</label>
                                <input type="text" class="form-control" name="cccd">
                                <?php if (isset($errors['cccd'])) : ?>
                                    <p class="text-danger"><?php echo $errors['cccd'] ?></p>
                                <?php endif; ?>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">SỐ ĐIỆN THOẠI</label>
                                <input type="text" class="form-control" name="so_dien_thoai">
                                <?php if (isset($errors['so_dien_thoai'])) : ?>
                                    <p class="text-danger"><?php echo $errors['so_dien_thoai'] ?></p>
                                <?php endif; ?>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">ĐỊA CHỈ</label>
                                <input type="text" class="form-control" name="dia_chi">
                                <?php if (isset($errors['dia_chi'])) : ?>
                                    <p class="text-danger"><?php echo $errors['dia_chi'] ?></p>
                                <?php endif; ?>
                            </div>
                            <button type="submit" class="btn btn-primary">Thêm</button>
                            <a type="button" href="index.php?controller=user" class="btn btn-secondary">Quay Lại</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- END: @yield('content') -->
    </div>
</div> 
<!-- @include('includes.footer') -->