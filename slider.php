<div class="slider">
        <ul class="slides">
            <li>
                <img src="foto/1.jpg">
                <!-- random image -->
                <div class="caption left-align">
                    <h3>Inspirasi Skripsi</h3>
                    <h5 class="light grey-text text-lighten-3">Bingung cari ide skripsi?<br> Cari inspirasi di sini!</h5>
                    <a class="btn waves-effect waves-light" href="inspirasi-skripsi.php">Cari Inspirasi
    <i class="material-icons right">search</i>
                        </a>
                </div>
            </li>
            <li>
                <img src="foto/2.jpg">
                <!-- random image -->
                <div class="caption left-align">
                    <h3>Daftarkan Skripsimu</h3>
                    <h5 class="light grey-text text-lighten-3">Jadilah inspirasi dengan mendaftarkan skripsimu di sini</h5>
                 <a class="btn waves-effect waves-light" href="inspirasi-skripsi.php">Jadi Inspirasi
    <i class="material-icons right">perm_identity</i>
                        </a>
                </div>
            </li>
        </ul>
    </div>
    <script>
        $(document).ready(function () {
            $('.slider').slider({
                full_width: true
            });

            // Pause slider
            $('.slider').slider('pause');
            // Start slider
            $('.slider').slider('start');
            // Next slide
            $('.slider').slider('next');
            // Previous slide
            $('.slider').slider('prev');
        });
    </script>