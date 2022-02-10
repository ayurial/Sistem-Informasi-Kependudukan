<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">


</head>

<body>
    <!-- Main content -->
    <div class="main-content" id="panel">
        <div class="header bg-primary pb-6">
            <div class="container-fluid">
                <div class="header-body">
                    <div class="row align-items-center py-4">
                        <div class="col-lg-6 col-7">
                        </div>
                        <div class="col-lg-6 col-5 text-right">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Page content -->
        <div class="container-fluid mt--6">
            <div class="col">
                <div class="card">
                    <!-- Card header -->
                    <div class="card-header border-0">
                        <h5 class="mb-0">Jumlah KK</h5>
                    </div>
                    <!-- Card footer -->
                    <div class="card-footer py-4">
                        <div class="container">
                            <div class="table-responsive">
                                <table class="table align-items-center table-flush">
                                    <thead class="thead-light">
                                        <tr>
                                            <th scope="col" class="sort" data-sort="nomor">Nomor</th>
                                            <th scope="col" class="sort" data-sort="namaP">Nomor KK</th>
                                            <th scope="col" class="sort" data-sort="namaP">Nama Kepala Keluarga</th>
                                            <th scope="col" class="sort" data-sort="nama">Jumlah Anggota KK</th>
                                            <!-- <th scope="col" class="sort" data-sort="statuskawin">Status Kawin</th> -->
                                            <th scope="col"></th>
                                        </tr>
                                    </thead>
                                    <tbody class="list">
                                        <?php
                                        $No = 1;
                                        foreach ($KK as $data) : ?>
                                            <tr>
                                                <td><?php echo $No++ ?></td>
                                                <td><?php echo $data->No_KK ?></td>
                                                <td><?php echo $data->Nama_KepalaKeluarga ?></td>
                                                <td><?php echo $data->Jumlah_KK ?></td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                                <h7 class="mb-5">Total <?php echo ($No - 1) ?> KK dari <?php echo $penduduk->Jumlah_Penduduk ?> penduduk</h7>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card">
                    <!-- Card footer -->
                    <div class="card-footer py-4">
                        <div class="container">
                            <div class="col-md-8 center">
                                <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                                    <ol class="carousel-indicators">
                                        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                                        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                                        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                                    </ol>
                                    <div class="carousel-inner">
                                        <div class="carousel-item active">
                                            <div class="d-block w-100">
                                                <div class="container">
                                                    <canvas id="myChart"></canvas>
                                                </div>
                                                <script src="<?php echo base_url() . 'assets/package/dist/chart.js' ?>"></script>
                                                <script type="text/javascript">
                                                    var ctx = document.getElementById('myChart').getContext('2d');
                                                    var chart = new Chart(ctx, {
                                                        type: 'bar',
                                                        data: {
                                                            labels: [
                                                                <?php
                                                                if (count($agama) > 0) {
                                                                    foreach ($agama as $data) {
                                                                        echo "'" . $data->Agama . "',";
                                                                    }
                                                                }
                                                                ?>
                                                            ],
                                                            datasets: [{
                                                                label: 'Jumlah Penduduk',
                                                                backgroundColor: '#ADD8E6',
                                                                borderColor: '##93C3D2',
                                                                data: [
                                                                    <?php
                                                                    if (count($agama) > 0) {
                                                                        foreach ($agama as $data) {
                                                                            echo $data->Jumlah_Agama . ", ";
                                                                        }
                                                                    }
                                                                    ?>
                                                                ]
                                                            }]
                                                        },
                                                        options: {
                                                            layout: {
                                                                padding: {
                                                                    left: 50,
                                                                    right: 50,
                                                                    top: -10,
                                                                    bottom: 30
                                                                }
                                                            },
                                                            title: {
                                                                display: true,
                                                                fontSize: 25,
                                                                text: 'Data Agama Warga...',
                                                            },
                                                        }

                                                    });
                                                </script>
                                            </div>
                                        </div>
                                        <div class="carousel-item">
                                            <div class="container">
                                                <canvas id="myPie"></canvas>
                                            </div>
                                            <script src="<?php echo base_url() . 'assets/package/dist/chart.js' ?>"></script>
                                            <script type="text/javascript">
                                                var ctx2 = document.getElementById('myPie').getContext('2d');
                                                var chart2 = new Chart(ctx2, {
                                                    type: 'pie',
                                                    data: {
                                                        labels: [
                                                            <?php
                                                            if (count($jk) > 0) {
                                                                foreach ($jk as $data) {
                                                                    echo "'" . $data->Jenis_Kelamin . "',";
                                                                }
                                                            }
                                                            ?>
                                                        ],
                                                        datasets: [{
                                                            label: 'Jumlah Penduduk',
                                                            backgroundColor: ['#ADD8E6'],
                                                            borderColor: '##93C3D2',
                                                            data: [
                                                                <?php
                                                                if (count($jk) > 0) {
                                                                    foreach ($jk as $data) {
                                                                        echo $data->Jumlah . ", ";
                                                                    }
                                                                }
                                                                ?>
                                                            ]
                                                        }]
                                                    },
                                                    options: {
                                                        layout: {
                                                            padding: {
                                                                left: 50,
                                                                right: 50,
                                                                top: -10,
                                                                bottom: 30
                                                            }
                                                        },
                                                        title: {
                                                            display: true,
                                                            fontSize: 25,
                                                            text: 'Data Jenis Kelamin Warga...'
                                                        }

                                                    }
                                                });
                                            </script>
                                        </div>
                                        <div class="carousel-item">
                                            <div class="container">
                                                <canvas id="myChart4"></canvas>
                                            </div>
                                            <script src="<?php echo base_url() . 'assets/package/dist/chart.js' ?>"></script>
                                            <script type="text/javascript">
                                                var ctx4 = document.getElementById('myChart4').getContext('2d');
                                                var chart3 = new Chart(ctx4, {
                                                    type: 'pie',
                                                    data: {
                                                        labels: [
                                                            <?php
                                                            if (count($pendidikan) > 0) {
                                                                foreach ($pendidikan as $data) {
                                                                    echo "'" . $data->Pendidikan . "',";
                                                                }
                                                            }
                                                            ?>
                                                        ],
                                                        datasets: [{
                                                            label: 'Jumlah Penduduk',
                                                            backgroundColor: ['#ADD8E6', '#93C3D2', '#75DDD2', '#ADB1A0'],
                                                            borderColor: '##93C3D2',
                                                            data: [
                                                                <?php
                                                                if (count($pendidikan) > 0) {
                                                                    foreach ($pendidikan as $data) {
                                                                        echo $data->Jumlah_Pendidikan . ", ";
                                                                    }
                                                                }
                                                                ?>
                                                            ]
                                                        }]
                                                    },
                                                    options: {
                                                        layout: {
                                                            padding: {
                                                                left: 50,
                                                                right: 50,
                                                                top: -10,
                                                                bottom: 30
                                                            }
                                                        },
                                                        title: {
                                                            display: true,
                                                            fontSize: 25,
                                                            text: 'Data Pendidikan Warga...'
                                                        }

                                                    }

                                                });
                                            </script>
                                        </div>
                                        <div class="carousel-item">
                                            <div class="container">
                                                <canvas id="myChart5"></canvas>
                                            </div>
                                            <script src="<?php echo base_url() . 'assets/package/dist/chart.js' ?>"></script>
                                            <script type="text/javascript">
                                                var ctx5 = document.getElementById('myChart5').getContext('2d');
                                                var chart3 = new Chart(ctx5, {
                                                    type: 'bar',
                                                    data: {
                                                        labels: [
                                                            <?php
                                                            if (count($pekerjaan) > 0) {
                                                                foreach ($pekerjaan as $data) {
                                                                    echo "'" . $data->Pekerjaan . "',";
                                                                }
                                                            }
                                                            ?>
                                                        ],
                                                        datasets: [{
                                                            label: 'Jumlah Penduduk',
                                                            backgroundColor: '#ADD8E6',
                                                            borderColor: '##93C3D2',
                                                            data: [
                                                                <?php
                                                                if (count($pekerjaan) > 0) {
                                                                    foreach ($pekerjaan as $data) {
                                                                        echo $data->Jumlah_Pekerjaan . ", ";
                                                                    }
                                                                }
                                                                ?>
                                                            ]
                                                        }]
                                                    },
                                                    options: {
                                                        layout: {
                                                            padding: {
                                                                left: 20,
                                                                right: 50,
                                                                top: -10,
                                                                bottom: 30
                                                            }
                                                        },
                                                        title: {
                                                            display: true,
                                                            fontSize: 25,
                                                            text: 'Data Pekerjaan Warga...'
                                                        }

                                                    }

                                                });
                                            </script>
                                        </div>
                                        <div class="carousel-item">
                                            <div class="container">
                                                <canvas id="myChart6"></canvas>
                                            </div>
                                            <script src="<?php echo base_url() . 'assets/package/dist/chart.js' ?>"></script>
                                            <script type="text/javascript">
                                                var ctx6 = document.getElementById('myChart6').getContext('2d');
                                                var chart3 = new Chart(ctx6, {
                                                    type: 'pie',
                                                    data: {
                                                        labels: [
                                                            'Penduduk Tidak Miskin', 'Penduduk Miskin'
                                                        ],
                                                        datasets: [{
                                                            backgroundColor: ['#75DDD2', '#ADB1A0'],
                                                            borderColor: '##93C3D2',
                                                            data: [<?php echo ($penduduk->Jumlah_Penduduk - $katmiskin->Jumlah_Pendudukmiskin) ?>, <?php echo $katmiskin->Jumlah_Pendudukmiskin ?>]
                                                        }]
                                                    },
                                                    options: {
                                                        layout: {
                                                            padding: {
                                                                left: 50,
                                                                right: 50,
                                                                top: -10,
                                                                bottom: 30
                                                            }
                                                        },
                                                        title: {
                                                            display: true,
                                                            fontSize: 25,
                                                            text: 'Kategori Penduduk Miskin'
                                                        }

                                                    }

                                                });
                                            </script>
                                        </div>
                                        <!-- <div class="carousel-item">
                                            <img src="..." class="d-block w-100" alt="...">
                                        </div> -->
                                    </div>
                                    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                        <span class="sr-only">Previous</span>
                                    </a>
                                    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                        <span class="sr-only">Next</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </div>