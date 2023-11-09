<div class="container-fluid px-4">
    <br>
    <table border="1" class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>TÊN</th>
                <th>CĂN CƯỚC</th>
                <th>SỐ ĐIỆN THOẠI</th>
                <th>ĐỊA CHỈ</th>
                <th>HÀNH ĐỘNG</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($result as $item) : ?>
                <tr>
                    <td><?= $item['id']; ?></td>
                    <td><?= $item['ten']; ?></td>
                    <td><?= $item['cccd']; ?></td>
                    <td><?= $item['so_dien_thoai']; ?></td>
                    <td><?= $item['dia_chi']; ?></td>
                </tr>
            <?php endforeach; ?>
    </table>
    <?php
    $total_pages = $result['total_pages'];
    $current_page = isset($_GET['page']) ? $_GET['page'] : 1;
    $search = isset($_GET['search']) ? $_GET['search'] : '';
    $controller = isset($_GET['controller']) ? $_GET['controller'] : '';
    ?>
    <nav aria-label="Page navigation example">
        <ul class="pagination">
            <?php
            $visible_pages = min($total_pages, 3);
            $start_page = max(1, $current_page - 1);
            $end_page = min($start_page + $visible_pages - 1, $total_pages);
            ?>
            <?php if ($current_page > 1) : ?>
                <a class="page-link" href="?controller=user&action=search&page=<?php echo $current_page - 1; ?><?php if (!empty($search)) echo '&search=' . urlencode($search); ?><?php if (!empty($result['search_s1'])) echo '&s1=' . urlencode($result['search_s1']); ?>" aria-label="Trang trước">
                    <span aria-hidden="true">&laquo;</span>
                </a>
            <?php endif; ?>
            <?php for ($i = $start_page; $i <= $end_page; $i++) : ?>
                <?php if ($i == $current_page) : ?>
                    <a class="page-link active" href="?controller=staff&action=search&page=<?php echo $i; ?><?php if (!empty($search)) echo '&search=' . urlencode($search); ?><?php if (!empty($result['search_s1'])) echo '&s1=' . urlencode($result['search_s1']); ?>"><?php echo $i; ?></a>
                <?php else : ?>
                    <a class="page-link" href="?controller=staff&action=search&page=<?php echo $i; ?><?php if (!empty($search)) echo '&search=' . urlencode($search); ?><?php if (!empty($result['search_s1'])) echo '&s1=' . urlencode($result['search_s1']); ?>">
                        <?php echo $i; ?>
                    </a>
                <?php endif; ?>
            <?php endfor; ?>
            <?php if ($current_page < $total_pages) : ?>
                <a class="page-link" href="?controller=staff&action=search&page=<?php echo $current_page + 1; ?><?php if (!empty($search)) echo '&search=' . urlencode($search); ?><?php if (!empty($result['search_s1'])) echo '&s1=' . urlencode($result['search_s1']); ?>" aria-label="Trang sau">
                    <span aria-hidden="true">&raquo;</span>
                </a>
            <?php endif; ?>
        </ul>
    </nav>