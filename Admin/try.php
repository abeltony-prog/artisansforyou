<form class="" action="" method="post">
  <select class="form-control" name="state" id="state">
      <option  value="">Select State</option>
      <option  value="Abia">Abia</option>
      <option  value="Adamawa">Adamawa</option>
      <option  value="Akwa">Akwa</option>
      <option  value="Anambra">Anambra</option>
      <option  value="Bauchi">Bauchi</option>
      <option  value="Bayelsa">Bayelsa</option>
      <option  value="Benue">Benue</option>
      <option  value="Borno">Borno</option>
      <option  value="Cross">Cross</option>
      <option  value=Delta"">Delta</option>
      <option  value="Ebonyi">Ebonyi</option>
      <option  value="Edo">Edo</option>
      <option  value="Ekiti">Ekiti</option>
      <option  value="Enugu">Enugu</option>
      <option  value="Federal Capital Territory">Federal Capital Territory</option>
      <option  value="Gombe">Gombe</option>
      <option  value="Imo">Imo</option>
      <option  value="Jigawa">Jigawa</option>
      <option  value="Kaduna">Kaduna</option>
      <option  value="Kano">Kano</option>
      <option  value="Katsina">Katsina</option>
      <option  value="Kebbi">Kebbi</option>
      <option  value="Kogi">Kogi</option>
      <option  value="Kwara">Kwara</option>
      <option  value="Lagos">Lagos</option>
      <option  value="Nasarawa">Nasarawa</option>
      <option  value="Niger">Niger</option>
      <option  value="Ogun">Ogun</option>
      <option  value="Ondo">Ondo</option>
      <option  value="Osun">Osun</option>
      <option  value="Oyo">Oyo</option>
      <option  value="Plateau">Plateau</option>
      <option  value="Rivers">Rivers</option>
      <option  value="Sokoto">Sokoto</option>
      <option  value="Taraba">Taraba</option>
      <option  value="Yobe">Yobe</option>
      <option  value="Zamfara">Zamfara</option>
  </select>
<input type="text" name="city" value="">
<input type="submit" name="add" value="add">
</form>
<?php
include('DB.php');
  if (isset($_POST['add'])) {
    $state = $_POST['state'];
    $city = $_POST['city'];
    DB::query('INSERT INTO cities VALUES(\'\',:state,:city)', array(':state'=>$state,':city'=>$city));
  }
 ?>
