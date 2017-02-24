<form>
  <div class="form-row">
    <div class="form-col">
      <div class="form-group">
        <label>First Name*</label>
        <input type="text" class="form-control input-sm" required>
      </div>
    </div>
    <div class="form-col">
      <div class="form-group">
        <label>Last Name*</label>
        <input type="text" class="form-control input-sm" required>
      </div>
    </div>
  </div>
  <div class="form-row">
    <div class="form-col">
      <div class="form-group">
        <label>Email Address*</label>
        <input type="email" class="form-control input-sm" required>
      </div>
    </div>
    <div class="form-col">
      <div class="form-group">
        <label>Phone Number</label>
        <input type="email" class="form-control input-sm">
      </div>
    </div>
  </div>
  <div class="form-group">
    <label for="">Best Way to Reach You</label>
    <select name="" id="" class="form-control">
      <option value="">--Select One--</option>
      <option value="">Phone Call</option>
      <option value="">Email Response</option>
    </select>
  </div>
  <div class="form-group">
    <label>Questions/Comments</label>
    <textarea rows="3" class="form-control input-sm"></textarea>
  </div>
  <button type="submit" class="btn btn-primary btn-block">
    <?php if (is_page(31)) {
      echo 'Submit';
    } else {
      echo 'Request More Information';
    } ?>
  </button>
</form>