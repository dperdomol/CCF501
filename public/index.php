<?php require_once("../private/initialize.php"); ?>

<?php

if(isset($_GET["id"])){
    $subject_id = $_GET["id"];
    $subject = find_subject_by_id($subject_id, ["visible" => true]);

    if(!$subject){
        redirect_to(url_for("/index.php"));
    }
} else {
    //Nothing selected yet, show homepage
}

include(SHARED_PATH . "/public_header.php");
include(SHARED_PATH . "/public_navigation.php");

?>


<div id="main">
    <?php
        if(isset($subject)){
            $allowed_tags = "<div><img><h1><h2><h3><h4><h5><p><br><ul><li><strong>";
            ?>

            <div class="container pt-5">
                <div id="page" class="d-flex justify-content-between">
                <?php
                //Show product related to the subject
                $products = find_product_by_subject_id($subject_id);
                while($product = mysqli_fetch_assoc($products)){
                    if(!$product["visible"]){ continue;}
                ?>
            
                    <div class="card" style="width: 18rem;">
                        <img src="images/placeholder.png" class="card-img-top" alt="...">
                        <div class="card-body">
                <?php
                            echo "<h5 class='card-title'>" . strip_tags($product['menu_name'], $allowed_tags) . "</h5>";
                            echo "<p class='card-text'>" . strip_tags($product['content'], $allowed_tags) . "</p>";
                ?>
                            <a href="<?php echo url_for('details.php?id=' . h(u($product["id"]))); ?>" class="btn btn-primary">View</a>
                        </div>
                    </div>
                
                <?php
                } //While Closed
                mysqli_free_result($products);
                ?>
                </div>
            </div>
        <?php
        } else {
            //Show the homepage
            include(SHARED_PATH . "/homepage.php");
        }
    ?>
</div>


<?php include_once(SHARED_PATH . "/public_footer.php"); ?>