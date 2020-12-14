
<?php
    if(isset($_GET['search'])){

        $sv = $_GET['search'];

    }
?>
<form action="https://www.google.com/search?query=  <?php echo $sv ?> "  method="get">

    <input type="text" placeholder= "Search google" name= "search" value= "">
    <input type="submit" name="submit">


</form>

