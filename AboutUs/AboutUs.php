<?php
session_name('loggedIn');
session_start();
?>

<!doctype html>
<html>
<head>
    <title>About Us</title>
    <link rel="stylesheet" href="../style.css">
</head>
<body>
<?php include("../HeaderAndFooter/header.php"); ?>
<article>
    <main>
        <div class="label2">
            <h4>Welcome</h4>
        </div>
        <div class="aboutUs">
            Welcome to Online Car Rental
            That wonderful feeling – you start the engine and your adventure begins…
            At our cars Rental everything we do is about giving you the freedom to discover more. We’ll move mountains
            to find you the right rental car, and bring you a smooth, hassle-free experience from start to finish. Here
            you can find out more about how we work.
        </div>
        <div class="label2">
            <h4>What we're about</h4>
        </div>
        <div class="aboutUs">
            We want to make renting a car as simple and personal as driving your own.
            Renting a car brings you freedom, and we’ll help you find the right car for you at a great price. But
            there’s much more to us than that. We're here to make renting a car a lot less hassle.
        </div>
        <div class="label2">
            <h4>Ramallah – The City of Culture</h4>
        </div>
        <div class="aboutUs">
            Ramallah was once a small rural town and a summer destination where many Palestinians enjoyed the pleasant
            Mediterranean climate and picturesque location in the highlands. Today, Ramallah’s old architecture can
            still be seen in some places, often hidden among the new, tall buildings. Ramallah has grown into an
            extensive modern city – a place that has a lot to offer in terms of cultural activities, restaurants, and
            nightlife. Check also Sites and Attractions of Ramallah.
        </div>
    </main>
</article>


<?php include '../HeaderAndFooter/footer.html'; ?>

</body>

</html>
