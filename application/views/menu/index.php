<div class="container">
    <div class="row mt-3">
        <div class="col-md-6">
            <a href="<?= base_url(); ?>menu/tambah" class="btn btn-primary">Tambah
                Data Menu</a>
        </div>
    </div>

    <div class="row mt-3">
        <div class="col-md">
            <h3>Daftar Menu</h3>
            <?php if (empty($menu)) : ?>
                <div class="alert alert-danger" role="alert">
                data menu tidak ditemukan.
                </div>
            <?php endif; ?>
            <ul class="list-group">
                <?php foreach ($menu as $mn) : ?>
                <table class="table">
                    <thead>
                        <th>NO</th>
                        <th>Kategori</th>
                        <th>Nama</th>
                        <th>Deskripsi</th>
                        <th>Harga</th>
                        <th>Action</th>
                    </thead>
                    <tbody>
                        <tr>
                            <td><?= $mn['id']; ?></td>
                            <td><?= $mn['kategori']; ?></td>
                            <td><?= $mn['nama']; ?></td>
                            <td><?= $mn['deskripsi']; ?></td>
                            <td><?= $mn['harga']; ?></td>
                            <td>
                                <a href="<?= base_url(); ?>menu/hapus/<?= $mn['id']; ?>"
                                    class="badge badge-danger float-right tombol-hapus">hapus</a> 
                                <a href="<?= base_url(); ?>menu/ubah/<?= $mn['id']; ?>" 
                                    class="badge badge-success float-right">ubah</a>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>

</div>