<?php
include "top.php";
?>
<article id="main">
    <section id="home-intro">
        <h2>All a pet wants is a home and love,</h2>
        <h2>be their savior by adopting</h2>
        <a id="pets-button" href="petlist.php"><h3>See the pets</h3></a>
        <ul>
            <li><a href="https://www.twitter.com" target="_blank"><img class="social" src="https://wkniffin.w3.uvm.edu/cs142/assignment5/after/assets/twitter.png" alt="twitter"></a></li>
            <li><a href="https://www.facebook.com" target="_blank"><img class="social" src="https://wkniffin.w3.uvm.edu/cs142/assignment5/after/assets/facebook.png" alt="facebook"></a></li>
            <li><a href="https://www.youtube.com" target="_blank"><img class="social" src="https://wkniffin.w3.uvm.edu/cs142/assignment5/after/assets/youtube.png" alt="youtube"></a></li>
        </ul>
        <img id="pet-pic" src="pics/intro-bground.jpg">
    </section>

    <section id="home-mission">
        <h2>Our mission is simple: give pets a home</h2>
        <article id="mission-split">
            <div class="mission-slide">
                <h3>Our Pets</h3>
                <section class="mission-fact">
                    <img  class="mission-img" src="pics/fact-cat1.jpg" alt="cat">
                    <div class="mission-fact-text">
                        <h4>Healthy Animals</h4>
                        <p>All our animals are verified to be healthy as they can be. Some pets have tragically acquired health problems because of their past, but they just need your help.</p>
                    </div>
                </section>
                <section class="mission-fact">
                    <img  class="mission-img" src="pics/fact-cat2.jpg" alt="dog">
                    <div class="mission-fact-text">
                        <h4>Different Ages</h4>
                        <p>The pets we recieve are all different ages. From puppies with energy to older dogs who just need a companion to rest; you will find the right pet for you here.</p>
                    </div>
                </section>
                <section class="mission-fact">
                    <img  class="mission-img" src="pics/fact-cat3.jpg" alt="cat">
                    <div class="mission-fact-text">
                        <h4>Breeds</h4>
                        <p>We have some pets who have been verified as purebred animals. We also have many animals who cannot be identified but still need loving parents.</p>
                    </div>
                </section>
            </div>

            <div class="mission-slide">
                <h3>What You Do</h3>
                <section class="mission-fact">
                    <img  class="mission-img" src="pics/fact-cat4.png" alt="cat">
                    <div class="mission-fact-text">
                        <h4>Give a Home</h4>
                        <p>All the animals we have just need a home with love parents to take care of them. It is a rewarding experience for the owner and the pet.</p>
                    </div>
                </section>
                <section class="mission-fact">
                    <img  class="mission-img" src="pics/fact-cat5.png" alt="dog">
                    <div class="mission-fact-text">
                        <h4>Save a Life</h4>
                        <p>Many of these animals need a home to survive. Animals do not live long in shelters; they need love like the rest of us.</p>
                    </div>
                </section>
                <section class="mission-fact">
                    <img  class="mission-img" src="pics/fact-cat6.jpg" alt="dog">
                    <div class="mission-fact-text">
                        <h4>Community</h4>
                        <p>When you adopt a pet through us you become part of a large community of other animal lovers who love to share stories and achievements of their pets.</p>
                    </div>
                </section>
            </div>
        </article>
    </section>

    <section id="featured-pets">
        <h2>Featured pets</h2>
        <article>
            <a href="https://wkniffin.w3.uvm.edu/cs142/assignment7/pet.php?id=16">
                <div>
                    <img src="pics/featured-cat.jpg" alt="cat">
                    <h3>Sally</h3>
                    <p>Sally, aka Sally-Steel, is a beatiful cat who is one of the best companions you will ever meet.</p>
                </div>
            </a>
            <a href="https://wkniffin.w3.uvm.edu/cs142/assignment7/pet.php?id=2">
                <div>
                    <img src="pics/featured-dog.jpg" alt="dog">
                    <h3>Bobby</h3>
                    <p>Bobby is still a puppy but he is extremely loving and loyal.</p>
                </div>
            </a>
        </article>
    </section>

    <section id="partners">
        <h2>Our partners</h2>
        <article>
            <div>
                <a href="" target="_blank"><img src="pics/aspca.jpeg"></a>
                <a href="" target="_blank"><img src="pics/peta.png"></a>
            </div>
            <div>
                <a href="" target="_blank"><img src="pics/akc.jpg"></a>
                <a href="" target="_blank"><img src="pics/humane.jpg"></a>
            </div>
        </article>
    </section>
</article>
<?php include "footer.php"; ?>
</body>
</html>