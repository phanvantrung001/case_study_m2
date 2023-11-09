<div class="col-12">
    <form method="post" action="?controller=room&action=store">
        <div class="mb-3">
            <label class="form-label">Số Phòng</label>
            <input type="text" class="form-control" name="room_number">
            <?php if (isset($errors['room_number'])) : ?>
                <p class="text-danger"><?php echo $errors['room_number'] ?></p>
            <?php endif; ?>
        </div>

        <div class="mb-3">
            <label class="form-label">Giá</label>
            <input type="text" class="form-control" name="price">
            <?php if (isset($errors['price'])) : ?>
                <p class="text-danger"><?php echo $errors['price'] ?></p>
            <?php endif; ?>
        </div>

        <div class="mb-3">
            <label class="form-label">Loại Phòng</label>
            <select name="categories_id" class="form-control">
                <?php foreach ($items as $categorie) : ?>
                    <option value="<?php echo $categorie['id']; ?>"><?php echo $categorie['name']; ?></option>
                <?php endforeach; ?>
            </select>
            <?php if (isset($errors['tendm'])) : ?>
                <p class="text-danger"><?php echo $errors['tendm'] ?></p>
            <?php endif; ?>
        </div>
        <div class="mb-3">
            <label class="form-label">Tình Trạng Phòng</label>
            <input type="text" class="form-control" name="is_available">
            <?php if (isset($errors['is_available'])) : ?>
                <p class="text-danger"><?php echo $errors['is_available'] ?></p>
            <?php endif; ?>
        </div>

        <br>
        <button type="submit" class="btn btn-primary">Thêm</button>
        <a type="button" href="index.php?controller=room" class="btn btn-secondary">Back</a>
    </form>
</div>