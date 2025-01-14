<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Penghitung Nilai Akhir</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2 class="mb-4">Aplikasi Penghitung Nilai Akhir</h2>

        <?php if (session()->getFlashdata('message')) : ?>
            <div class="alert alert-success">
                <?= session()->getFlashdata('message') ?>
            </div>
        <?php endif; ?>

        <?php if (session()->getFlashdata('error')) : ?>
            <div class="alert alert-danger">
                <?= session()->getFlashdata('error') ?>
            </div>
        <?php endif; ?>

        <?php if (session()->getFlashdata('errors')) : ?>
            <div class="alert alert-danger">
                <ul>
                    <?php foreach (session()->getFlashdata('errors') as $error) : ?>
                        <li><?= $error ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
        <?php endif; ?>

        <!-- Form Input Nilai -->
        <div class="card mb-4">
            <div class="card-header">
                Input Nilai
            </div>
            <div class="card-body">
                <form action="<?= base_url('nilai/hitung') ?>" method="post">
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama Mahasiswa</label>
                        <input type="text" class="form-control" id="nama" name="nama" required>
                    </div>
                    <div class="mb-3">
                        <label for="tugas" class="form-label">Nilai Tugas</label>
                        <input type="number" class="form-control" id="tugas" name="tugas" min="0" max="100" required>
                    </div>
                    <div class="mb-3">
                        <label for="uts" class="form-label">Nilai UTS</label>
                        <input type="number" class="form-control" id="uts" name="uts" min="0" max="100" required>
                    </div>
                    <div class="mb-3">
                        <label for="uas" class="form-label">Nilai UAS</label>
                        <input type="number" class="form-control" id="uas" name="uas" min="0" max="100" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Hitung Nilai</button>
                </form>
            </div>
        </div>

        <!-- Tabel Hasil -->
        <div class="card">
            <div class="card-header">
                Daftar Nilai
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Tugas</th>
                                <th>UTS</th>
                                <th>UAS</th>
                                <th>Nilai Akhir</th>
                                <th>Grade</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($nilai as $key => $n): ?>
                            <tr>
                                <td><?= $key + 1 ?></td>
                                <td><?= $n['nama'] ?></td>
                                <td><?= $n['nilai_tugas'] ?></td>
                                <td><?= $n['nilai_uts'] ?></td>
                                <td><?= $n['nilai_uas'] ?></td>
                                <td><?= number_format($n['nilai_akhir'], 2) ?></td>
                                <td><?= $n['grade'] ?></td>
                                <td>
                                    <a href="<?= base_url('nilai/edit/' . $n['id']) ?>" class="btn btn-sm btn-warning">Edit</a>
                                    <form action="<?= base_url('nilai/delete/' . $n['id']) ?>" method="post" class="d-inline" onsubmit="return confirm('Apakah Anda yakin ingin menghapus data ini?');">
                                        <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>