<div class="main-container container ">
    <div class="row">
        <div class="col-6">
            <h2 class="mt-5">Daftar Penyakit</h2>
            <p>Kami menyediakan data real time, dan transparan mengenai penyakit di kota depok</p>
            <hr>
            <div class="mt-5">
                <ul class="list-group list-group-flush mt-5">

                    <?php foreach ($hasil_pencarian as $penyakit) { ?>
                        <li class="list-group-item">
                            <a href="<?= base_url('home/detailpenyakit/') . $penyakit->id_penyakit ?>" class="link-dark"><?= $penyakit->nama_penyakit; ?></a>
                        </li>
                    <?php } ?>
                </ul>
            </div>
            <div class="mt-3 mb-5">
                <a href="javascript:history.back()" class="link-secondary"><b>Kembali ke Halaman Sebelumnya</b> <i class="fa-solid fa-arrow-right"></i></a>
            </div>
        </div>
    </div>
</div>