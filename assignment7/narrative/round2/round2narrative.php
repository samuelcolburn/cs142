<!DOCTYPE HTML>
<html lang="en-US">
    <head>
       <title>Web Usability Testing: Final Project</title>
        <meta charset="utf-8">
        <meta name="author" content="William D. Kniffin , Samuel M. Colburn">
        <meta name="description" content="Final Project  usability testing  round 2 for Robert Erickson's Advanced Web Design class.">

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
            </ul>
        </nav>
    <main>
        <h1>Final Project: Web Usability Test 2</h1>
        <article>
            <section id='intro'>
                <h2>Documentation</h2>
                <ul>
                    <li><a href ="../assignment7-version-three/home.php">Before</a></li>
                    <li><a href ="../assignment7/home.php">After</a></li>
                </ul>
                 <p><a href='TestScript.pdf'>Test Script</a></p>

                 <h3>Test Questions</h3>
                 <ol>
                            <li>Register an account on the website.</li>
                            <li>Make changes to your account.</li>
                            <li>Show me all of our cats.</li>
                            <li>Please pick a pet and adopt it.</li>
                            <li>Login as administrator, edit the details of one of the animals.</li>
                            <li>Please add a pet species.</li>
                            <li>Where are we located?</li>
                        </ol>
                 <h3>Video Links</h3>
                        <ul>
                            <li><a href="https://www.youtube.com/watch?v=vddzryApTio">Test 1</a></li>
                            <li><a href="https://www.youtube.com/watch?v=FCRSmJbp-ug">Test 2</a></li>
                            <li><a href="https://www.youtube.com/watch?v=4Fm-V5-MX6M">Test 3</a></li>
                        </ul>
                    

            </section>
                <section id='change1'>
                    <h3>Fix 1: Style the admin page.</h3>
                    <p>The admin page needed a style overhaul to match the professionalism of the rest of the site and to make it more usable. </p>
                    <h4>Before</h4>
                    <img src="admin-before.jpg" alt = 'admin before'>
                    <h4>After</h4>
                    <img src="amdin-after.jpg" alt = 'admin after'>

                </section>
                <section id='change2'>
                    <h3>Fix 2: add contact info</h3>
                    <p>Users were unsure about how to contact the shelter. To resolve this, we added the contact information to the footer so that it could be accessed on any page at any time.</p>
                    <h4>Before</h4>
                    <img src="footer-before.jpg" alt='footer before'>
                    <h4>After</h4>
                    <img src='footer-after.jpg' alt='footer after'>
                </section>
                <section id='change3'>
                    <h3>Fix 3: Add link to admin page</h3>
                    <p>Before, there was no way to get to the admin page to make changes to list of users or some of the pet options. We added a link on the header when a user is logged in as admin.</p>
                    <h4>Before</h4>
                    <img src="header-before.png" alt='admin link before'>
                    <h4>After</h4>
                    <img src='header-after.jpg' alt='admin link after'>
                </section>
            <section id='change4'>
                    <h3>Fix 4: Adopt pet login redirect</h3>
                    <p>Before, if you wanted to adopt a pet but were not logged in, you would be taken to the login page and then be redirected to the home page after logging in. We changed that so the user is navigated back to the pet they were previously looking at.</p>
                </section>
        </article>
        </main>
    </body>
</html>