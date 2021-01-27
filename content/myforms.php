<div class="pcoded-main-container">
    <div class="pcoded-wrapper container">
        <div class="pcoded-content">
            <div class="pcoded-inner-content">
                <div class="main-body">
                    <div class="page-wrapper">
                        <div class="page-header">
                            <div class="page-block">
                                <div class="row align-items-center">
                                    <div class="col-md-12">
                                        <div class="page-header-title d-flex justify-content-between">
                                            <h4 class="m-b-10">My Forms</h4>
                                            <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#newForm"><i class="fa fa-plus"></i> New Form</button>
                                            <div id="newForm" class="modal fade" tabindex="-1" role="dialog">
                                                <div class="modal-dialog" role="document">
                                                    <form action="../process/store.php?table=forms" method="POST">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="newForm">New Form</h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <div class="form-group">
                                                                    <input type="text" class="form-control" name="form_name" placeholder="Form name" required>
                                                                </div>
                                                                <div class="form-group">
                                                                    <textarea class="form-control" name="form_desc" placeholder="Form description" style="resize:none"></textarea>
                                                                </div>
                                                                <input type="hidden" name="user_id" value="<?php echo $user_id; ?>">
                                                                <input type="hidden" name="url" value="myforms">
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn  btn-secondary" data-dismiss="modal">Close</button>
                                                                <button type="submit" class="btn  btn-primary">Save changes</button>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- [ Main Content ] start -->
                        <div class="row">
                            <?php
                            $query = mysqli_query($connect, "SELECT * FROM forms WHERE user_id='$user_id' ORDER BY form_id DESC");
                            while ($data = mysqli_fetch_array($query)) {
                            ?>
                                <div class="col-md-6 col-lg-4">
                                    <a href="?p=form&id=<?php echo $data['form_id']; ?>">
                                        <div class="card">
                                            <div class="card-body d-flex justify-content-between">
                                                <?php
                                                if (strlen($data['form_name']) > 30) {
                                                    $data['form_name'] = substr($data['form_name'], 0, 30) . '...'; 
                                                }
                                                echo $data['form_name']; ?>
                                                <div>
                                                    <a href="#" title="Edit" class="pull-right"><i class="feather icon-edit"></i></a>
                                                    <a href="../process/delete.php?table=forms&form_id=<?php echo $id; ?>&url=myforms" title="Delete" class="pull-right"><i class="feather icon-trash-2 text-danger"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            <?php
                            }
                            ?>
                        </div>
                        <!-- [ Main Content ] end -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>