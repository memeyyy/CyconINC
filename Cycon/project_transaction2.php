<?php 
    require_once('session.php');
    $page = "project_transaction";

?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <title>Payment Transaction</title>

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
            <header class="head" style="padding-top: 3em;">
                <div class="main-bar">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="dashboard">Dashboard</a></li>
                        <li class="breadcrumb-item active"> Transaction</li>
                    </ol>
                </div>
                <!-- /.main-bar -->
            </header>
            <div class="card card-cascade narrower mt-5">

                <!--Card image-->
                <div class="view gradient-card-header aqua-gradient narrower py-4 mx-4 mb-3 d-flex justify-content-center align-items-center">

                    <h4 class="white-text font-bold font-up mb-0">Payment Transaction</h4>

                </div>
                <!--/Card image-->

                <div class="px-4">
                    <a class="btn btn-primary btn-lg" data-toggle="modal" data-target="#modalprint">Print</a>

                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="tab" href="#all" role="tab" aria-controls="all">All Transaction</a>
                        </li>
                        <!-- <li class="nav-item">
    <a class="nav-link" data-toggle="tab" href="#pending" role="tab" aria-controls="pending">Pending</a>
  </li> -->

                    </ul>

                    <div class="tab-content">
                        <div class="tab-pane card  active" id="all" role="tabpanel">
                            <!--Table-->
                            <table id="example" class="table table-striped table-bordered table-responsive-md" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th>Project Title</th>
                                        <th>Project Order</th>
                                        <th>Amount</th>
                                        <th>Transaction Date</th>
                                        <th>Status</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th class="text-center"></th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    <tr>
                                        <?php 
        $po = mysqli_query($connection,"SELECT * FROM `purchase_order`");

        while ($po_data = mysqli_fetch_array($po)) 
        {
        $po1 = mysqli_query($connection,"SELECT pm.proj_Title,po.po_ORNum,po.po_Date,sum(boq.material_Qty * boq.material_Price) boq_total,s.status_Name,po.po_ID,pm.proj_ID  FROM `purchase_order` po
INNER JOIN project_monitoring pm ON po.proj_ID = pm.proj_ID
INNER JOIN `status` s ON po.status_ID = s.status_ID
INNER JOIN boq_material_list boq ON pm.proj_ID = boq.proj_ID WHERE po.po_ID = $po_data[0]");
        $po_data1 = mysqli_fetch_array($po1)
            
        
        ?>
                                        <td>
                                            <?php echo $po_data1[0]?>
                                        </td>
                                        <td>
                                            <?php echo $po_data1[1]?>
                                        </td>
                                        <td>
                                            <?php echo $po_data1[3]?>
                                        </td>
                                        <td>
                                            <?php echo $po_data1[2]?>
                                        </td>
                                        <td>
                                            <?php echo $po_data1[4]?>
                                        </td>

                                        <?php 
              if ($level_session == 1 || $level_session == 2 || $level_session == 4 || $level_session == 6) {
                ?>
                                        <td>
                                            <div class="btn-group" data-toggle="buttons">
                                                <button type="button" class="btn btn-primary  btn-sm" data-toggle="modal" data-target="#modalview" data-id="<?php echo $po_data1['po_ID']." , ".$po_data1['proj_ID']." , ".$level_session; ?>" id="viewProjectOrder"><i class="fa fa-eye" aria-hidden="true" data-toggle="tooltip" data-placement="top" title="View"></i></button>
                                                <?php 
                                                if ($level_session == 4 || $level_session == 6) {
                                                    ?>
                                                     <button type="button" class="btn btn-primary  btn-sm" data-toggle="modal" data-target="#modaledit" data-id="<?php echo $po_data1['po_ID']." , ".$po_data1['proj_ID']; ?>" id="editProjectOrder"><i class="fa fa-edit" aria-hidden="true" data-toggle="tooltip" data-placement="top" title="Edit"></i></button>
                                                
                                                    <?php

                                                }
                                                ?>
                                               
                                            </div>
                                        </td>
                                        <?php
              }
              else{
                ?>
                                            <td class="text-center">
                                                <button type="button" class="btn btn-warning  btn-sm">Disable</button>
                                            </td>
                                            <?php
              }
              ?>
                                    </tr>
                                    <?php 
            }
            ?>
                                </tbody>
                            </table>

                        </div>
                        <div class="tab-pane fade in " id="pending" role="tabpanel">
                            asdawsdasd
                        </div>
                    </div>

                    <script>
                        $(function() {
                            $('#myTab a:last').tab('show');
                            $('#all tab-pane fade in  active').tab('show');
                        })
                    </script>
                </div>


            </div>


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
            $(document).ready(function() {
                $(document).on('click', '#viewProjectOrder', function(e) {

                    e.preventDefault();

                    var uid = $(this).data('id'); // it will get id of clicked row

                    $('#view-content').html(''); // leave it blank before ajax call
                    $('#viewmodal-loader').show(); // load ajax loader

                    $.ajax({
                            url: 'project_transaction_View.php',
                            type: 'POST',
                            data: 'id=' + uid,
                            dataType: 'html'
                        })
                        .done(function(data) {
                            console.log(data);
                            $('#view-content').html('');
                            $('#view-content').html(data); // load response 
                            $('#viewmodal-loader').hide(); // hide ajax loader 
                        })
                        .fail(function() {
                            $('#view-content').html('<i class="glyphicon glyphicon-info-sign"></i> Something went wrong, Please try again...');
                            $('#viewmodal-loader').hide();
                        });

                });
                $(document).on('click', '#editProjectOrder', function(e) {

                    e.preventDefault();

                    var uid = $(this).data('id'); // it will get id of clicked row

                    $('#edit-content').html(''); // leave it blank before ajax call
                    $('#editmodal-loader').show(); // load ajax loader

                    $.ajax({
                            url: 'project_transaction_Edit.php',
                            type: 'POST',
                            data: 'id=' + uid,
                            dataType: 'html'
                        })
                        .done(function(data) {
                            console.log(data);
                            $('#edit-content').html('');
                            $('#edit-content').html(data); // load response 
                            $('#editmodal-loader').hide(); // hide ajax loader 
                        })
                        .fail(function() {
                            $('#edit-content').html('<i class="glyphicon glyphicon-info-sign"></i> Something went wrong, Please try again...');
                            $('#editmodal-loader').hide();
                        });

                });

                $(document).on('click', '#deleteProjectOrder', function(e) {

                    e.preventDefault();

                    var uid = $(this).data('id'); // it will get id of clicked row

                    $('#delete-content').html(''); // leave it blank before ajax call
                    $('#deletemodal-loader').show(); // load ajax loader

                    $.ajax({
                            url: 'project_transaction_Delete.php',
                            type: 'POST',
                            data: 'id=' + uid,
                            dataType: 'html'
                        })
                        .done(function(data) {
                            console.log(data);
                            $('#delete-content').html('');
                            $('#delete-content').html(data); // load response 
                            $('#deletemodal-loader').hide(); // hide ajax loader 
                        })
                        .fail(function() {
                            $('#delete-content').html('<i class="glyphicon glyphicon-info-sign"></i> Something went wrong, Please try again...');
                            $('#deletemodal-loader').hide();
                        });

                });


            });
        </script>

</body>

</html>

<div class="modal fade" id="modalview" tabindex="-1" role="dialog" aria-labelledby="myModalLabel2" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content " style="min-height: 500px;">
            <div class="modal-header text-center">
                <h5 class="modal-title w-100 font-bold">View</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body mx-3">

                <div id="viewmodal-loader" style="display: none; text-align: center;">
                    <img src="img/ajax-loader.gif">
                </div>

                <!-- content will be load here -->
                <div id="view-content"></div>


            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="modaledit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel2" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header text-center">
                <h5 class="modal-title w-100 font-bold">Edit Purchase Order Details</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body mx-5" style=" height: 500px;">

                <div id="editmodal-loader" style="display: none; text-align: center;">
                    <img src="img/ajax-loader.gif">
                </div>

                <!-- content will be load here -->
                <div id="edit-content"></div>


            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modaldelete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel2" aria-hidden="true">
    <div class="modal-dialog " role="document">
        <div class="modal-content ">
            <div class="modal-header text-center">
                <h5 class="modal-title w-100 font-bold">Are you sure you want to delete?</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body mx-3">

                <div id="deletemodal-loader" style="display: none; text-align: center;">
                    <img src="img/ajax-loader.gif">
                </div>

                <!-- content will be load here -->
                <div id="delete-content"></div>


            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="modalprint" tabindex="-1" role="dialog" aria-labelledby="myModalLabel2" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header text-center">
                <h5 class="modal-title w-100 font-bold">Transaction Document</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body mx-3">
                <center>
                    <form method="post" action="fpdf181/index.php" target="_blank">
                        <input class="btn btn-primary" type="submit" name="Print_Trans">
                    </form>
                </center>


            </div>
        </div>
    </div>
</div>