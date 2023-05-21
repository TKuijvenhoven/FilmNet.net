<!DOCTYPE html>
    <html>
    <?php
    include_once('defaults/head.php');
    ?>
    <body>
        <div class="container">

            <h4>Admin FIlms</h4>
                <table class="table align-middle">
                  <thead>
                    <tr>
                      <th scope="col">nr</th>
                       <!-- <th scope="col">picture</th> -->
                      <th scope="col">Naam</th>
                      <th scope="col">Category</th>
                      <th scope="col" class="text-center">Aanpassen</th>
                      <th scope="col" class="text-center">Verwijderen</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php $count=1;?>
                  <?php foreach ($products as $product): ?>
                    <tr>
                      <th scope="row"><?=$count++?></th>
                     <!-- <td style="width: 20%" ><img src="/img/<?=$product->picture?>" class="img-thumbnail img-fluid w-25" alt="no picture"></td>
                    --->
                      <td><?=$product->name?></td>
                      <td><?=getCategoryName($product->category_id)?></td>

                      <td class="text-center">
                        <a type="button" class="btn btn-success btn-sm px-3 " href="/admin/edit/<?=$product->id?>">
                            <i class="bi bi-pencil-square"></i>
                        </a>
                      </td>

                        <td class="text-center">
                            <a type="button" class="btn btn-danger btn-sm px-3 " href="/admin/delete/<?=$product->id?>">
                               <i class="bi bi-dash-square"></i>
                            </a>
                        </td>
                    </tr>
                  <?php endforeach;?>

                  </tbody>
                </table>
            <a type="button" class="btn btn-success btn-sm px-3" href="/admin/add" >
                <i class="bi bi-plus-square"></i>
            </a>
            <?php
            include_once('defaults/footer.php');
            ?>
        </div>
    </body>
</html>
