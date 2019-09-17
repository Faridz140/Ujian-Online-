        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">UjianOnline</a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">
               
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <?php echo $_SESSION[username] ?>
                        <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="logout.php" onclick="return confirm('Apakah anda yakin ?');"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li class="sidebar-search">
                            
                              
                           
                            <!-- /input-group -->
                        </li>
                        <li >
                            <a href="?module=home"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                        </li>
                       

                        <li>
                            <a href="?module=soal"><i class="fa fa-file fa-fw"></i>Kelola Soal</a>
                        </li>

                         <li>
                            <a href="?module=hasilujian"><i class="fa fa-file fa-fw"></i>Hasil Ujian</a>
                        </li>

                        <li>
                            <a href="?module=pengaturanujian"><i class="fa fa-gear fa-fw"></i>Pengaturan ujian</a>
                        </li>

                        <li>
                            <a href="?module=panduan"><i class="fa fa-book fa-fw"></i>Panduan</a>
                        </li>

                        <li>
                            <a href="?module=users"><i class="fa fa-user fa-fw"></i> Daftar User</a>
                        </li>

                     
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>