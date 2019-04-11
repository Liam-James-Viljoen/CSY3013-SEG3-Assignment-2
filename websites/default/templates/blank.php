<Select name="items[sub_category]">
<?php
foreach ($subcategories as $subcategory){ if ($items['sub_category'] == $subcategory['sub_category_name']){ ?>
    <option selected="selected" value="<?=$subcategory['sub_category_name'] ?? ''?>"><?=$subcategory['sub_category_name'] ?? ''?></option>
  <?php } else { ?>
    <option value="<?=$subcategory['sub_category_name'] ?? ''?>"><?=$subcategory['sub_category_name'] ?? ''?></option>
<?php } } ?>
}}
</select>
