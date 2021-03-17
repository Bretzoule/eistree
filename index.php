<?php 
$title = "EISTree - Le spécialiste des plantes.";
$active = "index";
include('includes/header.php');
include('includes/navbar.php');
?>
<div id="page">
    <div id="centerPanel">
        <p id="mainTitle"><b>Adopt a Tree, be happy. &#127811;</b></p>
        <section id="slider">
            <input type="radio" name="slider" id="s1" checked>
            <input type="radio" name="slider" id="s2">
            <input type="radio" name="slider" id="s3">
            <input type="radio" name="slider" id="s4">
            <input type="radio" name="slider" id="s5">
            <label for="s1" id="slide1">
                <div class="addressInLabel"><a href="http://google.fr">link</a></div>
            </label>
            <label for="s2" id="slide2">
                <div class="addressInLabel"><a href="http://google.fr">link</a></div>
            </label>
            <label for="s3" id="slide3">
                <div class="addressInLabel"><a href="http://google.fr">link</a></div>
            </label>
            <label for="s4" id="slide4">
                <div class="addressInLabel"><a href="http://google.fr">link</a></div>
            </label>
            <label for="s5" id="slide5">
                <div class="addressInLabel"><a href="http://google.fr">link</a></div>
            </label>
        </section>
    </div>
</div>

<?php 
include('includes/footer.php');
?>