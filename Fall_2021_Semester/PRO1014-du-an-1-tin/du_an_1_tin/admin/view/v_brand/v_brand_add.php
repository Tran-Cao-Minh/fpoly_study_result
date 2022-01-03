<section class="interaction-form">
  <form>
    <?php
      if (isset($_GET['brand_name'])) {
        $brand_name = $_GET['brand_name'];

      } else {
        $brand_name = '';
      }
    ?>
    <div class="interaction-form__title--add">
      Thêm thương hiệu
    </div>
    <div class="interaction-form__form-group">
      <label for="brand_name" class="interaction-form__form-title">
        Tên thương hiệu
      </label>
      <input type="text" id="brand_name" class="interaction-form__input" 
        required
        maxlength="32"
        name="brand_name"
        value="<?php echo $brand_name; ?>"
      >
      <div class="interaction-form__notification">
        <!-- Some test case ~ -->
      </div>
    </div>
    <div class="interaction-form__action-group">
      <button type="submit" name="insert_confirm" value="true" class="interaction-form__submit-btn--add">
        Xác nhận thêm
      </button>
      <a href="?view_name=overview" class="interaction-form__return-link">
        Quay lại
      </a>
    </div>
  </form>
</section>

<section class="notification">
  <span class="notification__title">Thông báo: </span>
  <span class="notification__content">
    <?php echo $notification; ?>
  </span>
</section>