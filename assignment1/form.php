<?php
include "top.php";

//%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%
//
// SECTION: 1 Initialize variables
//
// SECTION: 1a.
// variables for the classroom purposes to help find errors.

$debug = false;

if (isset($_GET["debug"])) { // ONLY do this in a classroom environment
    $debug = true;
}

if ($debug)
    print "<p>DEBUG MODE IS ON</p>";

//%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%
//
// SECTION: 1b Security
//
// define security variable to be used in SECTION 2a.
$yourURL = $domain . $phpSelf;


//%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%
//
// SECTION: 1c form variables
//
// Initialize variables one for each form element
// in the order they appear on the form
$firstName = "";
$LastName = "";
$email = "youremail@uvm.edu";

$gender = "Female";


//checkbox
$hiking = true;    // checked
$kayaking = false; // not cehcked
//listbox
$mountain = "Camels Hump";


$comments = "";


//%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%
//
// SECTION: 1d form error flags
//
// Initialize Error Flags one for each form element we validate
// in the order they appear in section 1c.
$firstNameERROR = false;
$LastNameERROR = false;
$emailERROR = false;
$commentsERROR = false;

//%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%
//
// SECTION: 1e misc variables
//
// create array to hold error messages filled (if any) in 2d displayed in 3c.
$errorMsg = array();

// array used to hold form values that will be written to a CSV file
$dataRecord = array();

$mailed = false; // have we mailed the information to the user?
//@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
//
// SECTION: 2 Process for when the form is submitted
//
if (isset($_POST["btnSubmit"])) {

    //@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
    //
    // SECTION: 2a Security
    // 
    if (!securityCheck(true)) {
        $msg = "<p>Sorry you cannot access this page. ";
        $msg.= "Security breach detected and reported</p>";
        die($msg);
    }

    //@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
    //
    // SECTION: 2b Sanitize (clean) data 
    // remove any potential JavaScript or html code from users input on the
    // form. Note it is best to follow the same order as declared in section 1c.

    $firstName = htmlentities($_POST["txtFirstName"], ENT_QUOTES, "UTF-8");
    $dataRecord[] = $firstName;

    $LastName = htmlentities($_POST["txtLastName"], ENT_QUOTES, "UTF-8");
    $dataRecord[] = $LastName;

    $email = filter_var($_POST["txtEmail"], FILTER_SANITIZE_EMAIL);
    $dataRecord[] = $email;

    $gender = htmlentities($_POST["radGender"], ENT_QUOTES, "UTF-8");
    $dataRecord[] = $gender;


    $comments = htmlentities($_POST["txtComments"], ENT_QUOTES, "UTF-8");
    $dataRecord[] = $comments;

    //checkbox
    if (isset($_POST["chkHiking"])) {
        $hiking = true;
        $dataRecord[] = htmlentities($_POST["chkHiking"], ENT_QUOTES, "UTF-8");
    } else {
        $hiking = false;
        $dataRecord[] = "";
    }

    if (isset($_POST["chkKayaking"])) {
        $kayaking = true;
        $dataRecord[] = htmlentities($_POST["chkKayaking"], ENT_QUOTES, "UTF-8");
    } else {
        $kayaking = false;
        $dataRecord[] = "";
    }

    //listbox
    $mountain = htmlentities($_POST["lstMountains"], ENT_QUOTES, "UTF-8");
    $dataRecord[] = $mountain;

    //@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
    //
    // SECTION: 2c Validation
    //
    // Validation section. Check each value for possible errors, empty or
    // not what we expect. You will need an IF block for each element you will
    // check (see above section 1c and 1d). The if blocks should also be in the
    // order that the elements appear on your form so that the error messages
    // will be in the order they appear. errorMsg will be displayed on the form
    // see section 3b. The error flag ($emailERROR) will be used in section 3c.
    //firstname
    if ($firstName == "") {
        $errorMsg[] = "Please enter your first name";
        $firstNameERROR = true;
    } elseif (!verifyAlphaNum($firstName)) {
        $errorMsg[] = "Your first name appears to have extra character.";
        $firstNameERROR = true;
    }

//lastname
    if ($LastName == "") {
        $errorMsg[] = "Please enter your last name";
        $LastNameERROR = true;
    } elseif (!verifyAlphaNum($LastName)) {
        $errorMsg[] = "Your last name appears to have extra character.";
        $LastNameERROR = true;
    }
// email
    if ($email == "") {
        $errorMsg[] = "Please enter your email address";
        $emailERROR = true;
    } elseif (!verifyEmail($email)) {
        $errorMsg[] = "Your email address appears to be incorrect.";
        $emailERROR = true;
    }


    //gender radio
    //comments
    //@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
    //
    // SECTION: 2d Process Form - Passed Validation
    //
    // Process for when the form passes validation (the errorMsg array is empty)
    //
    if (!$errorMsg) {
        if ($debug)
            print "<p>Form is valid</p>";

        //@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
        //
        // SECTION: 2e Save Data
        //
        // This block saves the data to a CSV file.

        $fileExt = ".csv";

        $myFileName = "../bin/data/registration";

        $filename = $myFileName . $fileExt;

        if ($debug)
            print "\n\n<p>filename is " . $filename;

        // now we just open the file for append
        $file = fopen($filename, 'a');

        // write the forms informations
        fputcsv($file, $dataRecord);

        // close the file
        fclose($file);

        //@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
        //
        // SECTION: 2f Create message
        //
        // build a message to display on the screen in section 3a and to mail
        // to the person filling out the form (section 2g).

        $message = '<h2>Your information.</h2>';

        foreach ($_POST as $key => $value) {

            $message .= "<p>";

            $camelCase = preg_split('/(?=[A-Z])/', substr($key, 3));

            foreach ($camelCase as $one) {
                $message .= $one . " ";
            }
            $message .= " = " . htmlentities($value, ENT_QUOTES, "UTF-8") . "</p>";
        }


        //@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
        //
        // SECTION: 2g Mail to user
        //
        // Process for mailing a message which contains the forms data
        // the message was built in section 2f.
        $to = $email; // the person who filled out the form
        $cc = "";
        $bcc = "";
        $from = "A magical website <noreply@yoursite.com>";

        // subject of mail should make sense to your form
        $todaysDate = strftime("%x");
        $subject = "Research Study: " . $todaysDate;

        $mailed = sendMail($to, $cc, $bcc, $from, $subject, $message);
    } // end form is valid
} // ends if form was submitted.
//#############################################################################
//
// SECTION 3 Display Form
//
?>

