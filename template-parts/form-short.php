<form action="https://drivenlocal.wufoo.com/forms/sazawmo0mlqng8/#public" method="POST" validate>
  <div class="form-row">
    <div class="form-col">
      <div class="form-group">
        <label>First Name*</label>
        <input name="Field1" type="text" class="form-control input-sm" required>
      </div>
    </div>
    <div class="form-col">
      <div class="form-group">
        <label>Last Name*</label>
        <input name="Field2" type="text" class="form-control input-sm" required>
      </div>
    </div>
  </div>
  <div class="form-row">
    <div class="form-col">
      <div class="form-group">
        <label>Email Address*</label>
        <input name="Field3" type="email" class="form-control input-sm" required>
      </div>
    </div>
    <div class="form-col">
      <div class="form-group">
        <label>Phone Number</label>
        <input name="Field4" type="tel" class="form-control input-sm">
      </div>
    </div>
  </div>
  <div class="form-group">
    <label>Best Way to Reach You</label>
    <select name="Field5" class="form-control">
      <option value="No Selection">--Select One--</option>
      <option value="Phone Call">Phone Call</option>
      <option value="Email Response">Email Response</option>
    </select>
  </div>
  <div class="form-group">
    <label>Questions/Comments</label>
    <textarea name="Field6" rows="3" class="form-control input-sm"></textarea>
  </div>
  <button name="saveForm" type="submit" class="btn btn-primary btn-block">
    <?php if (is_page(31)) {
      echo 'Submit';
    } else {
      echo 'Request More Information';
    } ?>
  </button>
  <div class="hide">
    <label for="comment">Do Not Fill This Out</label>
    <textarea name="comment" id="comment" rows="1" cols="1"></textarea>
    <input type="hidden" id="idstamp" name="idstamp" value="4i3ULOwpvUws5Li9guLqlC6EC13ykXHcghmfIrMQXGU=" />
  </div>
</form>