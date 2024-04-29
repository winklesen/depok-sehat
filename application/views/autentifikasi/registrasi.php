<main>
	<div class="container">

		<section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
			<div class="container">
				<div class="row justify-content-center">
					<div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

						<div class="d-flex justify-content-center py-4">
							<a href="index.html" class="logo d-flex align-items-center w-auto">
								<i class="fa-solid fa-hand-holding-medical fa-xl me-2" style="color: #63E6BE;"></i>
								<span class="d-none d-lg-block">Depok Sehat</span>
							</a>
						</div><!-- End Logo -->

						<div class="card mb-3">

							<div class="card-body">

								<div class="pt-4 pb-2">
									<h5 class="card-title text-center pb-0 fs-4">Registrasi Depok Sehat</h5>
									<p class="text-center small">Lengkapi form untuk melakukan registrasi</p>
								</div>

								<form class="row g-3" method="post"
									action="<?= base_url('autentifikasi/registrasi'); ?>" novalidate>
									<div class="col-12">
										<label for="usernama" class="form-label">Nama Lengkap</label>
										<input type="text" name="user_nama" class="form-control" id="usernama">
										<?= form_error('user_nama', '<small class="text-danger pl-3">', '</small>'); ?>
									</div>

									<div class="col-12">
										<label for="useremail" class="form-label">Email</label>
										<input type="email" name="user_email" class="form-control" id="useremail"
										>
										<?= form_error('user_email', '<small class="text-danger pl-3">', '</small>'); ?>
									</div>

									<div class="col-12">
										<label for="userpassword" class="form-label">Password</label>
										<input type="password" name="user_password1" class="form-control"
											id="userpassword">
										<?= form_error('user_password1', '<small class="text-danger pl-3">', '</small>'); ?>
									</div>

									<div class="col-12">
										<label for="userpassword2" class="form-label">Konfirmasi Password</label>
										<input type="password" name="user_password2" class="form-control"
											id="userpassword2">
										<?= form_error('user_password2', '<small class="text-danger pl-3">', '</small>'); ?>
									</div>
									
									<div class="col-12">
										<div class="form-check">
											<input class="form-check-input" name="terms" type="checkbox" value=""
											id="acceptTerms">
											<!-- <input class="form-check-input" name="terms" type="checkbox" value=""
											id="acceptTerms" required> -->
											<label class="form-check-label small" for="acceptTerms">Saya memahami dan menerima
												<a href="#" data-bs-toggle="modal" data-bs-target="#myModal">
													Syarat dan Ketentuan
												</a>
											</label>
											<div class="invalid-feedback">Anda harus menyetujui syarat dan ketentuan</div>
											<!-- <?= form_error('termcondition', '<small class="text-danger pl-3">', '</small>'); ?> -->
										</div>
									</div>
									<div class="col-12">
										<button class="btn btn-primary w-100 small" type="submit">Buat Akun</button>
									</div>
									<div class="col-12">    
										<p class="small mb-0">Sudah Memiliki Akun? <a
												href="<?= base_url('autentifikasi') ;?>">Log in</a></p>
									</div>
								</form>

							</div>
						</div>

						<!-- <div class="credits"> -->
						<!-- All the links in the footer should remain intact. -->
						<!-- You can delete the links only if you purchased the pro version. -->
						<!-- Licensing information: https://bootstrapmade.com/license/ -->
						<!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/ -->
						<!-- Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a> -->
						<!-- </div> -->

						<!-- Modal Term and Condition -->
						<div class="modal fade" id="myModal" tabindex="-1" aria-labelledby="exampleModalLabel"
							aria-hidden="true">
							<div class="modal-dialog">
								<div class="modal-content">
									<div class="modal-header">
										<h5 class="modal-title" id="exampleModalLabel">Syarat dan Ketentuan - Depok
											Sehat</h5>
										<button type="button" class="btn-close" data-bs-dismiss="modal"
											aria-label="Close"></button>
									</div>
									<div class="modal-body">
										<header>
											<h1>Syarat dan Ketentuan - Depok Sehat</h1>
										</header>
										<main class="small">
											<p><strong>1. Penerimaan Syarat dan Ketentuan</strong><br>
												Dengan mengakses atau menggunakan aplikasi website Depok Sehat, Anda
												menyetujui untuk terikat dengan syarat dan ketentuan ini. Jika Anda
												tidak setuju dengan sebagian atau seluruh syarat dan ketentuan ini, Anda
												tidak diperkenankan menggunakan aplikasi website ini.</p>

											<p><strong>2. Tujuan Aplikasi</strong><br>
												Aplikasi website Depok Sehat bertujuan untuk menyediakan informasi
												seputar penyakit trending yang terjadi di Depok, termasuk gejala,
												pencegahan, dan langkah-langkah pengobatan yang dianjurkan.</p>

											<p><strong>3. Konten</strong><br>
												Konten yang disediakan dalam aplikasi website ini bersifat informatif
												dan tidak dimaksudkan sebagai pengganti saran medis profesional.
												Pengguna harus selalu berkonsultasi dengan profesional medis terkait
												masalah kesehatan mereka.</p>

											<p><strong>4. Penggunaan Informasi</strong><br>
												Informasi yang diperoleh dari aplikasi website Depok Sehat tidak boleh
												digunakan untuk mengabaikan saran medis, diagnosis, atau perawatan yang
												direkomendasikan oleh profesional medis.</p>

											<p><strong>5. Keterbatasan Tanggung Jawab</strong><br>
												Meskipun kami berusaha menyediakan informasi yang akurat dan terkini,
												kami tidak bertanggung jawab atas kerugian atau kerusakan yang timbul
												dari penggunaan informasi dalam aplikasi website ini.</p>

											<p><strong>6. Kebijakan Privasi</strong><br>
												Kebijakan privasi aplikasi website Depok Sehat menjelaskan bagaimana
												kami mengumpulkan, menggunakan, dan melindungi informasi pribadi
												pengguna. Dengan menggunakan aplikasi ini, Anda menyetujui praktik kami
												terkait privasi.</p>

											<p><strong>7. Perubahan Syarat dan Ketentuan</strong><br>
												Kami berhak untuk mengubah syarat dan ketentuan ini kapan saja tanpa
												pemberitahuan sebelumnya. Perubahan akan berlaku segera setelah
												diposting dalam aplikasi website ini. Pengguna diharapkan untuk secara
												berkala memeriksa syarat dan ketentuan untuk memastikan kepatuhan
												mereka.</p>

											<p><strong>8. Hak Kekayaan Intelektual</strong><br>
												Seluruh konten, termasuk teks, gambar, dan grafik dalam aplikasi website
												ini, dilindungi oleh hak cipta dan kekayaan intelektual lainnya.
												Pengguna tidak diperkenankan untuk mereproduksi, mendistribusikan, atau
												menggunakan konten tanpa izin tertulis dari pemiliknya.</p>

											<p><strong>9. Penghentian Akses</strong><br>
												Kami berhak untuk menghentikan atau membatasi akses Anda ke aplikasi
												website Depok Sehat tanpa pemberitahuan sebelumnya jika kami menduga
												adanya pelanggaran terhadap syarat dan ketentuan ini.</p>
										</main>
										<footer class="small mt-5 fw-bold">
											<p>Tanggal Terakhir Diperbarui: 18 April 2024</p>
										</footer>

										<!-- Lanjutkan dengan bagian-bagian lainnya seperti yang disebutkan dalam contoh syarat dan ketentuan di atas -->
									</div>
									<div class="modal-footer">
										<button type="button" class="btn btn-outline-secondary"
											data-bs-dismiss="modal">Tutup</button>
									</div>
								</div>
							</div>
						</div>

					</div>
				</div>
			</div>

		</section>

	</div>
</main><!-- End #main -->
