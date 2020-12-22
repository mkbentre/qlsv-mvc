<?php include "../layout/header.php" ?>
<h1>Danh Sách Môn Học</h1>
<a href="SubjectController.php?action=add" class="btn btn-info">Add</a>
<table class="table table-hover">
    <thead>
        <tr>
            <th>STT</th>
            <th>Mã MH</th>
            <th>Tên</th>
            <th>Số tín chỉ</th>
            <th colspan="2">Tùy Chọn</th>
        </tr>
    </thead>
    <tbody>
      <?php 
      $stt = 0;
      foreach ($subjects as $subject) : $stt++;
       ?>
       <tr>
        <td><?=$stt?></td>
        <td><?=$subject->getId()?></td>
        <td><?=$subject->getName()?></td>
        <td><?=$subject->getNumberOfCredit()?></td>
        <td><a href="SubjectController.php?action=edit&id=<?=$subject->getId()?>">Sửa</a></td>
        <td><a onclick="return confirm('Bạn có muốn xóa môn học này không')" href="SubjectController.php?action=delete&id=<?=$subject->getId()?>">Xóa</a></td>
    </tr>
<?php endforeach ?>
</tbody>
</table>
<script src="../lib/jquery/jquery.min.js" type="text/javascript" charset="utf-8" async defer></script>
<script src="../lib/bootstrap-3.3.7-dist/js/bootstrap.min.js" type="text/javascript" charset="utf-8" async defer></script>
</body>
</html>