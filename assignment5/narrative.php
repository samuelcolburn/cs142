
<!DOCTYPE HTML>
<html lang="en-US">
    <head>
        <meta charset="UTF-8">


        <title>Style Before and After: Narrative</title>
        <style>
            body {margin: 0 auto;width: 80%;}
        </style>
    </head>
    <body>
        <article>
        <h1>Narrative</h1>
        
        <section>
            <h2>Internal Restructure</h2>
            
            <p>A quick look at the source code for initial page will reveal an absolute catastrophe of embedded html documents, frames, and in-line style. The first order of business in this redesign was to extract the content from this miasma, and put it one complete html document with all the style stripped out.</p>
            <h3>Initial Page</h3>
            <figure><figcaption>Home Page</figcaption><img src="narrative_pictures/before_homepage.png" alt="Home Page"></figure>
            <h3>Initial Code</h3>
            <figure><figcaption>Home Page Source</figcaption><img src="narrative_pictures/before_homepage_source.png" alt="Home Page Source"></figure>
            <figure><figcaption>Intro Source</figcaption><img src="narrative_pictures/before_intro_source.png" alt="Intro Source"></figure>
            <figure><figcaption>Menu Source</figcaption><img src="narrative_pictures/before_menu_source.png" alt="Menu Source"></figure>
            <p>As you can see, it was a total disaster. The first change is purely internal, making all that code reasonable. This is a zoomed out screenshot just to show all that mess put into one clean document. You can always look at after page to view it in detail.</p>
            <h3>Result</h3>
            <figure><figcaption>After Source</figcaption><img src="narrative_pictures/after_source.png"  alt="After Source"></figure>
        </section>
        <section>
            <h2>Begin Style</h2>
            <p>Now that I had useable html code, I could start styling. Because all of his style was in-line, we have a complete blank slate to work with. The first step was to decide where the menu was going to go. I chose to keep his menu on the left because it was more a list of useful links than a traditional menu. A little bit of padding and it starts to take some shape. </p>
            <figure><figcaption>Initial Menu</figcaption><img src="narrative_pictures/after_menu_stage.png" alt="Initial Menu"></figure>
            <p>After repositioning the menu on the left side, it needed cleaning. His "Teaching" section was really one useful link and two jokes. By removing the headings and making them all seperate links we can remove some of the clutter.  Also, his "students and postdocs" link in his main body could be in this menu given its function, so that was added to the bottom. <strong>NOTE:</strong> wrapping list elements in anchor tags does not currently validate, but it does function and makes the whole list item clickable, so for the purpose of good usability I did that intentionally.</p>
        <p>Once the menu was in the form I wanted it, I set to styling it. The first thing I did was begin working media queries. Because it is a left-hand menu, I needed it to dissappear when the window was scaled down to maximize space for the user. To achieve this, I used a mix of css rules and javascript to turn the menu into a button when the window goes below 840px. I also added a feature to keep it at the top left position after scrolling below the header. Additionally during this step, I changed the font and added the colors. I gave a hover effect to the menu options, and made the contact information hidden unless clicked to reduce clutter.</p>
        <figure><figcaption>Small Window Menu</figcaption><img src="narrative_pictures/after_menu_stage_small.png" alt="Small Window Menu"></figure>
        <section>
            <h2>Final Page</h2>
        <p>The final stage was styling and revising the content of the page itself. Given that he is a math professor, the actual content was already extremely concise, and I could not justify cutting much of the content. Similarly, given that it is a text summary I wanted to keep it black on white with minimal style to keep it easily readable. I floated his picture to the right to bring the text higher up the page. Additionally, if you scale the page inward the picture centers and comes to the top so the text stays readable at smaller sizes. </p>
        <figure><figcaption>Final Page Full Size</figcaption><img src="narrative_pictures/after_final_full_size.png" alt="Final Page Full Size"></figure>
        <figure><figcaption>Final Page Small Size</figcaption><img src="narrative_pictures/after_final_small.png" alt="Final Page Small Size"></figure>

        </section>
        
        
        </section>
        
        
        
        
        
        </article> 
</body>
</html>
