<?php
session_start();
include "../process/connection.php";
$email      = $_SESSION['email'];
$users      = mysqli_query($connect, "SELECT * FROM users WHERE email = '$email'");
$user       = mysqli_fetch_array($users);
$full_name  = $user['full_name'];
$user_id    = $user['user_id'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>FastForm</title>
    <!-- Meta -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="" />
    <meta name="keywords" content="">
    <meta name="author" content="Phoenixcoded" />
    <!-- Favicon icon -->
    <link rel="icon" href="../assets/images/favicon.ico" type="image/x-icon">

    <!-- prism css -->
    <link rel="stylesheet" href="../assets/css/plugins/prism-coy.css">
    <!-- vendor css -->
    <link rel="stylesheet" href="../assets/css/style.css">

    <!-- custom css -->
    <style>
        .title {
            font-size: 24px;
            font-weight: bold;
        }
    </style>
    
    

</head>

<body>
    <!-- [ Pre-loader ] start -->
    <div class="loader-bg">
        <div class="loader-track">
            <div class="loader-fill"></div>
        </div>
    </div>
    <!-- [ Pre-loader ] End -->
    <!-- [ navigation menu ] start -->
    <?php include "navbar.php"; ?>
    <!-- [ navigation menu ] end -->
    <!-- [ Header ] start -->
    <?php include "header.php"; ?>
    <!-- [ Header ] end -->

    <!-- [ Main Content ] start -->
    <?php
    if (isset($_GET['p'])) {
        switch ($_GET['p']) {
            case 'dashboard':
                include '../content/dashboard.php';
            break;
            case 'myforms':
                include '../content/myforms.php';
            break;
            case 'form':
                include '../content/forms.php';
            break;
            case 'responses':
                include '../content/responses.php';
            break;
            case 'answers':
                include '../content/answers.php';
            break;
            case 'thanks':
                include '../content/thanks.php';
            break;
            default:
                include '../content/dashboard.php';
        }
    } else {
        include '../content/dashboard.php';
    }
    ?>
    <!-- [ Main Content ] end -->

        <!-- Required Js -->
        <script src="../assets/js/vendor-all.min.js"></script>
        <script src="../assets/js/plugins/bootstrap.min.js"></script>
        <script src="../assets/js/ripple.js"></script>
        <script src="../assets/js/pcoded.min.js"></script>


    <!-- prism Js -->
    <script src="../assets/js/plugins/prism.js"></script>

    



    <script src="../assets/js/horizontal-menu.js"></script>
    <script>
        (function() {
            if ($('#layout-sidenav').hasClass('sidenav-horizontal') || window.layoutHelpers.isSmallScreen()) {
                return;
            }
            try {
                window.layoutHelpers._getSetting("Rtl")
                window.layoutHelpers.setCollapsed(
                    localStorage.getItem('layoutCollapsed') === 'true',
                    false
                );
            } catch (e) {}
        })();
        $(function() {
            $('#layout-sidenav').each(function() {
                new SideNav(this, {
                    orientation: $(this).hasClass('sidenav-horizontal') ? 'horizontal' : 'vertical'
                });
            });
            $('body').on('click', '.layout-sidenav-toggle', function(e) {
                e.preventDefault();
                window.layoutHelpers.toggleCollapsed();
                if (!window.layoutHelpers.isSmallScreen()) {
                    try {
                        localStorage.setItem('layoutCollapsed', String(window.layoutHelpers.isCollapsed()));
                    } catch (e) {}
                }
            });
        });
        $(document).ready(function() {
            $("#pcoded").pcodedmenu({
                themelayout: 'horizontal',
                MenuTrigger: 'hover',
                SubMenuTrigger: 'hover',
            });
        });
    </script>

    <script src="../assets/js/analytics.js"></script>

</body>

</html>
