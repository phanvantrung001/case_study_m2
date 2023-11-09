<table class="table" enctype="multipart/form-data">
    <tr>
        <th>số phòng</th>
        <td><?= $item['room_number']; ?></td>
    </tr>
    <tr>
        <th>Tên</th>
        <td><?= $item['name_services']; ?></td>
    </tr>
    <tr>
        <th>Giá</th>
        <td><?= $item['price']; ?></td>
    </tr>
    <tr>
        <th>Tình trạng phòng</th>
        <td><?= $item['is_available'] ? 'Có sẵn' : 'Không có sẵn'; ?></td>
    </tr>
</table>
<a type="button" href="index.php?controller=order" class="btn btn-secondary">Quay lại</a>