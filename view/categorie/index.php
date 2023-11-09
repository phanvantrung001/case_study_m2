<div class="container-fluid px-4">
    <br>
    <a class="btn btn-primary" href="index.php?controller=categorie&action=create"> Thêm mới </a>
    <table border="1" class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Thể Loại</th>
                <th>Ảnh</th>
                <th>Hành Động</th>
                
            </tr>
        </thead>
        <tbody>
            <?php foreach ($items as $item): ?>
                <tr>
                    <td><?= $item['id']; ?></td>
                    <td><?= $item['name']; ?></td>
                    <td><img width="100" height="80" src="<?php echo $item['image'];?>" alt="">
                    <td>
                        <a class="btn btn-primary" href="index.php?controller=categorie&action=show&id=<?= $item['id']; ?>">Xem</a> |
                        <a class="btn btn-warning" href="index.php?controller=categorie&action=edit&id=<?= $item['id']; ?>">Sửa</a> |
                        <a class="btn btn-danger" onclick="return confirm('Are you sure?')" href="index.php?controller=categorie&action=destroy&id=<?= $item['id']; ?>">Xoá</a>
                    </td>
                </tr>
            <?php endforeach; ?>
            </table>
    <div class="pagination justify-content-center">
        <?php if ($current_page > 1) : ?>
            <a class="page-link" href="?page=<?php echo $current_page - 1; ?>" aria-label="Trang trước">
                <span aria-hidden="true">&laquo;</span>
            </a>
        <?php endif; ?>

        <?php
        $start_page = max(1, $current_page - 1);
        $end_page = min($start_page + 2, $total_pages);

        for ($i = $start_page; $i <= $end_page; $i++) :
            if ($i == $current_page) : ?>
                <a class="page-link active" href="?page=<?php echo $i; ?>"><?php echo $i; ?></a>
            <?php else : ?>
                <a class="page-link" href="?page=<?php echo $i; ?>"><?php echo $i; ?></a>
        <?php endif;
        endfor; ?>

        <?php if ($current_page < $total_pages) : ?>
            <a class="page-link" href="?page=<?php echo $current_page + 1; ?>" aria-label="Trang sau">
                <span aria-hidden="true">&raquo;</span>
            </a>
        <?php endif; ?>
    </div>
        </tbody>
    </table>
</div>