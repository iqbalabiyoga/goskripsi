<!--Import jQuery before materialize.js-->
<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/materialize.min.js"></script>
<div class="navbar-fixed">
    <nav class="cyan darken 1">
        <div class="navbar-wrapper container">
            <a href="index.php" class="brand-logo left">GoSkripsi</a>
            <ul class="right">
                <li><a href="tentang.php">Tentang GoSkripsi</a></li>
                <li> <a href="inspirasi-skripsi.php">InspirasiSkripsi</a></li>
                <li> <a href="daftar.php">Daftarkan Skripsimu</a></li>
                <?php 
                include 'connect.php';
            if(isset($_SESSION['nim'])){
                $nim=$_SESSION['nim'];
                $mahas=mysqli_query($connect,"select * from mahasiswa where nim_mhs='$nim'");
                $maha=mysqli_fetch_array($mahas);
                echo "<strong><li>Halo, ".$maha['nama_mhs']."</li></strong>";
            }?>
                    <?php
            if(isset($_SESSION['user']))
                echo "<li> <a class='waves effect waves-light btn red darken-1' href='logout.php'>Sign Out</a></li>";
                else echo "<li> <a class='waves effect waves-light btn teal' href='signin.php'>Sign In</a></li>";
           
            if(isset($_SESSION['admin']))
                echo"<li> <a href='adminhome.php'>Admin</a></li>";
                ?>
            </ul>
        </div>
    </nav>
</div>