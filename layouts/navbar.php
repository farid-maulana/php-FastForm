<nav class="pcoded-navbar theme-horizontal menu-light brand-blue">
    <div class="navbar-wrapper container">
        <div class="navbar-content sidenav-horizontal" id="layout-sidenav">
            <?php
            if (!isset($_GET['publish'])) {
            ?>
                <ul class="nav pcoded-inner-navbar sidenav-inner">
                    <li class="nav-item pcoded-menu-caption">
                        <label>Navigation</label>
                    </li>
                    <li class="nav-item">
                        <a href="?p=dashboard" class="nav-link "><span class="pcoded-micon"><i class="feather icon-home"></i></span><span class="pcoded-mtext">Dashboard</span></a>
                    </li>
                    <li class="nav-item pcoded-menu-caption">
                        <label>My Form</label>
                    </li>
                    <li class="nav-item">
                        <a href="?p=myforms" class="nav-link "><span class="pcoded-micon"><i class="feather icon-file-text"></i></span><span class="pcoded-mtext">My Forms</span></a>
                    </li>
                    <?php
                    if (isset($_GET['id'])) {
                        $form_id = $_GET['id'];
                    ?>
                        <!-- <li class="nav-item pcoded-menu-caption">
                            <label>Preview Form</label>
                        </li>
                        <li class="nav-item">
                            <a href="?p=preview&id=<?php echo $form_id; ?>" class="nav-link "><span class="pcoded-micon"><i class="fa fa-eye"></i></span><span class="pcoded-mtext">Preview</span></a>
                        </li> -->
                        <li class="nav-item pcoded-menu-caption">
                            <label>Responses Form</label>
                        </li>
                        <li class="nav-item">
                            <a href="?p=responses&id=<?php echo $form_id; ?>" class="nav-link "><span class="pcoded-micon"><i class="fa fa-reply"></i></span><span class="pcoded-mtext">Responses</span></a>
                        </li>
                        <li class="nav-item pcoded-menu-caption">
                            <label>Publish Form</label>
                        </li>
                        <li class="nav-item">
                            <a href="?p=answers&id=<?php echo $form_id; ?>&publish=true" target="_blank" class="nav-link "><span class="pcoded-micon"><i class="fa fa-upload"></i></span><span class="pcoded-mtext">Publish</span></a>
                        </li>
                    <?php
                    }
                    ?>
                </ul>
            <?php
            }
            ?>
        </div>
    </div>
</nav>