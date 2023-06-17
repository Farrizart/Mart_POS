<?php
include('../../Connection/Connect.php');

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<style>
    .border-all {
        border-radius: 20px;
        background: linear-gradient(to right, rgb(54, 54, 175), rgb(35, 224, 224));
        height: 100%;
    }

    .other-border {
        border-radius: 50px;
        background-color: #1d4597;
        border: 4px solid #77FF54;
    }
</style>

<body>
    <div class="overflow-hidden d-flex">
        <?php
        include('../../Components/Sidebar.php');
        ?>
        <div class="main-content">
            <?php
            include('../../Components/Navbar.php');
            ?>
            <div class="container-fluid">

                <div class="d-flex justify-content-between">
                    <div class="h4 " style="margin-top: 120px;">
                        Statistic Summary Detail
                    </div>

                    <!-- Show Last Seen -->
                    <div class="text-end text-secondary" style="margin-top: 120px;">
                        Last Seen:
                        <?php
                        $date1 = date_create('2023-06-13'); //old
                        $date2 = date_create(date('Y-m-d')); //new
                        $diff = date_diff($date1, $date2);

                        echo  $show = $diff->format("%a") . ' ' . 'days ago';
                        ?>
                    </div>
                </div>

                <hr>

                <div class="row">
                    <div class="col-8">
                        <div class="border border-all d-flex flex-column gap-3 p-4">
                            <h3 class="text-white">
                                Sales Overview</h3>
                            <div class="other-border d-flex gap-3 p-2 ps-3">
                                <img src="../../Images/up.png" alt="">
                                <h4 class="pt-3 text-white ">
                                    Total Sales:
                                    <!-- Dynamic-->
                                    Times
                                </h4>
                            </div>
                            <div class="other-border d-flex gap-3 p-2 ps-3">
                                <img src="../../Images/income.png" alt="">
                                <h4 class="pt-3 text-white ">
                                    Total Incomes: $
                                    <!-- Dynamic-->
                                </h4>
                            </div>
                        </div>

                    </div>
                    <div class="col-4">
                        <div class="border border-all d-flex flex-column gap-3 p-4">
                            <h3 class="text-white">
                                Product Overview</h3>
                            <div class="other-border d-flex gap-3 p-2 ps-3" style="border-radius: 20px;">
                                <img src="../../Images/producttotal.png" alt="">

                                <!-- Count Product -->
                                <?php
                                $all_pro = $con->query("SELECT * FROM product");
                                if (mysqli_num_rows($all_pro) > 0) {
                                ?>
                                    <h4 class="pt-3 text-white" data-count="<?php echo mysqli_num_rows($all_pro) ?>">
                                        Total Product: &nbsp;&nbsp;&nbsp; <span class="mx-5"> 0 </span>
                                    </h4>
                                <?php } ?>
                            </div>

                            <div class="other-border d-flex gap-3 p-2 ps-3" style="border-radius: 20px;">
                                <img src="../../Images/category.png" alt="">

                                <!-- Count Category -->
                                <?php
                                $all_cate = $con->query("SELECT * FROM category");
                                if (mysqli_num_rows($all_cate) > 0) {
                                ?>
                                    <h4 class="pt-3 text-white" data-count="<?php echo mysqli_num_rows($all_cate) ?>">
                                        Total Category: &nbsp; <span class="mx-5"> 0 </span>
                                    </h4>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row mt-4">
                    <div class="col-8">
                        <div class="border border-all d-flex flex-column gap-3 p-4"></div>
                    </div>

                    <div class="col-4">
                        <div class="border border-all d-flex flex-column gap-3 p-4">
                            <h3 class="text-white">
                                Stock Control</h3>
                            <div class="other-border d-flex gap-3 p-2 ps-3" style="border-radius: 20px;">
                                <img src="../../Images/stockin.png" alt="">

                                <!-- Sum Stock-In-->
                                <?php
                                $sum_pro = $con->query("SELECT SUM(Qty) AS Qty FROM product");
                                while ($row_sum = $sum_pro->fetch_assoc()) {
                                ?>
                                    <h4 class="pt-3 text-white" data-count="<?= $row_sum['Qty'] ?>">
                                        Total Stock-IN: &nbsp;&nbsp; <span class="mx-5"> 0 </span>
                                    </h4>
                                <?php } ?>
                            </div>


                            <div class="other-border d-flex gap-3 p-2 ps-3" style="border-radius: 20px;">
                                <img src="../../Images/expired.png" alt="">

                                <!-- Sum Expired product-->
                                <?php
                                $sum_proExpired = $con->query("SELECT SUM(Qty) AS Qty FROM product WHERE StatusID = 4");
                                while ($row_sum = $sum_proExpired->fetch_assoc()) {
                                ?>
                                    <h4 class="pt-3 text-white" data-count="<?= $row_sum['Qty'] ?>">
                                        Expired Product: <span class="mx-5"> 0 </span>
                                    </h4>
                                <?php } ?>
                            </div>


                            <div class="other-border d-flex gap-3 p-2 ps-3" style="border-radius: 20px;">
                                <img src="../../Images/topsale.png" alt="">
                                <h4 class="pt-3 text-white ">
                                    Top Sale:
                                    <!-- Dynamic-->
                                </h4>
                            </div>
                            <div class="other-border d-flex gap-3 p-2 ps-3" style="border-radius: 20px;">
                                <img src="../../Images/soldout.png" alt="">
                                <!-- Sum Sold Out product-->
                                <?php
                                $sum_proOut = $con->query("SELECT Count(*) AS Qty FROM product WHERE StatusID = 3");
                                while ($row_sum = $sum_proOut->fetch_assoc()) {
                                ?>
                                    <h4 class="pt-3 text-white" data-count="<?= $row_sum['Qty'] ?>">
                                        Sold Out: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        <span class="mx-5"> 0 </span>
                                    </h4>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>


                <!-- Top Selling -->
                <div class="row mt-5">
                    <div class="col-12">
                        <div class="bg-white p-4 pb-5 shadow" style="border-radius: 20px;">
                            <p class="fs-4">
                                Top Selling Product
                            </p>

                            <table class="table table-hover">
                                <thead>
                                    <tr class="mt-4 text-white text-center h5" style="background-color: #198531; line-height: 50px;">
                                        <td>
                                            ProductID</td>
                                        <td>
                                            Product Name</td>
                                        <td>
                                            Qty Sold-Out</td>
                                        <td>
                                            Remaining Stock</td>
                                        <td>
                                            Image
                                        </td>
                                    </tr>
                                </thead>

                                <tbody>
                                    <tr class="text-center h6" style="line-height: 50px;">
                                        <td>1</td>
                                        <td>1</td>
                                        <td>1</td>
                                        <td>1</td>
                                        <td>1</td>
                                    </tr>

                                </tbody>

                            </table>
                            <div class="fs-5 p-2 mb-0" style="float: right;">
                                <a href="#topsale" data-bs-toggle="offcanvas" aria-controls="topsale">
                                    <i class="fa-sharp fa-solid fa-eye"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>


                <!-- Expired Product -->
                <div class="row mt-5">
                    <div class="col-12">
                        <div class="bg-white p-4 pb-5 shadow" style="border-radius: 20px;">
                            <p class="fs-4">
                                Expired Product
                            </p>

                            <table class="table table-hover">
                                <thead>
                                    <tr class="mt-4 text-white text-center h5" style="background-color: #198531; line-height: 50px;">
                                        <td>
                                            ProductID</td>
                                        <td>
                                            Product Name</td>
                                        <td>
                                            Qty in Stock</td>
                                        <td>
                                            Image
                                        </td>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php
                                    $qry_expire = $con->query("SELECT * FROM product WHERE StatusID = 4 LIMIT 5");
                                    while ($row_proExpire = $qry_expire->fetch_assoc()) {
                                    ?>
                                        <tr class="text-center h6" style="line-height: 50px;">
                                            <td> <?= $row_proExpire['ProductID'] ?></td>
                                            <td> <?= $row_proExpire['ProductName'] ?></td>
                                            <td> <?= $row_proExpire['Qty'] ?></td>
                                            <td> <img src="../../Images/<?php echo $row_proExpire['Image'] ?>" width="50px" height="50px" alt=""> </td>
                                        </tr>

                                    <?php } ?>
                                </tbody>

                            </table>
                            <div class="fs-5 p-2 mb-0" style="float: right;">
                                <a href="#expired" data-bs-toggle="offcanvas" aria-controls="expired">
                                    <i class="fa-sharp fa-solid fa-eye"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>


                <!-- Product that never sold -->
                <div class="row mt-5">
                    <div class="col-12">
                        <div class="bg-white p-4 pb-5 shadow" style="border-radius: 20px;">
                            <p class="fs-4">
                                Never Sold Out
                            </p>

                            <table class="table table-hover">
                                <thead>
                                    <tr class="mt-4 text-white text-center h5" style="background-color: #198531; line-height: 50px;">
                                        <td>
                                            ProductID</td>
                                        <td>
                                            Product Name</td>
                                        <td>
                                            Qty in Stock</td>
                                        <td>
                                            Image
                                        </td>
                                    </tr>
                                </thead>

                                <tbody>
                                    <tr class="text-center h6" style="line-height: 50px;">
                                        <td>1</td>
                                        <td>1</td>
                                        <td>1</td>
                                        <td>1</td>
                                    </tr>

                                </tbody>

                            </table>
                            <div class="fs-5 p-2 mb-0" style="float: right;">
                                <a href="#never" data-bs-toggle="offcanvas" aria-controls="never">
                                    <i class="fa-sharp fa-solid fa-eye"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>




    <!-- offcanvas top sale -->
    <div class="offcanvas offcanvas-start w-100" tabindex="-1" id="topsale" aria-labelledby="topsaleLabel" style="transition: 0.8s ease;">
        <div class="offcanvas-header">
            <img data-bs-dismiss="offcanvas" aria-label="Close" src="../../Images/gobackicon.png" style="cursor: grab;" width="80px" height="80px">
        </div>
        <div class="offcanvas-body">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="bg-white p-4 pb-5" style="border-radius: 20px;">
                            <p class="fs-4">
                                Top Selling Product
                            </p>

                            <table class="table table-hover">
                                <thead>
                                    <tr class="mt-4 text-white text-center h5" style="background-color: #198531; line-height: 50px;">
                                        <td>
                                            ProductID</td>
                                        <td>
                                            Product Name</td>
                                        <td>
                                            Qty Sold-Out</td>
                                        <td>
                                            Remaining Stock</td>
                                        <td>
                                            Image
                                        </td>
                                    </tr>
                                </thead>

                                <tbody>
                                    <tr class="text-center h6" style="line-height: 50px;">
                                        <td>1</td>
                                        <td>1</td>
                                        <td>1</td>
                                        <td>1</td>
                                        <td>1</td>
                                    </tr>

                                </tbody>

                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- offcanvas Expired product -->
    <div class="offcanvas offcanvas-start w-100" tabindex="-1" id="expired" aria-labelledby="expiredLabel" style="transition: 0.8s ease;">
        <div class="offcanvas-header">
            <img data-bs-dismiss="offcanvas" aria-label="Close" src="../../Images/gobackicon.png" style="cursor: grab;" width="80px" height="80px">

        </div>
        <div class="offcanvas-body">
            <div class="row">
                <div class="col-12">
                    <div class="bg-white p-4 pb-5" style="border-radius: 20px;">
                        <p class="fs-4">
                            Expired Product
                        </p>

                        <table class="table table-hover">
                            <thead>
                                <tr class="mt-4 text-white text-center h5" style="background-color: #198531; line-height: 50px;">
                                    <td>
                                        ProductID</td>
                                    <td>
                                        Product Name</td>
                                    <td>
                                        Qty in Stock</td>
                                    <td>
                                        Image
                                    </td>
                                </tr>
                            </thead>

                            <tbody>
                                <?php
                                $qry_expire = $con->query("SELECT * FROM product WHERE StatusID = 4");
                                while ($row_proExpire = $qry_expire->fetch_assoc()) {
                                ?>
                                    <tr class="text-center h6" style="line-height: 50px;">
                                        <td> <?= $row_proExpire['ProductID'] ?></td>
                                        <td> <?= $row_proExpire['ProductName'] ?></td>
                                        <td> <?= $row_proExpire['Qty'] ?></td>
                                        <td> <img src="../../Images/<?php echo $row_proExpire['Image'] ?>" width="50px" height="50px" alt=""> </td>
                                    </tr>

                                <?php } ?>
                            </tbody>

                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- offcanvas never sold product -->
    <div class="offcanvas offcanvas-start w-100" tabindex="-1" id="never" aria-labelledby="neverLabel" style="transition: 0.8s ease;">
        <div class="offcanvas-header">
            <img data-bs-dismiss="offcanvas" aria-label="Close" src="../../Images/gobackicon.png" style="cursor: grab;" width="80px" height="80px">

        </div>
        <div class="offcanvas-body">
            <div class="row">
                <div class="col-12">
                    <div class="bg-white p-4 pb-5" style="border-radius: 20px;">
                        <p class="fs-4">
                            Never Sold Out
                        </p>

                        <table class="table table-hover">
                            <thead>
                                <tr class="mt-4 text-white text-center h5" style="background-color: #198531; line-height: 50px;">
                                    <td>
                                        ProductID</td>
                                    <td>
                                        Product Name</td>
                                    <td>
                                        Qty in Stock</td>
                                    <td>
                                        Image
                                    </td>
                                </tr>
                            </thead>

                            <tbody>
                                <tr class="text-center h6" style="line-height: 50px;">
                                    <td>1</td>
                                    <td>1</td>
                                    <td>1</td>
                                    <td>1</td>
                                </tr>

                            </tbody>

                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>

<script src="../../Action.js"></script>

<!-- Animation Number Count -->
<script>
    $(document).ready(function() {
        $('h4 span').each(function() {
            const This = $(this);
            $({
                Count: This.text()
            }).animate({
                Count: This.parent().attr('data-count')
            }, {
                duration: 2000,
                easing: "linear",

                step: function() {
                    This.text(Math.floor(this.Count) + 1)
                }
            })
        })
    })
</script>