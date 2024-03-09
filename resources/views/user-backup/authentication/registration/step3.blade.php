<div class="mb-3">
    <label for="address_line_1" class="form-label">Address Line 1</label>
    <input type="text" class="form-control" id="address_line_1" name="address_line_1" required>
</div>
<div class="mb-3">
    <label for="address_line_2" class="form-label">Address Line 2</label>
    <input type="text" class="form-control" id="address_line_2" name="address_line_2">
</div>
<div class="mb-3">
    <label for="country_id" class="form-label">Country Of Residence</label>
    <select class="form-select" id="country_id" name="country_id">
        <option value="">Select Country</option>
        <!-- Populate options dynamically -->
        <option value="1">Bangladesh</option>
    </select>
</div>
<div class="mb-3">
    <label for="city_id" class="form-label">City</label>
    <select class="form-select" id="city_id" name="city_id">
        <option value="">Select City</option>
        <!-- Populate options dynamically -->
        <option value="1">Chittagong</option>
    </select>
</div>
<div class="mb-3">
    <label for="state_id" class="form-label">City</label>
    <select class="form-select" id="state_id" name="state_id">
        <option value="">Select State</option>
        <!-- Populate options dynamically -->
        <option value="1">Chittagong</option>
    </select>
</div>
<div class="mb-3">
    <label for="zip_code" class="form-label">Zip Code</label>
    <input type="text" class="form-control" id="zip_code" name="zip_code">
</div>
<button type="button" class="prev">Previous</button>
<button type="submit">Submit</button>
<!-- Similarly for city_id, state_id, and zip_code -->
