<?php 
    require_once('session.php');
    $page = "dashboard";

    

       

?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <title>Dashboard</title>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="css/font-awesome.min.css">

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Material Design Bootstrap -->
    <link href="css/mdb.min.css" rel="stylesheet">

    <!-- Template styles -->

    <link rel="stylesheet" type="text/css" href="css/admin.css">
    <link rel="stylesheet" type="text/css" href="css/dataTables.bootstrap4.min.css" />
    <link rel="stylesheet" type="text/css" href="css/Table_style.css">

</head>

<body>

    <header>

        <?php 

        require_once('admin_nav.php');

        ?>
    </header>

    <main>
        <!--Main layout-->
        <div class="container" style=" min-height: 900px;">





        </div>

    </main>

    <!--/.Main layout-->
    <?php
    include ('admin_footer.php');
    include ('general_script.php');
    ?>

        <script src="js/jquery.dataTables.min.js"></script>
        <script src="js/dataTables.bootstrap4.min.js"></script>

        </script>

        <script>
            new WOW().init();

            $(document).ready(function() {
                $('#example').DataTable();
                $('.dataTables_wrapper').find('label').each(function() {
                    $(this).parent().append($(this).children());
                });
                $('select').addClass('mdb-select');
                $('.mdb-select').material_select();
            });

            // Tooltips Initialization
            $(function() {
                $('[data-toggle="tooltip"]').tooltip()
            })
        </script>

</body>

</html>