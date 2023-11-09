<form method="post" action="?controller=user&action=update&id=<?= $item['id']; ?>" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?php echo $item['id']; ?>">
    <div class="mb-3">
        <label class="form-label">TÊN</label>
        <input type="text" value="<?php echo $item['ten']; ?>" name="ten" class="form-control">
        <?php if (isset($errors['ten'])) : ?>
            <p class="text-danger"><?php echo $errors['ten'] ?></p>
        <?php endif; ?>
    </div>
    <div class="mb-3">
        <label class="form-label">CCCD</label>
        <input type="text" value="<?php echo $item['cccd']; ?>" class="form-control" name="cccd">
        <?php if (isset($errors['cccd'])) : ?>
            <p class="text-danger"><?php echo $errors['cccd'] ?></p>
        <?php endif; ?>
    </div>
    <div class="mb-3">
        <label class="form-label">SỐ ĐIỆN THOẠI</label>
        <input type="text" value="<?php echo $item['so_dien_thoai']; ?>" class="form-control" name="so_dien_thoai">
        <?php if (isset($errors['so_dien_thoai'])) : ?>
            <p class="text-danger"><?php echo $errors['so_dien_thoai'] ?></p>
        <?php endif; ?>
    </div>
    <div class="mb-3">
        <label class="form-label">ĐỊA CHỈ</label>
        <input type="text" value="<?php echo $item['dia_chi']; ?>" class="form-control" name="dia_chi">
        <?php if (isset($errors['dia_chi'])) : ?>
            <p class="text-danger"><?php echo $errors['dia_chi'] ?></p>
        <?php endif; ?>
    </div>
    <button type="submit" class="btn btn-primary">SAVE</button>
    <a href="?controller=user&action=index" class="btn btn-secondary">BACK</a>
</form>
