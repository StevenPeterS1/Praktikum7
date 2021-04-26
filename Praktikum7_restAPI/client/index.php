<?php
include_once 'util/Utility.php';
include_once 'util/ApiService.php';
include_once 'controller/MahasiswaController.php';
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Colorlib Templates">
    <meta name="author" content="Colorlib">
    <meta name="keywords" content="Colorlib Templates">

    <title>REST Mahasiswa</title>

    <!-- Icons font CSS-->
    <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <!-- Font special for pages-->
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Vendor CSS-->
    <link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="vendor/datepicker/daterangepicker.css" rel="stylesheet" media="all">

    <link rel="stylesheet" type="text/css" href="css/web_style.css">
    <link rel="stylesheet" type="text/css" href="css/datatables.css">

    <script type="text/javascript" src="js/functional_js.js"></script>
    <script type="text/javascript" src="js/command_script.js"></script>
</head>

<body>
    <!--Tag for header-->
    <header>
        <h1>Web Semantik</h1>
    </header>
    <!--Tag for navigation-->
    <nav>
        <ul>
            <li><a href="?navito=mahasiswa">Mahasiswa</a></li>
            <li><a href="json.php">JSON</a></li>
            <li><a href="rss.php">RSS</a></li>
            <li><a href="rdf.php">RDF</a></li>
        </ul>
    </nav>
    <div style="clear:both;"></div>
    <!--Tag for content-->
    <main>
        <?php
        $nav = filter_input(INPUT_GET, "navito");
        switch ($nav) {
            case 'mahasiswa':
                $mahasiswaController = new MahasiswaController();
                $mahasiswaController->index();
                break;
            default:
                $mahasiswaController = new MahasiswaController();
                $mahasiswaController->index();
                break;
        }
        ?>
    </main>>

    <!-- Jquery JS-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <!-- Vendor JS-->
    <script src="vendor/select2/select2.min.js"></script>
    <script src="vendor/datepicker/moment.min.js"></script>
    <script src="vendor/datepicker/daterangepicker.js"></script>

    <!-- Main JS-->
    <script src="js/global.js"></script>

    <!-- Datatable -->
    <script type="text/javascript" src="js/datatables.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#tableId').DataTable();
        });
    </script>
</body>

</html>
