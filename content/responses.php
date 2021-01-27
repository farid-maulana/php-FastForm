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
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- [ Main Content ] start -->
                            <div class="row">
                                <div class="col-md-12 col-lg-12">
                                    <div class="card">
                                        <div class="card-body table-border-style">
                                            <div class="table-responsive">
                                                <table class="table">
                                                    <thead>
                                                        <tr> 
                                                            <th>#</th>
                                                            <?php
                                                            $query = mysqli_query($connect, "SELECT * FROM questions WHERE form_id=$id");
                                                            while ($question = mysqli_fetch_array($query)) {
                                                            ?>
                                                                <th><?php echo $question['question']; ?></th>
                                                            <?php
                                                            }
                                                            ?>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                        $no = 0;
                                                        $query = mysqli_query($connect, "SELECT * FROM answers WHERE form_id=$id GROUP BY id_session");
                                                        while ($answer = mysqli_fetch_array($query)) {
                                                        ?>
                                                            <tr>
                                                                <td><?php echo ++$no; ?></td>
                                                                <?php
                                                                $session = $answer['id_session'];
                                                                $query2 = mysqli_query($connect, "SELECT * FROM answers WHERE id_session = '$session'");
                                                                    while ($answers = mysqli_fetch_array($query2)) {
                                                                ?>
                                                                        <td><?php echo $answers['answer']; ?></td>
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
                                        </div>
                                    </div>
                                </div>
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