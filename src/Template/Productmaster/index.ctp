<?php

use Cake\Routing\Router
?>
<style> 

    .center{
        text-align: center;
    }
</style>

<form action="" method="post" enctype="multipart/form-data" name="productcategory">
    <h3> Category Master</h3>
    <input type="hidden" name="_csrfToken" value="<?php echo $token;?>">
    <input type="hidden" name="id" value="<?php echo $editlist['id'];?>">
<div class="container">
  
  <table class="table">
      <tr>
          <td>&nbsp;</td>
        <td>Category Name :</td>
        <td><input type="text" name="cat_name" id="category_name" value="<?php echo $editlist['cat_name'];?>"></td>
        <td>&nbsp;</td>
      </tr>
      <tr>
         <td>&nbsp;</td>
        <td>Upload file:</td>
        <td> <input type="file" name="uploadfile" id="uploadfile" value="<?php echo $editlist['img'];?>"></td>
        <td>&nbsp;</td>
      </tr>
      <tr>
          <td>&nbsp;</td>
        <td>Order :</td>
        <td><input type="text" name="sort" id="sort" value="<?php echo $editlist['sort'];?>"></td>
        <td>&nbsp;</td>
      </tr>
      <tr>
          <td>&nbsp;</td>
        <td>Product Type :</td>
        <td><input type="text" name="product_type" id="sort" value="<?php echo $editlist['product_type'];?>"></td>
        <td>&nbsp;</td>
      </tr>
      <tr>
          <td>&nbsp;</td>
        <td>Status :</td>
        <td>
            <select name="status">
                <option <?php echo $editlist['status'] == 1?"Selected":"";?> value="1">Active</option>
                <option <?php echo $editlist['status'] == 0?"Selected":"";?>  value="0">In-Active</option>
              </select>
        </td>
        <td>&nbsp;</td>
      </tr>
      <tr>
          <td>&nbsp;</td>
        <td>Delete :</td>
        <td><select name="dels">
                <option <?php echo $editlist['dels'] == 1?"Selected":"";?> value="1">Yes</option>
                <option <?php echo $editlist['dels'] == 0?"Selected":"";?> value="0">No</option>
              </select>
        </td>
        <td>&nbsp;</td>
      </tr>
      
      <tr>
          <td colspan="4" class="center"><input type="submit" value="Submit" name="submit"></td></tr>
  </table>
</div>

    
</form>

<?php 
if(count($list) > 0){
  
?>

<div class="container">
  
  <table class="table">
    <thead>
      <tr>
          <th>&nbsp;</th>
        <th>Category Name</th>
        <th>Upload file</th>
        <th>Order by</th>
        <th>Product Type</th>
        <th>Status</th>
        <th>Delete</th>
        <th>Edit</th>
      </tr>
    </thead>
    <tbody>
        <?php 
        foreach($list as $key=>$val){
             ?>
        
       <tr>
         <td>&nbsp;</td>
        <td><?php echo $val['cat_name'];?></td>
        <td><?php echo $val['img'];?></td>
        <td><?php echo $val['sort'];?></td>
        <td><?php echo $val['product_type'];?></td>
        <td><?php echo $val['status'];?></td>
        <td><?php echo $val['dels'];?></td>
        
        <td><a href="<?php echo Router::url(['controller' => 'Categorymaster', 'action' => 'index', 'id' => $val['id']]);?>">Edit</a></td>
      
      </tr>
            
            
       <?php   }
        ?>
      
    </tbody>
  </table>
</div>

<?php 
}
?>