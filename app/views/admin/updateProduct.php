<?php $product = $data["product"];?>
<form action="http://localhost/examfinal/admin/execute" method="POST">
        <input type="hidden" name="id" value='<?php echo ($product)  ? $product->id : "" ?>' >
        <input type="text" name="content" value='<?php echo ($product)  ? $product->name : "" ?>' placeholder="Content">
        <input type="text" name="oldPrice" value='<?php echo ($product)  ? $product->oldPrice : "" ?>' placeholder="Old price">
        <input type="text" name="newPrice" value='<?php echo ($product)  ? $product->newPrice : "" ?>' placeholder="New price">
        <input type="text" name="img1" value='<?php echo ($product)  ? $product->img : "" ?>' placeholder="link" >
        <input type="text" name="img2" value='<?php echo ($product)  ? $product->img : "" ?>' placeholder="link" >
        <select id="country" name="category">
            <option value="cake">Cake</option>
            <option value="pastries">Pastries</option>
            <option value="cookies">Cookies</option>
            <option value="pies">Pies</option>
        </select>
        <select id="country" name="status">
            <option value="newest">Newest</option>
            <option value="oldest">Oldest</option>
        </select>
        <input type="submit" name="submit" value="submit">
</form>
<div class="table__title">
    <div class="table__title-content">Product</div>
    

    <button class="table__button">CREATE</button>
    
</div>
<table >
        <tr>
            <th>Id</th>
            <th>Content</th>
            <th>Category</th>
            <th>New Price</th>
            <th>Old Price</th>
            <th>Img 1</th>
            <th>Img 2</th>
            <th>Status</th>
            <th>Action</th>
        </tr>
        
        <?php 
        
        $listProduct = $data["listProduct"]; ?>
        <?php foreach ($listProduct as $key => $value) : ?>
            <tr>
                <td><?php echo $value->id ?></td>
                <td><?php echo $value->content ?></td>
                <td><?php echo $value->category ?></td>
                <td><?php echo $value->newPrice ?></td>
                <td><?php echo $value->oldPrice ?></td>
                
                <td><img src="<?php echo $value->img1?>" style="width: 80px; height: 80px" alt=""></td>
                <td><img src="<?php echo $value->img2?>" style="width: 80px; height: 80px" alt=""></td>
                <td><?php echo $value->status ?></td>
                <td>
                    <a class="control__button" href="http://localhost/examfinal/admin/execute/<?php echo $value->id ?>">Edit</a> 
                    
                    <a class="control__button delete" href="http://localhost/examfinal/admin/delete/<?php echo $value->id ?>"> Delete</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
<div class="table__pagination">
    <div class="table__pagination-content">Showing 1 of <?php echo $data["numberOfPage"];?> page</div>
    
    <div class="table__pagination-icon">
    <a class="pagination__icon" href="?page-nr=<?php echo $data["numberOfPage"]?>"><i class="fa-solid fa-backward"></i></a>
    <div>1</div>
    <a class="pagination__icon" href="?page-nr=<?php echo $data["numberOfPage"]?>"><i class="fa-solid fa-forward"></i></a>
    
    </div>
</div>