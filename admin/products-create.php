<?php include_once('header.php'); ?>
<?php include('../api/admin/products-create.php'); ?>
<?php include('../api/admin/products-edit.php'); ?>
<?php include('../api/category.php'); ?>
<section>
    <div class="contaner">
        <div class="container">
            <h2>Добавление нового продукта</h2>
            <form action="" class="admin-products-wrapper" method="post" enctype=multipart/form-data>
                <div class="admin-products-edit">
                    <div>

                        <label for="">
                            Название продукта
                            <input type="text" name="title" placeholder="Введите название продукта"
                                   value="<?php echo isset($myrow['title']) ?  $myrow['title'] : '' ?>">
                        </label>
                        <label for="">
                            Вес продукта (<select name="unit" id="unit" >
                                <option <?php if(isset($myrow['unit']) && $myrow['unit'] == 'г') { ?>selected <?php }?>  value="г">
                                    г
                                </option>
                                <option <?php if(isset($myrow['unit']) && $myrow['unit'] == 'шт') { ?>selected <?php }?> value="шт" >
                                    шт
                                </option>
                                <option <?php if(isset($myrow['unit']) && $myrow['unit'] == 'л') { ?>selected <?php }?> value="л" >
                                    л
                                </option>
                                <option <?php if(isset($myrow['unit']) && $myrow['unit'] == 'мл') { ?>selected <?php }?> value="мл" >
                                    мл
                                </option>
                            </select>)
                            <input oninput="number(this)" type="text" name="weight" placeholder="Введите вес продукта"
                                   value="<?php echo isset($myrow['weight']) ?  $myrow['weight'] : '' ?>">

                        </label>
                    </div>
                    <div>
                        <label for="">
                            Цена по акции
                            <input oninput="number(this)" type="text" name="price" placeholder="Введите цену"
                                   value="<?php echo isset($myrow['price']) ?  $myrow['price'] : '' ?>">
                        </label>
                        <label for="">
                            Старая цена
                            <input oninput="number(this)" type="text" name="old_price" placeholder="Введите cтарую цену"
                                   value="<?php echo isset($myrow['old_price']) ?  $myrow['old_price'] : '' ?>">
                        </label>
                    </div>
                    <?php if(isset($error)) : ?>
                        <p style="color: red"><?php echo $error;?></p>
                    <?php endif; ?>
                </div>
                <div class="admin-products-info">
                    <label for="">
                        Изображение продукта
                        <input name="img" type="file">
                    </label>
                    <label for="">
                        Категории
                        <select name="category_id" id="" >
                            <option selected  value="">
                                Выбрать категорию
                            </option>
                            <?php foreach($category as $row){ ?>

                            <option value="<?php echo $row['id']?>" <?php
                            if(isset($myrow['category_id']) && $myrow['category_id'] == $row['id']) { ?>selected <?php }?>>
                                <?php echo $row['name']?>
                            </option>

                            <?php } ?>
                        </select>
                    </label>
                    <input value="Сохранить" type="submit" name="submit">
                </div>
            </form>
        </div>
    </div>
</section>
<?php include_once('footer.php'); ?>
