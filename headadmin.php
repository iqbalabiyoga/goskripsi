<!--Import jQuery before materialize.js-->
    <script type="text/javascript" src="js/jquery.min.js"></script>
    <script type="text/javascript" src="js/materialize.min.js"></script>
<div class="navbar-fixed">
    <nav class="black lighten">
        <div class="navbar-wrapper container">
            <a href="adminhome.php" class="brand-logo left">GoSkripsi - ADMIN</a>
            <ul class="right">
                
            <?php
            if(isset($_SESSION['admin']))
                echo "<li> <a class='waves effect waves-light btn red darken-1' href='logout.php'>Sign Out</a></li>";
                else echo "<li> <a class='waves effect waves-light btn cyan' href='signin.php'>Sign In</a></li>";
            ?>
             <li><a href='index.php'>Lihat Web</a></li>  
            </ul>
        </div>
    </nav>
    </div>