<table class="table" enctype="multipart/form-data">
    <tr>
        <th>STT</th>
        <td><?= $item['id']; ?></td>
    </tr>
    <tr>
        <th>Tên</th>
        <td><?= $item['name_services']; ?></td>
    </tr>
    <tr>
        <th>Giá</th>
        <td><?= $item['price']; ?></td>

    </tr>
</table>
<a type="button" href="index.php?controller=service" class="btn btn-secondary">Quay lại</a>