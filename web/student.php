<?php 
require_once "web/header.php"; 

?>
<div class="container">
    <div class="m-2 ">
        <a class="btn btn-info" href="index.php?action=student-add">Add Student</a>
    </div>
    <table class="table">
        <tr>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Email</th>
            <th>Action</th>
        </tr>
        <?php
            if(!empty($result)){
                foreach($result as $k=>$v){
                    // echo "<pre>";
                    // print_r($result);
                    ?>
                    <tr>
                        <td><?php echo $result[$k]['fname'];?></td>
                        <td><?php echo $result[$k]['lname'];?></td>
                        <td><?php echo $result[$k]['email'];?></td>
                        <td>
                            <a href="index.php?action=student-edit&id=<?php echo $result[$k]['id'];?>">Edit</a>
                            <a href="index.php?action=student-delete&id=<?php echo $result[$k]['id'];?>">Delete</a>
                        </td>
                    </tr>
                    <?php
                }
            }
        ?>
    </table>
</div>