<aside data-css-sidebar="sidebar">
  <form data-js-form="filter">
    <h3>Filter <?php echo ucfirst($type); ?></h3>
    <fieldset style='display:none'>
      <label name='product-category' for="product-category"><input id='product-category' name='product-category' value=<?php echo $cat_id; ?>></label>
    </fieldset>
    <fieldset>
      <label for="product-prices">Prices</label>
      <?php
      $prices = get_terms(array(
        'taxonomy' => 'price',
        'hide_empty' => false,
      ));
      ?>
      <select id="product-price" name="product-price">
        <option>Search by Price</option>
        <?php foreach ($prices as $price) : ?>
          <option value="<?= $price->term_id; ?>"><?= $price->name; ?></option>
        <?php endforeach; ?>
      </select>
    </fieldset>

    <fieldset>
      <label for="product-brand">Brands</label>
       <?php
      $prices = get_terms(array(
        'taxonomy' => 'brands',
        'hide_empty' => false,
      ));
      ?>
      <select id="product-brand" name="product-brand">
        <option>Search by Brand</option>
        <?php foreach ($prices as $price) :
        ?>
          <option value="<?= $price->term_id; ?>"><?= $price->name; ?></option>
        <?php endforeach; ?>
      </select>
    </fieldset>
    <fieldset>
      <label>Colors</label>
      <?php
      $colors = get_terms(array(
        'taxonomy' => 'color',
        'hide_empty' => false,
      ));
      foreach ($colors as $color) :
      ?>
        <div>
          <input type="checkbox" id="<?= $color->slug; ?>" name="product-colors[]" value="<?= $color->term_id; ?>"><label for="<?= $color->slug; ?>"><?= $color->name; ?></label>
        </div>
      <?php endforeach; ?>
    </fieldset>

    <fieldset>
      <button>Filter</button>
      <input type="hidden" name="action" value="filter">
    </fieldset>
  </form>
</aside>