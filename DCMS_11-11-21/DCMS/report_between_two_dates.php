<?php
ob_start();
session_start();
//if (isset($_SESSION['flag']) != 1) {
//    header("Location: ./login.php");
//    exit();
//}
include './connection.php';
?>
<html>
    <head>
        <script src="https://cdn.jsdelivr.net/npm/jquery@2.2.4/dist/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.4/dist/umd/popper.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/jquery-match-height@0.7.2/dist/jquery.matchHeight.min.js"></script>
        <script src="assets/js/main.js"></script>

        <!--  Chart js -->
        <script src="https://cdn.jsdelivr.net/npm/chart.js@2.7.3/dist/Chart.bundle.min.js"></script>

        <!--Chartist Chart-->
        <script src="https://cdn.jsdelivr.net/npm/chartist@0.11.0/dist/chartist.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/chartist-plugin-legend@0.6.2/chartist-plugin-legend.min.js"></script>

        <script src="https://cdn.jsdelivr.net/npm/jquery.flot@0.8.3/jquery.flot.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/flot-pie@1.0.0/src/jquery.flot.pie.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/flot-spline@0.0.1/js/jquery.flot.spline.min.js"></script>

        <script src="https://cdn.jsdelivr.net/npm/simpleweather@3.1.0/jquery.simpleWeather.min.js"></script>
        <script src="assets/js/init/weather-init.js"></script>

        <script src="https://cdn.jsdelivr.net/npm/moment@2.22.2/moment.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/fullcalendar@3.9.0/dist/fullcalendar.min.js"></script>
        <script src="assets/js/init/fullcalendar-init.js"></script>

        <script src="assets/js/lib/data-table/datatables.min.js"></script>
        <script src="assets/js/lib/data-table/dataTables.bootstrap.min.js"></script>
        <script src="assets/js/lib/data-table/dataTables.buttons.min.js"></script>
        <script src="assets/js/lib/data-table/buttons.bootstrap.min.js"></script>
        <script src="assets/js/lib/data-table/jszip.min.js"></script>
        <script src="assets/js/lib/data-table/vfs_fonts.js"></script>
        <script src="assets/js/lib/data-table/buttons.html5.min.js"></script>
        <script src="assets/js/lib/data-table/buttons.print.min.js"></script>
        <script src="assets/js/lib/data-table/buttons.colVis.min.js"></script>
        <script src="assets/js/init/datatables-init.js"></script>

        <?php
        include './head.php';
        ?>
        <link rel="stylesheet" href="css/jquery-ui.min.css">
        <!--        <link rel="stylesheet" href="css/style.css">-->
    </head>
    <body>
        <?php
        include './sidebar.php';
        ?>

        <div id="right-panel" class="right-panel">
            <?php
            include './header.php';
            ?>

            <div class="content">
                <section>
                    <center>
                        <div style="border: 3px solid white ; margin-top: 50px; box-shadow: 1px 1px 7px 7px;width: 880px; padding: 22px; border-radius: 7px;">
                            <h1 style="text-align: left;">Report</h1>
                            <div style="border: 1px solid black;">

                            </div><br>
                            <div id="date-wrap">
                                <label for="from">From</label>
                                <input type="date" id="from" name="date1" >
                                <label for="to">to</label>
                                <input type="date" id="to" name="date2" >
                            </div>
                            <div id="content">
                                <table id="table-data" border="" width="100%" cellpadding="10px">
                                    <thead>
                                    <th>Event Name</th>
                                    <th>Event Type</th>
                                    <th>Event Date</th>
                                    <th>Venue</th>
                                    <th>Action</th>
                                    </thead>
                                    <tbody></tbody>
                                </table>
                            </div>
                        </div>
                    </center>

                </section>
            </div>
        </div>

        <!-- jquery -->
        <script src="js/jquery-1.12.4.min.js"></script>
        <!-- jquery ui -->
        <script src="js/jquery-ui-1.12.1.min.js"></script>
        <script>
            $(function () {
                var minD;
                var maxD;
                var dateFormat = "yy-mm-dd",
                        from = $("#from") // Date1
                        .datepicker({
                            changeMonth: true,
                            changeYear: true,
                            numberOfMonths: 1,
                            yearRange: "2001:2030"
                        })
                        .on("change", function () {
                            to.datepicker("option", "minDate", getDate(this));
                            minD = $(this).val();
                            if (minD !== '' && maxD !== '') {
                                loadTable(minD, maxD);
                            }
                        }),
                        to = $("#to").datepicker({// Date2
                    changeMonth: true,
                    changeYear: true,
                    numberOfMonths: 1,
                    yearRange: "2001:2030"
                })
                        .on("change", function () {
                            from.datepicker("option", "maxDate", getDate(this));
                            maxD = $(this).val();
                            if (minD !== '' && maxD !== '') {
                                loadTable(minD, maxD);
                            }
                        });

                // change date format
                function getDate(element) {
                    var date;
                    try {
                        date = $.datepicker.parseDate(dateFormat, element.value);
                    } catch (error) {
                        date = null;
                    }

                    return date;
                }

                // load table
                function loadTable(date1, date2) {
                    $.ajax({
                        url: "get_event_data.php",
                        type: "POST",
                        data: {date1: date1, date2: date2},
                        success: function (response) {
                            $("#table-data tbody").html(response);
                        }
                    });
                }

                loadTable(minD, maxD);
            });
        </script>

        <div class="clearfix"></div>
        <footer class="site-footer">
            <?php
            //include './footer.php';
            ?>
        </footer>

    </body>
</html>