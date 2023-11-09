<div class="container-fluid px-4">
    <table border="1" class="table">
        <thead>
            <tr>
                <th>Tên</th>
                <th>Ngày đặt phòng</th>
                <th>Tổng tiền</th>
                <th>Chức năng</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($items as $item): ?>
                <tr>
                    <td><?= $item['ten']; ?></td>
                    <td><?= $item['order_date']; ?></td>
                    <td><?= $item['total_amount']; ?></td>
                    <td>
                        <a class="btn btn-primary" href="index.php?controller=order&action=show&id=<?= $item['id']; ?>">Xem</a> |
                        <a class="btn btn-warning" href="index.php?controller=order&action=edit&id=<?= $item['id']; ?>">Sửa</a> |
                        <a class="btn btn-danger" onclick="return confirm('Are you sure?')" href="index.php?controller=order&action=destroy&id=<?= $item['id']; ?>">Xoá</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>