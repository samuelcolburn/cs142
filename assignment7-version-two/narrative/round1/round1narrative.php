<!DOCTYPE HTML>
<html lang="en-US">
    <head>
       <title>Web Usability Testing: Final Project</title>
        <meta charset="utf-8">
        <meta name="author" content="William D. Kniffin , Samuel M. Colburn">
        <meta name="description" content="Final Project  usability testing  round 1 for Robert Erickson's Advanced Web Design class.">

        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!--[if lt IE 9]>
        <script src="//html5shim.googlecode.com/sin/trunk/html5.js"></script>
        <![endif]-->

        <link rel="stylesheet" title="main" href="style.css" type="text/css" media="screen">
        <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
        <script src="script.js"></script>

    </head>
    <body>
        <nav>
            <ul>
                <li><a class="nav" href="#intro">Intro</li>
                <li><a class="nav" href="#change1">Change 1</li>
                <li><a class="nav" href="#change2">Change 2</li>
                <li><a class="nav" href="#change3">Change 3</li>
                <li><a class="nav" href="#change4">Change 4</li>
                <li><a class="nav" href="#change5">Change 5</li>
                <li><a class="nav" href="#change6">Change 6</li>
                <li><a class="nav" href="#change7">Change 7</li>
                <li><a class="nav" href="#change8">Change 8</li>
                    
            </ul>
        </nav>
    <main>
        <h1>Final Project: Web Usability Test 1</h1>
        <article>
            <section id='intro'>
                <h2>Documentation</h2>
                <ul>
                    <li><a href ="../assignment7-version-one/home.php">Before</a></li>
                    <li><a href ="../assignment7-version-two/home.php">After</a></li>
                </ul>
                 <p><a href='TestScript.pdf'>Test Script</a></p>

                 <h3>Test Questions</h3>
                 <ol>
                            <li>Register an account on the website.</li>
                            <li>Leave a comment on a pet.</li>
                            <li>Try to adopt one of the animals.</li>
                            <li>Change your profile information.</li>
                            <li>Login as administrator, edit the details of one of the animals.</li>
                            <li>How much does “Simba” weigh?</li>
                            <li>Who are our featured pets?</li>
                            <li>Who are our partners?</li>
                        </ol>
                 <h3>Video Links</h3>
                        <ul>
                            <li><a href="https://www.youtube.com/watch?v=tg8oKfXmGh4">Test 1</a></li>
                            <li><a href="https://www.youtube.com/watch?v=lr69d1PyQME&feature=youtu.be">Test 2</a>(Note, first half of video got corrupted)</li>
                            <li><a href="">Test 3</a></li>
                        </ul>
                    

            </section>
                <section id='change1'>
                    <h3>Fix 1:Change the footer</h3>
                    <p>Some of our test subjects noted how the footer Icon being different was misleading. A simple change was to keep it consistent throughout the website. We also updated the footer styling to make it sticky.</p>
                    <h4>Before</h4>
                    <img src="footerbefore.png" alt = 'footer before'>
                    <h4>After</h4>
                    <img src="footerafter.png" alt = 'footer after'>

                </section>
                <section id='change2'>
                    <h3>Fix 2: Add a notification to the "Adopt Me" email button</h3>
                    <p>All our test subjects knew exactly where to go if they wanted to adopt a pet, and the button was easy to find. However, the information on the button felt cluttered to some, so we moved all of that to the email itself. More importantly however, when the email button is pressed, there was no feedback telling the user that an email had been sent, or anything had happened. They all felt confused by this, so we added a popup that comes up when the email button is clicked to let the user know an email has been sent.</p>
                    <h4>Before</h4>
                    <img src="adoptmebefore.png" alt='adopt me before'>
                    <h4>After</h4>
                    <img src='adoptmeafter1.png' alt='adopt me after popup'>
                    <img src='adoptmeafter2.png' alt='adopt me after notifcation'>
                </section>
                <section id='change3'>
                    <h3>Fix 3: Change Home Page Button</h3>
                    <p>Again, all of our test subjects knew immediately this was a site about adopting pets, which is good. However, while some knew exactly what it was for, they weren't exactly sure where to go actually adopt an animal. There are several links that say "pet" but none that actually say "Adopt". So one  adjustment we made was changing the home page button text from "see the pets" to "Adopt". While a small change, having a button that actually says "Adopt" should improve usability based on our tests.</p>
                    <h4>Before</h4>
                    <img src="homebuttonbefore.png" alt='home page before'>
                    <h4>After</h4>
                    <img src='homebuttonafter.png' alt='home page after'>
                </section>
                 <section id='change4'>
                    <h3>Fix 4: Update Petlist Page Style</h3>
                    <p>Several of our test subjects noted that the pet list page was a notable drop in quality from our home page. The dramatic change was noticeable and off-putting. Additionally, the tiles on the original did not line up properly, making an unpleasant sight for several testers. For this change, we updated the pet list style to be more in line with the rest of the sight, centered the content, and gave each box a fixed width so they tiled properly. We also updated the header information to remove the redundant "pets" header, make the total pets more prominent, and added sorting buttons for cats, dogs, or all.</p>
                    <h4>Before</h4>
                    <img src="petlistbefore.png" alt='pet list page before'>
                    <h4>After</h4>
                    <img src='petlistafter.png' alt='pet list page after'>                    
                 </section>
                 <section id='change5'>
                    <h3>Fix 5: Registration Page and Error List Style</h3>
                    <p>All of our test subjects had issues filling out their profiles with a description. One of the verification functions would not allow punctuation or space characters. By removing it, we avoid this problem. Also on the form page, the error list was not centered over the form, making it harder for some users to see it. Furthermore, the "Invalid Username" error message was not descriptive enough for one of our test subjects, so we updated it to say "You must use only basic characters."  </p>
                    <h4>Before</h4>
                    <img src="formbefore.png" alt='form page before'>
                    <h4>After</h4>
                    <img src='formafter.png' alt='form page after'>                    
                 </section>  
                 <section id='change6'>
                    <h3>Fix 6: Confirmation Page</h3>
                    <p>As was noted by our test subjects confirmation pages are often left with minimal style, however a couple also noted that ours was noticeably drab. Also, when you do register successfully, that notification screen is pretty dull as well. So we added some style there to improve the user feel. </p>
                        <h4>Before</h4>
                        <img src="confirmationbefore.png" alt='confirmation page before'>
                    <h4>After</h4>
                    <img src='confirmationafter.png' alt='confirmation page after'>                    
                 </section>     
                 <section id='change7'>
                    <h3>Fix 7: Comment Order</h3>
                    <p>One of our testers noted that on almost sites he visits these days, comments are posted in order of newest -> oldest, and ours were oldest -> newest. Fix ours is a small change, but one that makes a big difference as comments being to stack up.</p>
                    <h4>Before</h4>
                    <img src="commentsbefore.png" alt='comments section before'>
                    <h4>After</h4>
                    <img src='commentsafter.png' alt='comments section after'>                    
                 </section>
                                 <section id='change8'>
                    <h3>Fix 8: Account Page</h3>
                    
                    <p>One of the most comprehensive changes we had to make was a total overhaul of our account page. Almost every user was worried that their password was displayed in plaintext. Every user we tested felt that with the hover effects and the pointer change in the table, that they should be able to click on it to make changes. They also had trouble finding the Edit & Delete buttons, and noted that the headers were way off to the side, making them hard to find.</p>
                    <p>To address all these issues, we completely restructured the account page. We removed the password and permission level fields from the page entirely. We got rid of the table format completely and moved to section style format. We also removed the highlighting from their information, and made the Edit button more prominent to make it easy to know where to go to change your profile information. </p>
                    <h4>Before</h4>
                    <img src="profilebefore.png" alt='user profile page before'>
                    <h4>After</h4>
                    <img src='profileafter.png' alt='user profile page after'>                    
                 </section>   
        </article>
        </main>
    </body>
</html>
