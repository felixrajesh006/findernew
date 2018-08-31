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
    <input type="text" name="_csrfToken" value="<?php echo $token;?>">
<div class="container">
  
  <table class="table">
      <tr>
          <td>&nbsp;</td>
        <td>Category Name :</td>
        <td><input type="text" name="category_name" id="category_name"></td>
        <td>&nbsp;</td>
      </tr>
      <tr>
         <td>&nbsp;</td>
        <td>Upload file:</td>
        <td> <input type="file" name="uploadfile" id="uploadfile"></td>
        <td>&nbsp;</td>
      </tr>
      <tr>
          <td>&nbsp;</td>
        <td>Order :</td>
        <td><input type="text" name="sort" id="sort"></td>
        <td>&nbsp;</td>
      </tr>
      <tr>
          <td>&nbsp;</td>
        <td>Status :</td>
        <td>
            <select name="status">
                <option value="1">Active</option>
                <option value="0">In-Active</option>
              </select>
        </td>
        <td>&nbsp;</td>
      </tr>
      <tr>
          <td>&nbsp;</td>
        <td>Delete :</td>
        <td><select name="delete">
                <option value="1">Yes</option>
                <option value="0">No</option>
              </select>
        </td>
        <td>&nbsp;</td>
      </tr>
      
      <tr>
          <td colspan="4" class="center"><input type="submit" value="Submit" name="submit"></td></tr>
  </table>
</div>

    
</form>


<div class="container">
  
  <table class="table">
    <thead>
      <tr>
        <th>Category Name</th>
        <th>Upload file</th>
        <th>Order by</th>
        <th>Status</th>
        <th>Order by</th>
        <th>Delete</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>John</td>
        <td>Doe</td>
        <td>Doe</td>
        <td>Doe</td>
        <td>Doe</td>
        <td>john@example.com</td>
      </tr>
      <tr>
        <td>Mary</td>
        <td>Moe</td>
        <td>Moe</td>
        <td>Moe</td>
        <td>Moe</td>
        <td>mary@example.com</td>
      </tr>
      <tr>
        <td>July</td>
        <td>Dooley</td>
        <td>Dooley</td>
        <td>Dooley</td>
        <td>Dooley</td>
        <td>july@example.com</td>
      </tr>
    </tbody>
  </table>
</div>