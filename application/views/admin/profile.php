<main id="main" class="main">


	<div class="pagetitle">
		<h1><?= $judul; ?></h1>
		<nav>
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="Usershtml">Home</a></li>
				<li class="breadcrumb-item">Users</li>
				<li class="breadcrumb-item active">Profile</li>
			</ol>
		</nav>
	</div>

	<?= $this->session->flashdata('pesan'); ?>

	<section class="section">
		<div class="row">

			<div class="col-xl-4">

				<div class="card">

					<div class="card-body profile-card pt-4 d-flex flex-column align-items-center">

						<img src="<?= base_url('assets/img/profile/') . 'default.jpg' ?>" alt="Profile" class="rounded-circle card-img">
						<h3><?= $user['nama']; ?></h3>
						<h4><?= $user['role_id'] == '2' ? 'Admin' : 'Petugas Instansi'; ?></h4>

					</div>
				</div>

			</div>

			<div class="col-xl-8">

				<div class="card">
					<div class="card-body pt-3">
						<!-- Bordered Tabs -->
						<ul class="nav nav-tabs nav-tabs-bordered">

							<li class="nav-item">
								<button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-overview">Overview</button>
							</li>

							<li class="nav-item">
								<button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-edit">Edit Profile</button>
							</li>

							<li class="nav-item">
								<button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-change-password">Change Password</button>
							</li>

						</ul>
						<div class="tab-content pt-2">

							<div class="tab-pane fade show active profile-overview" id="profile-overview">


								<h5 class="card-title">Profile Details</h5>

								<div class="row">
									<div class="col-lg-3 col-md-4 label ">Username</div>
									<div class="col-lg-9 col-md-8 font-weight-bold"><?= $user['nama']; ?></div>
								</div>

								<div class="row">
									<div class="col-lg-3 col-md-4 label">Email</div>
									<div class="col-lg-9 col-md-8"><?= $user['email']; ?></div>
								</div>

								<div class="row">
									<div class="col-lg-3 col-md-4 label">Role</div>
									<div class="col-lg-9 col-md-8"><?= $user['role_id'] == '2' ? 'Admin' : 'Petugas Instansi'; ?></div>
								</div>


								<?php
								if ($user['role_id']  == '1') {
								?>
									<div class="row">
										<div class="col-lg-3 col-md-4 label">Instansi</div>
										<div class="col-lg-9 col-md-8"><?= $instansi['nama_instansi']; ?></div>
									</div>
								<?php
								}
								?>


							</div>

							<div class="tab-pane fade profile-edit pt-3" id="profile-edit">

								<!-- Profile Edit Form -->
								<form action="<?= base_url('admin/ubahProfil') ?>" method='post'>
									<div class="row mb-3">
										<label for="nama" class="col-md-4 col-lg-3 col-form-label">Username</label>
										<div class="col-md-8 col-lg-9">
											<input name="nama" type="text" class="form-control" id="nama" value="<?= $user['nama']; ?>">
										</div>
									</div>

									<div class="row mb-3">
										<label for="email" class="col-md-4 col-lg-3 col-form-label">Email</label>
										<div class="col-md-8 col-lg-9">
											<input name="email" type="email" class="form-control" id="email" value="<?= $user['email']; ?>">
										</div>
									</div>


									<div class="text-center">
										<button type="submit" class="btn btn-primary">Save Changes</button>
									</div>
								</form><!-- End Profile Edit Form -->

							</div>

							<div class="tab-pane fade pt-3" id="profile-change-password">

								<!-- Change Password Form -->
								<?= form_open_multipart('admin/ubahPassword'); ?>
								<div class="row mb-3">
									<label for="newpassword" class="col-md-4 col-lg-3 col-form-label">New Password</label>
									<div class="col-md-8 col-lg-9">
										<input name="newpassword" type="password" class="form-control" id="newpassword">
									</div>
								</div>

								<div class="row mb-3">
									<label for="renewpassword" class="col-md-4 col-lg-3 col-form-label">Re-enter New Password</label>
									<div class="col-md-8 col-lg-9">
										<input name="renewpassword" type="password" class="form-control" id="renewpassword">
									</div>
								</div>

								<div class="text-center">
									<button type="submit" class="btn btn-primary">Change Password</button>
								</div>
								</form><!-- End Change Password Form -->

							</div>

						</div><!-- End Bordered Tabs -->

					</div>
				</div>

			</div>
		</div>
	</section>

</main><!-- End #main -->