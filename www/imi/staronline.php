<?php
require_once ('header.php');
$aud_id=$DBH->prepare("SELECT aud_id FROM vimi_aud WHERE aud_num='".$_GET['audNum']."'");
    $aud_id->execute();
    $audID=$aud_id->fetch();
if(!(isset($_GET['audNum']))||$audID['aud_id']==0)
{
  header("Location:audChoose.php");
}
if(isset($_POST['aud_num']))
  header("Location:staronline.php?audNum=".$_POST['aud_num']);
?>
      <style>
        .center{  
          text-align: center;
        }
      </style>
	
<div class="container">

        <h2 class="form-signin-heading center">Please sign in :
        <br><br>
        <p class="text-danger">
        <?php 
        if(@$_GET['messege']!="")
            echo "<span class='glyphicon glyphicon-remove'> ".@$_GET['messege']."</span>"; 
        ?>
        </p>
        </h2>
        <br>
        <?php
        $students=$DBH->prepare("SELECT * FROM vimi_user");
        $students->execute();
        ?>
        <form class="center form" action="staronlineprocessor.php" method="POST"> 
        <select name='user_id' class="form-control">
        <option>Выбери себя</option> 
        <?php
        while ($row=$students->fetch())
          { 
            echo "<option value='".$row['user_id']."'>".$row["user_fio"]."</option>"; 
          }
        ?>
        </select> <br>
        <label for="inputPassword" class="sr-only">Password</label>
        <input name="password" class="form-control" type="password" id="inputPassword" placeholder="Password" required>
        <input type="hidden" name="aud_num" value="<?php echo $_GET['audNum']; ?>"><br>
        <button class="btn btn-lg btn-primary" type="submit">Sign in</button>
      </form>

    </div>
<?php require_once ('footer.php');
?>
</body>


</html>
