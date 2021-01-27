<?php
session_start();
$sid = session_id();
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
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- [ Main Content ] start -->
                            <form action="../process/store.php?table=answers" method="POST">
                                <div class="row">
                                    <div class="col-md-12 col-lg-12">
                                        <div class="card">
                                            <div class="card-body">
                                                <h4><?php echo $data['form_name']; ?></h4>
                                                <p><?php echo $data['form_desc']; ?></p>
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
                                                        <h6>                                                        
                                                            <?php 
                                                            echo $question['question']; 
                                                            echo $question['required'] == 1 ? '&nbsp;<span style="color:red">*</span>' : '';
                                                            ?>
                                                        </h6>
                                                        <input type="hidden" name="questions[]" value="<?php echo $question['question_id']; ?>">
                                                        <input type="hidden" name="session_id" value="<?php echo $sid; ?>">
                                                        <input type="hidden" name="form_id" value="<?php echo $id; ?>">
                                                        <?php
                                                        if ($question['question_type'] == 1) {
                                                        ?>
                                                            <input type="text" class="form-control" name="answers[]" <?php echo $question['required'] == '1' ? 'required' : ''; ?>>
                                                        <?php
                                                        } else {
                                                        ?>
                                                            <textarea class="form-control" name="answers[]" style="resize:none" <?php echo $question['required'] == '1' ? 'required' : ''; ?>></textarea>
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
                                    <button type="submit" class="btn btn-primary ml-3">Submit</button>
                                </div>
                            </form>
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