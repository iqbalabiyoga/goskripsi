<!DOCTYPE html>
<html>

<head>
    <!--Import Google Icon Font-->
    <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--Import materialize.css-->
    <link type="text/css" rel="stylesheet" href="css/materialize.min.css" media="screen,projection" />

    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
</head>

<body>
    <?php
    session_start();
    include 'header.php';


    ?>
        <div class="container">
            <div class="row">
                <div class="col s6">
                    <h5>Tentang GoSkripsi</h5>
                    <p>GoSkripsi adalah Aplikasi Repository Skripsi Inspiratif untuk membantu mahasiswa Departemen Ilmu Komputer menemukan inspirasi untuk topik skripsinya..</p>

                </div>
                <div class="col s6">
                    <h5>Hubungi Kami</h5>
                    <p>Email : kelompok10rpl@gmail.com</p>
                    <p>Twitter : @adaflorist</p>
                    <p>Facebook : adaflorist@gmail.com</p>
                </div>

                <div class="col s12">
                    <h5 align="center">Tim Pengembang</h5>
                       <br><br><br><br>
                </div>
                <ul>
                    <li>
                        <h6><strong>Iqbal Abiyoga</strong> - Project Manager, BackEnd Programmer</h6>
                    </li>
                    <li>
                        <h6><strong>Ristiyana Sari</strong> - Front-End Designer</h6>
                    </li>
                    <li>
                        <h6><strong>Sarah Al-Qibtyah</strong> - Database Administrator</h6>
                    </li>
                </ul>
            </div>
        </div>
</body>

<?php
    include 'footer.php';

    ?>

</html>