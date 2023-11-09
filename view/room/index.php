<div class="container-fluid px-4">
    <br>
    <a class="btn btn-primary" href="index.php?controller=room&action=create"> Thêm mới </a>
    <table border="1" class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Số phòng</th>
                <th>Giá tiền</th>
                <th>Loại phòng</th>
                <th>Tình trạng</th>
                <th>Chức năng</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($items as $item): ?>
                <tr>
                    <td><?= $item['id']; ?></td>
                    <td><?= $item['room_number']; ?></td>
                    <td><?= $item['price']; ?></td>
                    <td><?= $item['tendm']; ?></td>
                    <td><?= $item['is_available']; ?></td>
                    <td>
                        <a class="btn btn-primary" href="index.php?controller=room&action=show&id=<?= $item['id']; ?>">Xem</a> |
                        <a class="btn btn-warning" href="index.php?controller=room&action=edit&id=<?= $item['id']; ?>">Sửa</a> |
                        <a class="btn btn-danger" onclick="return confirm('Are you sure?')" href="index.php?controller=room&action=destroy&id=<?= $item['id']; ?>">Xoá</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>