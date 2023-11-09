<div class="col-12">
<form action="?controller=room&action=store" method="post" enctype="multipart/form-data">
        <div class="mb-3">
            <label class="form-label">Tên</label>
            <input type="type" class="form-control" name="name_service">
            <?php if (isset($errors['name_service'])) : ?>
                <p class="text-danger"><?php echo $errors['name_service'] ?></p>
            <?php endif; ?>
        </div>
        <div class="mb-3">
            <label class="form-label">Giá</label>
            <input type="type" class="form-control" name="price">
            <?php if (isset($errors['price'])) : ?>
                <p class="text-danger"><?php echo $errors['price'] ?></p>
            <?php endif; ?>
        </div>
        <br>
        <button type="submit" class="btn btn-primary">Đặt</button>
        <a type="button" href="index.php?controller=service" class="btn btn-secondary">quay lại</a>
    </form>
</div>