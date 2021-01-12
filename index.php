<?php
    require "header.php";
?>

<div class="wrapper">

<h1>Welcome to Gondor</h1>

<?php
if ( isset($_SESSION['userId']) ) {
    echo "<p>You are logged in</p>";
}
else {
    echo "<p>You are logged out</p>";
}

?>

<br>
<p>Here we keep track of our games.</p>

</div>

<?php
    require "footer.php";
?>