<?php require_once('header.php'); ?> 
<div class="get-started">
<h3> Tell us about yourself </h3>
<form role="form" method="post" action="reg.php">
 <div class="form-group">
    <label for="exampleInputEmail1">Your Name</label>
    <input type="text" name="user" class="form-control" id="username" placeholder="Enter your name">
  </div>
 <div class="form-group">
  <label> Language you understand </label>
  <select class="form-control" name="lang1">
  <option value="">Select one</option>
  <option value="english">English</option>
  <option value="french">French</option>
  <option value="spanish">Spanish</option>
  <option value="german">German</option>
  <option value="mandarin">Mandarin</option>
  </select>
 </div>
 <div class="form-group">
  <label> Language you want to learn </label>
  <select class="form-control" name="lang2">
  <option value="">Select one</option>
  <option value="english">English</option>
  <option value="french">French</option>
  <option value="spanish">Spanish</option>
  <option value="german">German</option>
  <option value="mandarin">Mandarin</option>
  </select>
 </div>
<button type="submit" class="btn btn-primary">Submit</button>
</form>
</div>

<?php require_once('footer.php'); ?> 


