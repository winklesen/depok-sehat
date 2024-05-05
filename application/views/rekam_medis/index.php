<main id="main" class="main">

    <div class="pagetitle">
        <h1><?= $judul; ?></h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="Usershtml">Home</a></li>
                <li class="breadcrumb-item">Rekam Medis</li>
                <li class="breadcrumb-item active">Master</li>
            </ol>
        </nav>
    </div>

    <?= $this->session->flashdata('pesan'); ?>
    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Master <?= $judul; ?></h5>

                        <!-- Table with hoverable rows -->
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Position</th>
                                    <th scope="col">Age</th>
                                    <th scope="col">Start Date</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row">1</th>
                                    <td>Brandon Jacob</td>
                                    <td>Designer</td>
                                    <td>28</td>
                                    <td>2016-05-25</td>
                                    <td><a href="google.com" class="btn btn-primary">Primary</a>
                                        <a href="google.com" class="btn btn-success">Success</a>
                                        <a href="google.com" class="btn btn-danger">Danger</a>
                                        <a href="google.com" class="btn btn-warning">Warning</button></a>
                                </tr>
                                <tr>
                                    <th scope="row">2</th>
                                    <td>Bridie Kessler</td>
                                    <td>Developer</td>
                                    <td>35</td>
                                    <td>2014-12-05</td>
                                    <td><a href="google.com" class="btn btn-primary">Primary</a>
                                        <a href="google.com" class="btn btn-success">Success</a>
                                        <a href="google.com" class="btn btn-danger">Danger</a>
                                        <a href="google.com" class="btn btn-warning">Warning</button></a>
                                </tr>
                                <tr>
                                    <th scope="row">3</th>
                                    <td>Ashleigh Langosh</td>
                                    <td>Finance</td>
                                    <td>45</td>
                                    <td>2011-08-12</td>
                                    <td><a href="google.com" class="btn btn-primary">Primary</a>
                                        <a href="google.com" class="btn btn-success">Success</a>
                                        <a href="google.com" class="btn btn-danger">Danger</a>
                                        <a href="google.com" class="btn btn-warning">Warning</button></a>
                                </tr>
                                <tr>
                                    <th scope="row">4</th>
                                    <td>Angus Grady</td>
                                    <td>HR</td>
                                    <td>34</td>
                                    <td>2012-06-11</td>
                                    <td><a href="google.com" class="btn btn-primary">Primary</a>
                                        <a href="google.com" class="btn btn-success">Success</a>
                                        <a href="google.com" class="btn btn-danger">Danger</a>
                                        <a href="google.com" class="btn btn-warning">Warning</button></a>
                                </tr>
                                <tr>
                                    <th scope="row">5</th>
                                    <td>Raheem Lehner</td>
                                    <td>Dynamic Division Officer</td>
                                    <td>47</td>
                                    <td>2011-04-19</td>
                                    <td><a href="google.com" class="btn btn-primary">Primary</a>
                                        <a href="google.com" class="btn btn-success">Success</a>
                                        <a href="google.com" class="btn btn-danger">Danger</a>
                                        <a href="google.com" class="btn btn-warning">Warning</button></a>
                                </tr>
                            </tbody>
                        </table>
                        <!-- End Table with hoverable rows -->
                    </div>
                </div>
            </div>
        </div>
    </section>

</main><!-- End #main -->