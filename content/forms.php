<?php
$id = $_GET['id'];
$query = mysqli_query($connect, "SELECT * FROM forms WHERE form_id=$id");
while ($data = mysqli_fetch_array($query)) {
    ?>
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
                                                <h4 class="m-b-10"><?php echo $data['form_name']; ?></h4>
                                                <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#addQuestion"><i class="fa fa-plus"></i> Add Question</button>
                                                <div id="addQuestion" class="modal fade" tabindex="-1" role="dialog">
                                                    <div class="modal-dialog" role="document">
                                                        <form action="../process/store.php?table=questions" method="POST">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="addQuestion">Add Question</h5>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <div class="form-group">
                                                                        <input type="text" class="form-control" name="question" placeholder="Question" required>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <select class="form-control" name="type">
                                                                            <option value="1">Short answer</option>
                                                                            <option value="2">Long answer</option>
                                                                        </select>
                                                                    </div>
                                                                    <div class="form-group form-check">
                                                                        <input type="checkbox" class="form-check-input" id="required" name="required" value="1">
                                                                        <label class="form-check-label" for="required">Required</label>
                                                                    </div>
                                                                    <input type="hidden" name="form_id" value="<?php echo $id; ?>">
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
                                <div class="col-md-12 col-lg-12">
                                    <div class="card">
                                        <div class="card-body">
                                            <input type="text" class="form-control title" name="form_name" value="<?php echo $data['form_name']; ?>">
                                            <textarea class="form-control" name="form_desc" style="resize:none" placeholder="Form description"><?php echo $data['form_desc']; ?></textarea>
                                        </div>
                                    </div>
                                </div>
                                <?php
                                $query = mysqli_query($connect, "SELECT * FROM questions WHERE form_id=$id");
                                $count = mysqli_num_rows($query);
                                if ($count != 0) {
                                    while ($question = mysqli_fetch_array($query)) {
                                ?>
                                        <div class="col-md-12 col-lg-12">
                                            <div class="card">
                                                <div class="card-body">
                                                    <div class="d-flex justify-content-between">
                                                        <h6>                                                        
                                                            <?php 
                                                            echo $question['question']; 
                                                            echo $question['required'] == 1 ? '&nbsp;<span style="color:red">*</span>' : '';
                                                            ?>
                                                        </h6>
                                                        <div>
                                                            <a href="#" title="Edit" class="pull-right"><i class="feather icon-edit"></i></a>
                                                            <a href="../process/delete.php?table=questions&id=<?php echo $question['question_id']; ?>&form_id=<?php echo $id; ?>" title="Delete" class="pull-right"><i class="feather icon-trash-2 text-danger"></i></a>
                                                        </div>
                                                    </div>
                                                    <?php
                                                    if ($question['question_type'] == 1) {
                                                    ?>
                                                        <input type="text" class="form-control" name="answer" <?php echo $question['required'] == '1' ? 'required' : ''; ?>>
                                                    <?php
                                                    } else {
                                                    ?>
                                                        <textarea class="form-control" name="answer" style="resize:none" <?php echo $question['required'] == '1' ? 'required' : ''; ?>></textarea>
                                                    <?php
                                                    }
                                                    ?>
                                                </div>
                                            </div>
                                        </div>
                                <?php
                                    }
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
<?php
}
?>