<?php
require "server.php";
if (isset($_POST['query'])) {
  $search = $_POST['query'];
}else{
  $search = false;
}
if (isset($_POST['adviser1'])) {
  $adviser1 = $_POST['adviser1'];
}else{
  $adviser1 = false;
}
if (isset($_POST['adviser2'])) {
  $adviser2 = $_POST['adviser2'];
}else{
  $adviser2 = false;
}
if (isset($_POST['adviser3'])) {
  $adviser3 = $_POST['adviser3'];
}else{
  $adviser3 = false;
}
if (isset($_POST['adviser4'])) {
  $adviser4 = $_POST['adviser4'];
}else{
  $adviser4 = false;
}
if (isset($_POST['adviser5'])) {
  $adviser5 = $_POST['adviser5'];
}else{
  $adviser5 = false;
}
if (isset($_POST['year1'])) {
  $year1 = $_POST['year1'];
}else{
  $year1 = false;
}
if (isset($_POST['year2'])) {
  $year2 = $_POST['year2'];
}else{
  $year2 = false;
}
if (isset($_POST['year3'])) {
  $year3 = $_POST['year3'];
}else{
  $year3 = false;
}
if (isset($_POST['year4'])) {
  $year4 = $_POST['year4'];
}else{
  $year4 = false;
}
if (isset($_POST['year5'])) {
  $year5 = $_POST['year5'];
}else{
  $year5 = false;
}
if (isset($_POST['course1'])) {
  $course1 = $_POST['course1'];
}else{
  $course1 = false;
}
if (isset($_POST['course2'])) {
  $course2 = $_POST['course2'];
}else{
  $course2 = false;
}
if (isset($_POST['course3'])) {
  $course3 = $_POST['course3'];
}else{
  $course3 = false;
}
if ($search != false && $adviser1 == false && $adviser2 == false && $adviser3 == false && $adviser4 == false && $adviser5 == false &&
$year1 == false && $year2 == false && $year3 == false && $year4 == false && $year5 == false && $course1 == false && $course2 == false && $course3 == false) {
    $sql_year = "SELECT Year, COUNT(*) as 'Count'
    FROM researchstudy_table
    WHERE (Title LIKE '%$search%' OR Keywords LIKE '%$search%' OR Abstract LIKE '%$search%')
    GROUP BY Year
    ORDER BY Year DESC LIMIT 5";
}

elseif($search != false || 
  ($course1 != false || $course2 != false || $course3 != false) && 
  ($adviser1 != false || $adviser2 != false || $adviser3 != false || $adviser4 != false || $adviser5 != false) &&
  ($year1 != false || $year2 != false || $year3 != false || $year4 != false || $year5 != false)){
  $sql_year = "SELECT Year, COUNT(*) as 'Count' 
  FROM researchstudy_table
  WHERE (Title LIKE '%$search%' OR Keywords LIKE '%$search%' OR Abstract LIKE '%$search%')
  AND (Course = '$course1' OR Course = '$course2' OR Course = '$course3') 
  AND (Adviser = '$adviser1' OR Adviser = '$adviser2' OR Adviser = '$adviser3' OR Adviser = '$adviser4' OR Adviser = '$adviser5')
  AND (Year = '$year1' OR Year = '$year2' OR Year = '$year3' OR Year = '$year4' OR Year = '$year5')
  GROUP BY Year
  ORDER BY 2 DESC LIMIT 5";
}

elseif($search != false || 
  ($adviser1 != false || $adviser2 != false || $adviser3 != false || $adviser4 != false || $adviser5 != false) && 
  ($year1 != false || $year2 != false || $year3 != false || $year4 != false || $year5 != false)){
  $sql_year = "SELECT Year, COUNT(*) as 'Count' 
  FROM researchstudy_table
  WHERE (Title LIKE '%$search%' OR Keywords LIKE '%$search%' OR Abstract LIKE '%$search%')
  AND (Adviser = '$adviser1' OR Adviser = '$adviser2' OR Adviser = '$adviser3' OR Adviser = '$adviser4' OR Adviser = '$adviser5')
  AND (Year = '$year1' OR Year = '$year2' OR Year = '$year3' OR Year = '$year4' OR Year = '$year5')
  GROUP BY Year
  ORDER BY 2 DESC LIMIT 5";
}

elseif($search != false || 
  ($course1 != false || $course2 != false || $course3 != false) && 
  ($year1 != false || $year2 != false || $year3 != false || $year4 != false || $year5 != false)){
  $sql_year = "SELECT Year, COUNT(*) as 'Count' 
  FROM researchstudy_table
  WHERE (Title LIKE '%$search%' OR Keywords LIKE '%$search%' OR Abstract LIKE '%$search%')
  AND (Course = '$course1' OR Course = '$course2' OR Course = '$course3') 
  AND (Year = '$year1' OR Year = '$year2' OR Year = '$year3' OR Year = '$year4' OR Year = '$year5')
  GROUP BY Year
  ORDER BY 2 DESC LIMIT 5";
}

