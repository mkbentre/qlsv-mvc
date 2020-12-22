<?php include "../layout/header.php" ?>
            <h1>Danh sách sinh viên</h1>
            <a href="StudentController.php?action=add" class="btn btn-info">Add</a>
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>STT</th>
                        <th>Mã SV</th>
                        <th>Tên</th>
                        <th>Ngày Sinh</th>
                        <th>Giới Tính</th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    $stt = 0;
                    foreach ($students as $student): $stt++; ?>
                    <tr>
                        <td><?=$stt?></td>
                        <td><?=$student->getId()?></td>
                        <td><?=$student->getName()?></td>
                        <td><?=$student->getBirthday()?></td>
                        <td><?=$student->getGenderName()?></td>
                        <td><a href="StudentController.php?action=edit&id=<?=$student->getId()?>">Sửa</a></td>
                                <td>
                                    <?php if(false) {?>
                                    <a onclick="alert('sinh viên này đã đăng ký môn học, không được xóa')" href="javascript:void()">Xóa</a></td>
                                    <?php }else{ ?>
                                    <a onclick="return confirm('bạn có muốn xóa sv này không')" href="StudentController.php?action=delete&id=<?=$student->getId()?>">Xóa</a></td>
                                    <?php } ?>
                    </tr>
                <?php endforeach ?>
                </tbody>
            </table>
            <script src="../lib/jquery/jquery.min.js"></script>
            <script src="../lib/bootstrap-3.3.7-dist/js/bootstrap.min.js"></script>
        </div>
    </body>
    </html>