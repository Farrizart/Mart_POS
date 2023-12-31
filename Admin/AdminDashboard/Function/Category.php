<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <!-- Category -->
    <div class="row mt-3">
        <div class="col-12" id="slide2">
            <div class="bg-white p-4 shadow border" style="border-radius: 20px;">
                <p style="font-weight: bold; text-decoration:overline" class="fs-5">
                    Category List
                </p>

                <div class="d-flex gap-2 justify-content-end three-btn">
                    <button class="btn p-3 btn-1 text-white" data-bs-toggle="modal" data-bs-target="#addcate">Add Category</button>
                </div>

                <table class="table table-hover mt-3">
                    <thead>
                        <tr class="mt-4 text-white text-center h5" style="background: linear-gradient( rgb(13, 73, 141), rgb(33, 150, 188)); line-height: 50px;">
                            <td>CategoryID</td>
                            <td>Category Name</td>
                            <td>Action</td>
                        </tr>
                    </thead>

                    <?php
                    $qry_cate = $con->query("SELECT * FROM category ORDER BY CategoryID DESC");
                    while ($cate_row = $qry_cate->fetch_assoc()) {
                    ?>
                        <tbody>
                            <tr class="text-center h6" style="line-height: 50px;">
                                <td><?= $cate_row['CategoryID'] ?> </td>
                                <td><?= $cate_row['CategoryName'] ?> </td>
                                <td align="center" class="pt-1">
                                    <button type="button" class="btn text-white px-4 p-2" style="background-color: #1D9A29;" data-bs-toggle="offcanvas" data-bs-target="#editcate-<?= $cate_row['CategoryID'] ?>" aria-controls="editcate">
                                        <i class="fa-solid fa-pen-to-square" style="color: yellow;"></i>
                                        Edit
                                    </button>

                                    <button type="button" class="btn text-white px-4 p-2 " style="background-color: red;" data-bs-toggle="modal" data-bs-target="#deletecate-<?= $cate_row['CategoryID'] ?>" aria-controls="deletecate">
                                        <i class="fa-sharp fa-solid fa-trash" style="color: yellow;"></i>
                                        Delete
                                    </button>
                                </td>
                            </tr>
                        </tbody>

                        <!-- Delete Category -->
                        <!-- Delete Staff -->
                        <div class="modal fade" id="deletecate-<?= $cate_row['CategoryID'] ?>" tabindex="-1" role="dialog" aria-labelledby="deleteLabelLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header" style="background-color:crimson">
                                        <h3 class="modal-title text-warning" id="deleteLabelLabel">Are You Sure?</h3>
                                        <img src="https://cdn1.iconfinder.com/data/icons/everyday-5/64/cross_delete_stop_x_denied_stopped-256.png" width="50px" height="50px" data-bs-dismiss="modal" aria-label="Close" style="cursor: grab;">
                                    </div>
                                    <div class="modal-body">
                                        <form action="" method="get">
                                            <p class="mt-5 text-center"> Do you want to delete this Category as <?= '"' . $cate_row['CategoryName'] . '"' ?></p>

                                            <div class="col-12">
                                                <input type="hidden" class="form-control" name="del_cateid" value="<?= $cate_row['CategoryID'] ?>" readonly>
                                            </div>

                                            <div class="modal-footer mt-5">
                                                <button type="button" class="btn btn-danger" data-dismiss="modal">Leave</button>
                                                <button type="submit" name="delete_cate" class="btn btn-outline-danger">Delete</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <!-- Update Category -->
                        <div class="offcanvas offcanvas-end w-25 h-50" tabindex="-1" id="editcate-<?= $cate_row['CategoryID'] ?>" aria-labelledby="editLabel" style="background:linear-gradient(rgb(8, 234, 234), dodgerblue, rgb(13, 13, 183));">
                            <div class="offcanvas-header">
                                <h3 class="offcanvas-title text-white" id="editLabel">Update Category</h3>
                                <img src="https://cdn1.iconfinder.com/data/icons/everyday-5/64/cross_delete_stop_x_denied_stopped-256.png" width="50px" height="50px" data-bs-dismiss="offcanvas" aria-label="Close" style="cursor: grab;">
                            </div>
                            <div class="offcanvas-body mt-3">
                                <form action="" method="post" enctype="multipart/form-data">
                                    <div class="row gap-4">
                                        <div class="col-12">
                                            <label class="control-label">Category_ID: </label>
                                            <input type="text" name="check_cateid" value=" <?= $cate_row['CategoryID'] ?>" class="form-control" readonly>
                                        </div>

                                        <div class="col-12">
                                            <label class="control-label">Category Name: </label>
                                            <input type="text" name="upd_catename" value=" <?= $cate_row['CategoryName'] ?>" class="form-control">
                                        </div>

                                    </div>

                                    <div class="modal-footer mt-5 gap-2 pt-3" style="border-top: 1px solid white;">
                                        <button type="button" class="btn btn-danger" data-bs-dismiss="offcanvas">Leave</button>
                                        <button type="submit" name="upd_cate" class="btn btn-success">Update</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    <?php } ?>
                </table>
            </div>
        </div>
    </div>


    <!-- modal add category -->
    <div class="modal fade" style="background-color: rgba(0, 0, 0, 0.685);" id="addcate" tabindex="-1" aria-labelledby="addcateLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5 text-white" id="addproLabel">Product Control</h1>
                    <img src="https://cdn1.iconfinder.com/data/icons/everyday-5/64/cross_delete_stop_x_denied_stopped-256.png" width="50px" height="50px" data-bs-dismiss="modal" aria-label="Close" style="cursor: grab;">
                </div>
                <div class="modal-body">
                    <form method="post" enctype="multipart/form-data">
                        <div class="row gap-4">
                            <div class="col-12">
                                <label for="" class="control-label">Category Name:</label>
                                <input type="text" name="cate_name" class="form-control">
                            </div>

                            <div class="col-12">
                                <label for="" class="control-label">Description:</label>
                                <textarea name="cate_descr" class="form-control" rows="10"></textarea>
                            </div>
                        </div>

                        <div class="modal-footer mt-5">
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Leave</button>
                            <button type="submit" name="add_cate" class="btn btn-success">Add</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>