elseif($search != false || 
  ($course1 != false || $course2 != false || $course3 != false) && 
  ($adviser1 != false || $adviser2 != false || $adviser3 != false || $adviser4 != false || $adviser5 != false)){
  $sql_year = "SELECT Year, COUNT(*) as 'Count' 
  FROM researchstudy_table
  WHERE (Title LIKE '%$search%' OR Keywords LIKE '%$search%' OR Abstract LIKE '%$search%')
  AND (Course = '$course1' OR Course = '$course2' OR Course = '$course3') 
  AND (Adviser = '$adviser1' OR Adviser = '$adviser2' OR Adviser = '$adviser3' OR Adviser = '$adviser4' OR Adviser = '$adviser5')
  GROUP BY Year
  ORDER BY 2 DESC LIMIT 5";
}

elseif ($search != false ||
  ($adviser1 != false || $adviser2 != false || $adviser3 != false || $adviser4 != false || $adviser5 != false)) {
  $sql_year = "SELECT Year, COUNT(*) as 'Count'
  FROM researchstudy_table
  WHERE (Title LIKE '%$search%' OR Keywords LIKE '%$search%' OR Abstract LIKE '%$search%')
  AND (Adviser = '$adviser1' OR Adviser = '$adviser2' OR Adviser = '$adviser3' OR Adviser = '$adviser4' OR Adviser = '$adviser5')
  GROUP BY Year
  ORDER BY Year DESC LIMIT 5";
}

elseif ($search != false ||
  ($course1 != false || $course2 != false || $course3 != false)) {
  $sql_year = "SELECT Year, COUNT(*) as 'Count'
  FROM researchstudy_table
  WHERE (Title LIKE '%$search%' OR Keywords LIKE '%$search%' OR Abstract LIKE '%$search%')
  AND (Course = '$course1' OR Course = '$course2' OR Course = '$course3')
  GROUP BY Year
  ORDER BY Year DESC LIMIT 5";
}

else{
  $sql_year = "SELECT Year, COUNT(*) as 'Count' 
  FROM researchstudy_table
  GROUP BY Year
  ORDER BY Year DESC LIMIT 5";
}
$year_result = mysqli_query($conn, $sql_year);
?>
<div id="yearCheckbox">
                    <hr>

                    <label class="mt-4">YEAR</label>
                    <br>
                    <?php if (mysqli_num_rows($year_result) > 0): ?>
                        <?php $year = array(); $year_count = array();?>
                        <?php $x = 0; $count = 0;?>
                        <?php while($row_year = mysqli_fetch_array($year_result)) { ?>
                            <?php $year[$x] = $row_year['Year']; $year_count[$count] = $row_year['Count']; $count++; $x++; ?>
                        <?php } ?>

                    <br>
                    <?php if ($count >= 1): ?>
                      <input onclick="researchFilter('year')" type="checkbox" name="filter_checkbox_year1" id="filter_checkbox_year1" value="<?php echo $year[0] ?>">
                      <label for="filter_checkbox_year1" id="filter_label_year1"><?php echo $year[0]; ?>&nbsp;(<?php echo $year_count[0]; ?>)</label>
                    <?php endif ?>
                    <?php if ($count >= 2): ?>
                    <br>
                      <input onclick="researchFilter('year')" type="checkbox" name="filter_checkbox_year2" id="filter_checkbox_year2" value="<?php echo $year[1] ?>">
                      <label for="filter_checkbox_year2" id="filter_label_year2"><?php echo $year[1]; ?>&nbsp;(<?php echo $year_count[1]; ?>)</label>
                        
                    <?php endif ?>
                    
                    <?php if ($count >= 3): ?>
                    <br>
                      <input onclick="researchFilter('year')" type="checkbox" name="filter_checkbox_year3" id="filter_checkbox_year3" value="<?php echo $year[2] ?>">
                      <label for="filter_checkbox_year3" id="filter_label_year3"><?php echo $year[2]; ?>&nbsp;(<?php echo $year_count[2]; ?>)</label>
                        
                    <?php endif ?>

                    <?php if ($count >= 4): ?>
                    <div id="more_year" class="more_filter">
                      <input onclick="researchFilter('year')" type="checkbox" name="filter_checkbox_year4" id="filter_checkbox_year4" class="mb-3" value="<?php echo $year[3] ?>">
                      <label for="filter_checkbox_year4" id="filter_label_year4" class="mb-3"><?php echo $year[3]; ?>&nbsp;(<?php echo $year_count[3]; ?>)</label>
                      
                      <?php if ($count >= 5): ?>
                      <br>
                      <input onclick="researchFilter('year')" type="checkbox" name="filter_checkbox_year5" id="filter_checkbox_year5" value="<?php echo $year[4] ?>">
                      <label for="filter_checkbox_year4" id="filter_label_year5"><?php echo $year[4]; ?>&nbsp;(<?php echo $year_count[4]; ?>)</label>
                      <br>
                      <?php endif ?>
                    </div>
                        
                    <?php endif ?>
                    <?php endif ?>
                                    
                    <?php if ($count >= 4): ?>
                        
                    <button type="button" class="btn btn-outline-primary" id="year_btn" onclick="seeFilter('year_btn', 'more_year')">See more</button>
                    <?php endif ?>
                    <br>
                  </div>