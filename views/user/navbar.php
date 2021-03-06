<nav class="navbar navbar-default">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-header-collape" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="home.php">Sales Team App</a>
        </div>
        <div class="collapse navbar-collapse" id="app-header-collape">
            <ul class="nav navbar-nav">
                <li><a href="home.php">Home</a></li>
                <li><a href="bde_companyclientlist.php">Company List</a></li>
                <!-- Admin Access Only -->
                <?php if ($_SESSION['role'] == "ADMIN") : ?>
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">BDM<span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="#">Add BDM</a></li>
                        <li><a href="#">BDM List</a></li>
                    </ul>
                </li>
                <?php endif; ?>
                <!-- Admin Access Only -->
                <?php if ($_SESSION['role'] == "ADMIN") : ?>
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">BDE<span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="registration.php">Add BDE</a></li>
                        <li><a href="clientlist.php">BDE List</a></li>
                    
                    </ul>
                </li>
                <?php endif; ?>
                <!-- BDM & BDE Access Only -->
                <?php if ($_SESSION['role'] == "BDM" || $_SESSION['role'] == "BDE") : ?>
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">Client<span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <!-- BDE Access Only -->
                        <?php if ($_SESSION['role'] == "BDE") : ?>
                        <li><a href="bde_registration.php">Add Client</a></li>
                        <li><a href="bde_csv.php">BDE via CSV</a></li>
                        <li><a href="bde_clientlist.php">Client List</a></li>
                      <!--  <li><a href="companyclientlist.php">Company Client List</a></li>-->
                    </ul>
                    <?php endif; ?>
                </li>
                <?php endif; ?>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li><a>Welcome, <?php echo $_SESSION['email']; ?></a></li>
                <li><a><span class="glyphicon glyphicon-user"></span> Edit Profile</a></li>
                <li><a href="<?php echo BASEURL; ?>performlogout.php"><span class="glyphicon glyphicon-log-out"></span> Log out</a></li>
            </ul>
        </div>
    </div>
</nav>