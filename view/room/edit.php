<div class="col-12">
    <form method="post" action="?controller=room&action=store">
        <div class="mb-3">
            <label class="form-label">Số Phòng</label>
            <select name="categories_id" class="form-control">
                <?php foreach ($items as $room) : ?>
                    <option value="<?php echo $room['id']; ?>">
                        <?php echo $room['room_number']; ?></option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">Giá</label>
            <input type="text" class="form-control" name="price">
        </div>

        <div class="mb-3">
            <label class="form-label">Loại Phòng</label>
            <select name="categories_id" class="form-control">
                <?php foreach ($items as $categorie) : ?>
                    <option value="<?php echo $categorie['id']; ?>"><?php echo $categorie['tendm']; ?></option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">Tình Trạng Phòng</label>
            <input type="text" class="form-control" name="is_available">
        </div>

        <br>
        <button type="submit" class="btn btn-primary">Thêm</button>
        <a type="button" href="index.php?controller=room" class="btn btn-secondary">Back</a>
    </form>
</div>