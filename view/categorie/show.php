<table class="table" enctype="multipart/form-data">
    <tr>
        <th>STT</th>
        <td><?= $item['id']; ?></td>
    </tr>
    <tr>
        <th>Tên</th>
        <td><?= $item['name']; ?></td>
    </tr>
    <tr>
        <th>Ảnh</th>
        <td><img width="50" height="80" src="<?php echo $item['image'];?>" alt=""> </td>

    </tr>
</table>
<a type="button" href="index.php?controller=categorie" class="btn btn-secondary">Quay lại</a>