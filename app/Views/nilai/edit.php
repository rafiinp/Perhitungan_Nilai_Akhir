<!-- app/Views/nilai/edit.php -->
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Nilai</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2 class="mb-4">Edit Nilai</h2>

        <?php if (session()->getFlashdata('errors')) : ?>
            <div class="alert alert-danger">
                <ul>
                    <?php foreach (session()->getFlashdata('errors') as $error) : ?>
                        <li><?= $error ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
        <?php endif; ?>

        <div class="card">
            <div class="card-header">
                Form Edit Nilai
            </div>
            <div class="card-body">
                <form action="<?= base_url('nilai/update/' . $nilai['id']) ?>" method="post">
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama Mahasiswa</label>
                        <input type="text" class="form-control" id="nama" name="nama" value="<?= $nilai['nama'] ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="tugas" class="form-label">Nilai Tugas</label>
                        <input type="number" class="form-control" id="tugas" name="tugas" min="0" max="100" value="<?= $nilai['nilai_tugas'] ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="uts" class="form-label">Nilai UTS</label>
                        <input type="number" class="form-control" id="uts" name="uts" min="0" max="100" value="<?= $nilai['nilai_uts'] ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="uas" class="form-label">Nilai UAS</label>
                        <input type="number" class="form-control" id="uas" name="uas" min="0" max="100" value="<?= $nilai['nilai_uas'] ?>" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                    <a href="<?= base_url('nilai') ?>" class="btn btn-secondary">Kembali</a>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>