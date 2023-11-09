<div class="main-panel">
    <div class="content-wrapper">
        <!-- @yield('content') -->

        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">

                    <div class="table-responsive">
                        <table class="table">
                            <thead class="thead-dark">
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
                                <tr>
                                    <td><?= $item['id']; ?></td>
                                    <td><?= $item['ten']; ?></td>
                                    <td><?= $item['cccd']; ?></td>
                                    <td><?= $item['so_dien_thoai']; ?></td>
                                    <td><?= $item['dia_chi']; ?></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
            <a type="button" href="index.php?controller=user" class="btn btn-secondary">BACK</a>
        </div>
        <!-- END: @yield('content') -->
    </div>