<article id="main">

<?php
//####################################
//
// SECTION 3a.
//
// 
// 
// 
// If its the first time coming to the form or there are errors we are going
// to display the form.
if (isset($_POST["btnSubmit"]) AND empty($errorMsg)) { // closing of if marked with: end body submit
    print "<h1>Your Request has ";

    if (!$mailed) {
        print "not ";
    }

    print "been processed</h1>";

    print "<p>A copy of this message has ";
    if (!$mailed) {
        print "not ";
    }
    print "been sent</p>";
    print "<p>To: " . $email . "</p>";
    print "<p>Mail Message:</p>";

    print $message;
} else {


    //####################################
    //
        // SECTION 3b Error Messages
    //
        // display any error messages before we print out the form

    if ($errorMsg) {
        print '<div id="errors">';
        print "<ol>\n";
        foreach ($errorMsg as $err) {
            print "<li>" . $err . "</li>\n";
        }
        print "</ol>\n";
        print '</div>';
    }


    //####################################
    //
        // SECTION 3c html Form
    //
        /* Display the HTML form. note that the action is to this same page. $phpSelf
      is defined in top.php
      NOTE the line:

      value="<?php print $email; ?>

      this makes the form sticky by displaying either the initial default value (line 35)
      or the value they typed in (line 84)

      NOTE this line:

      <?php if($emailERROR) print 'class="mistake"'; ?>

      this prints out a css class so that we can highlight the background etc. to
      make it stand out that a mistake happened here.

     */
    ?>

        <form action="<?php print $phpSelf; ?>"
              method="post"
              id="frmRegister">

            <fieldset class="wrapper">
                <legend>Register Today</legend>
                <p>You information will greatly help us with our research.</p>

                <fieldset class="intro">
                    <legend>Please complete the following form</legend>

                    <!-- start contact -->
                    <fieldset class="contact">
                        <legend>Contact Information</legend>
                        <label for="txtFirstName" class="required">First Name
                            <input type="text" id="txtFirstName" name="txtFirstName"
                                   value="<?php print $firstName; ?>"
                                   tabindex="100" maxlength="45" placeholder="Enter your first name"
    <?php if ($firstNameERROR) print 'class="mistake"'; ?>
                                   onfocus="this.select()"
                                   autofocus>
                        </label>

                        <label for="txtLastName" class="required">Last Name
                            <input type="text" id="txtLastName" name="txtLastName"
                                   value="<?php print $LastName; ?>"
                                   tabindex="110" maxlength="45" placeholder="Enter your last name"
    <?php if ($LastNameERROR) print 'class="mistake"'; ?>
                                   onfocus="this.select()"
                                   autofocus>
                        </label>

                        <label for="txtEmail" class="required">Email
                            <input type="text" id="txtEmail" name="txtEmail"
                                   value="<?php print $email; ?>"
                                   tabindex="120" maxlength="45" placeholder="Enter a valid email address"
    <?php if ($emailERROR) print 'class="mistake"'; ?>
                                   onfocus="this.select()" 
                                   >
                        </label>
                    </fieldset> <!-- ends contact -->

                    <!-- start radio -->
                    <fieldset class="radio">	
                        <legend>What is your gender?</legend>
                        <label><input type="radio" 
                                      id="radGenderMale" 
                                      name="radGender" 
                                      value="Male"
    <?php if ($gender == "Male") print 'checked' ?>
                                      tabindex="330">Male</label>
                        <label><input type="radio" 
                                      id="radGenderFemale" 
                                      name="radGender" 
                                      value="Female"
    <?php if ($gender == "Female") print 'checked' ?>
                                      tabindex="340">Female</label>
                        <label><input type="radio" 
                                      id="radGenderOther" 
                                      name="radGender" 
                                      value="Other"
    <?php if ($gender == "Other") print 'checked' ?>
                                      tabindex="350">Other</label>
                    </fieldset><!-- end radio -->	

                    <!-- start checkbox -->                  
                    <fieldset class="checkbox">
                        <legend>Do you like (check all that apply):</legend>
                        <label><input type="checkbox" 
                                      id="chkHiking" 
                                      name="chkHiking" 
                                      value="Hiking"
    <?php if ($hiking) print " checked "; ?>
                                      tabindex="420"> Hiking</label>

                        <label><input type="checkbox" 
                                      id="chkKayaking" 
                                      name="chkKayaking" 
                                      value="Kayaking"
    <?php if ($kayaking) print " checked "; ?>
                                      tabindex="430"> Kayaking</label>    
                    </fieldset><!-- end checkbox -->

                    <!-- start listbox -->
                    <fieldset  class="listbox">	
                        <label for="lstMountains">Favorite Mountain</label>
                        <select id="lstMountains" 
                                name="lstMountains" 
                                tabindex="520" >
                            <option <?php if ($mountain == "HayStack Mountain") print " selected "; ?>
                                value="HayStack Mountain">HayStack Mountain</option>

                            <option <?php if ($mountain == "Camels Hump") print " selected "; ?>
                                value="Camels Hump">Camels Hump</option>

                            <option <?php if ($mountain == "Laraway Mountain") print " selected "; ?>
                                value="Laraway Mountain">Laraway Mountain</option>
                            <option <?php if ($mountain == "Mount Mansfield") print " selected "; ?>
                                value="Mount Mansfield">Mount Mansfield</option>
                            <option <?php if ($mountain == "Jay Peak") print " selected "; ?>
                                value="Jay Peak">Jay Peak</option>
                        </select>
                    </fieldset><!-- end listbox -->

                    <!-- start text area --> 
                    <fieldset  class="textarea">	

                        <label for="txtComments" class="required">Comments</label>
                        <textarea id="txtComments" 
                                  name="txtComments" 
                                  tabindex="800"
    <?php if ($commentsERROR) print 'class="mistake"'; ?>
                                  onfocus="this.select()" 
                                  ><?php print $comments; ?></textarea>
                        <!-- NOTE: no blank spaces inside the text area -->
                    </fieldset><!-- ends text area -->


                </fieldset> <!-- ends intro -->

                <fieldset class="buttons">
                    <legend></legend>
                    <input type="submit" id="btnSubmit" name="btnSubmit" value="Register" tabindex="900" class="button">
                </fieldset> <!-- ends buttons -->

            </fieldset> <!-- Ends Wrapper -->
        </form>

    <?php
} // end body submit
?>

</article>

<?php include "footer.php"; ?>

</body>
</html>

