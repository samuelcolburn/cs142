 
/* Course website sytlesheet redisgn by: Sam Colburn, William Kniffin, Jeremy Valance 

- This stylesheet redesigns Roberk Ericksons CS 142 course website.

*/

/* ==== INTIAL RESETS ===== */
html, body, div, span, applet, object, iframe,
h1, h2, h3, h4, h5, h6, p, blockquote, pre,
a, abbr, acronym, address, big, cite, code,
del, dfn, em, img, ins, kbd, q, s, samp,
small, strike, strong, sub, sup, tt, var,
b, u, i, center,
dl, dt, dd, ol, ul, li,
fieldset, form, label, legend,
table, caption, tbody, tfoot, thead, tr, th, td,
article, aside, canvas, details, embed, 
figure, figcaption, footer, header, hgroup, 
menu, nav, output, ruby, section, summary,
time, mark, audio, video {
    margin: 0;
    padding: 0;
    border: 0;
    font-size: 100%;
    font: inherit;
    vertical-align: baseline;
}
/* HTML5 display-role reset for older browsers */
article, aside, details, figcaption, figure, 
footer, header, hgroup, menu, nav, section {
    display: block;
}
body {
    line-height: 1;
}
ol, ul {
    list-style: none;
}
blockquote, q {
    quotes: none;
}
blockquote:before, blockquote:after,
q:before, q:after {
    content: '';
    content: none;
}
table {
    border-collapse: collapse;
    border-spacing: 0;
}

footer {
     display:none;
}
html body header{
z-index: 5 !important;
}

/* ====== BEGIN STYLESHEET =======*/


/* @@@@@@@@@@@@@@@@@@@@@@@@@   GENERAL  @@@@@@@@@@@@@@@@@@@@@@@ */ 

*::after, *::before {
    content: '';
}
html, body {
}
body {
    font-family: "Century Gothic", sans-serif;
    color: #222;
  display: flex;
  flex-direction: column;
    background-color:#eee;

}
a {
    text-decoration: none;
}

h1{
    font-weight:normal;
    padding-bottom:10px;
    font-size: 24px;
    margin-bottom:15px;
}


h2{
    font-weight:normal;
  //  border-bottom:2px solid #999;
    padding-bottom:10px;
    font-size: 24px;
    margin-bottom:15px;

}
/* ~~~~~~~   main article   ~~~~~~~ */ 
#mainContent {
  padding: 5%;
  background:#fff;
  margin:0 auto;
  width:80%;

}





/* @@@@@@@@@@@@@@@@@@@@@@@@@@  Assignment and Lecture List Pages  @@@@@@@@@@@@@@@@@@@@@@@@ */ 

#assignments #mainContent , #lectures #mainContent {
}


/*      general list style      */
#assignments ol.AssignmentsLink,ol.LecturesLink{
    list-style-type:none;
    padding:0;
    margin:0;
    width:560px;
}

/* li element style       */
#assignments ol.AssignmentsLink li ,ol.LecturesLink li{
    color:#222;
    background-color:#FFF;
    padding:20px;
    border-radius:0px;
    position:relative;
    padding-left:48px;
    width:500px;
}
/* gives a top border to the first li element
li.title.summary:first-of-type{
    border-top:thin solid #999;
}
*/


/* LINK STYLE */
li.title.summary a.url{
    color:blue;

}
#assignments ol.AssignmentsLink li:hover a , #lectures ol.LecturesLink li:hover a{
    // color:#FEC72C;
    text-decoration:underline;
}

#assignments ol.AssignmentsLink li a:hover , #lectures ol.LecturesLink li a:hover{
    color:white;
}
#assignments ol.AssignmentsLink li:hover , #lectures ol.LecturesLink li:hover {
    background-color:#649158;
    color:#FFF;
    border-radius:2px;
}

/* button style */
#assignments ol.AssignmentsLink li::before,#assignments ol.AssignmentsLink li::after,
#lectures ol.LecturesLink li::before, #lectures ol.LecturesLink li::after
{
    content:"";
    position: absolute;
    top: 26px;
    left: 20px;
    height: 2px;
    width: 12px; 
    background-color: #424f5c;
    /* this fixes a bug where pseudo elements are slighty off position */
    backface-visibility: hidden;
    transition: transform 0.6s;
}
#assignments ol.AssignmentsLink li::before,
#lectures ol.LecturesLink li::before
{
    transform: rotate(-90deg);


}
#assignments ol.AssignmentsLink li::after ,
#lectures ol.LecturesLink li::before
{
    //  transform: rotate(-45deg);


}
#assignments ol.AssignmentsLink li:hover::before ,
#lectures ol.LecturesLink li:hover::before
{
    background-color: white;
    transform: rotate(-0deg);
}


#assignments ol.AssignmentsLink li:hover::after,
#lectures ol.LecturesLink li:hover::after
{
    background-color: white;
    transform: rotate(180deg);
}

/*------------------ scaling style     ------------------*/
@media screen and (max-width: 800px){
    #mainContent{
    }

}

@media screen and (max-width: 650px){
    #mainContent{
        padding-left:1%;
    }

}







/*@@@@@@@@@@@@@@@@@@@@  Individual Assignment and Lecture Pages   @@@@@@@@@@@@@@@@@@@@@@@*/

#otherMedia {
    display:none;
}

 #slide a{
    text-decoration:none;
}

 #slide a:visited {
    color:blue;
}

 #slide a:hover {
    text-decoration:underline;
}
 #slide h1 {
    font-weight:normal;
   // border-bottom:2px solid #999;
    padding-bottom:10px;
    font-size: 24px;
    margin-bottom:15px;

}

 #slide h1+h2 {
    font-weight:bold;
}

 #slide h2 {
    border:none;
    font-size: 16px;
    padding-top: 5px;
    padding-bottom:5px;
    margin:0;

}

 #slide p {
    margin-top:5px;
    margin-bottom:5px;
}

#slide p.firstLine {
    display:block;
    margin-bottom:50px;
/* makes line  match header*/
}

 #slide p+h1 {
display: none;
}

 #slide hr{
    display:none;
}

 #slide b{
    font-weight:bold;
}

/* lists */
 #slide ol {
    padding-bottom:10px;
    padding-left:3em;
    list-style-type:decimal;
}

#slide ol li{
    padding-top:5px;
    padding-bottom:5px;
}

/* sublists */
 #slide li ol {
    padding-left:30px;
    list-style-type:decimal;
    padding-right:0px;
}

#slide li ol li ol {
    list-style-type:decimal;
}

 #slide li ol li {
    padding-top:5px;
    padding-bottom:5px;
}


/* ~~~~ lecture page specific ~~~~~ */
/*code div */

#slide div {
    font-family: monospace;
    margin-top:10px;
}




#lecture article>p {
margin-left: 15%;
margin-bottom: 15px;
}

/* @@@@@@@@@@@@@@@@@        Calendar page         @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@ */

/* ~~~~~~~~~~~~ header ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ */
/* minor adjustments to account for calendar size */
#calendar h2 {
}


/* ~~~~~~~~~~~~ General Table Style ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ */
#calendar table td {
    vertical-align:top;
    padding:4px; 
    border: thin solid #999;
    height:100px;
    width:14%;
    background-color:#fafafa;  /* sets  calendar non-days to gray*/
}

#calendar table td.days {
    background-color:#fff;
}


.monthHeader th{
    padding-top:25px;
    padding-bottom:5px;
}

/* Day Number */ 
div.date{
    padding: 0.5em 0.5em 0.5em 0.5em; 
    text-align:left; 
}

/* day rows */
tr.days{
    //    width:18%;
}

#calendar table tr.days th,  table tr.days th {
    color: #3399FF;
    font-weight: bold;
    padding: 1px 0.33em;
    text-align: center;
}


tr.days th.sat, tr.days th.sun {
}


.event {
    padding:0.5em;
}



#calendar table td.Sat {
}

/* link styling */
#calendar div.event a {
    // text-decoration:underline;
}

#calendar div.event a:visited {
    // text-decoration:underline;
}

#calendar div.event a:hover {
    text-decoration:underline;
}

/*
td.Sat div.date, td.Sun div.date{
    border-width: 0;
    color: black; 
    background: transparent;
}

td.Jun div.date, td.Aug div.date{
    border-width: 0; 
    color: black; 
    background: transparent;
}	

#calendar table td.Sat, #calendar table td.Sun {
    
}
*/

#calendar table td.atoday {
    border-width:4px;
}

#calendar #mainContent table td:hover{
    background-color:#eee;
}

/* ~~~~~~~~~~ Attendance Markers ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ */

/* adjust attendance row height */ 
tr#attendanceRow td, tr#attendanceRow th{
    height: 35px;
    vertical-align: middle;
}

.Absent{
    color: #222 !important;
    background: #ff9e4e !important;
    text-align: center;	

}
.Excused{
    color: #aa0011 !important;
    background: #ffadad !important;
    text-align: center;	
}

.FreeDay{
    color: #222 !important;
    background: #BDF8BD !important;
    text-align: center;	
}

.Late{
    color: #222 !important;
    background: #FFC89A !important;
    text-align: center;	
}

.Personal{
    color: #222 !important;
    background: #86DDDD !important;
    text-align: center;	   
}

.Present{
    color: #222 !important;
    background: #90EE90 !important;
    text-align: center;
}

.Sick{
    color: #222 !important;
    background: #FFFF64 !important;
    text-align: center;	
}

/* ~~~~~~ assignments, tests, projects, labs ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~  */
.assignment{
    color: white;
    margin:0;
    padding: 0.5em; 
    margin-top:2px;
}

.labComplete{
    color: #24B300 !important;
    background: #ffcfcf !important;
}


.presentation{
    border: dashed medium #ff0000 !important;
}

/* submitted assignments */
.submitted{
    background:#43613b;
}
#calendar .event.vevent.assignment.submitted a {
    text-decoration:underline;
    color:#43613b;
}
#calendar .event.vevent.assignment.submitted a:visited {
    color:white;
}
#calendar .event.vevent.assignment.submitted a:hover{
    text-decoration:none;
}
/* not submitted assignments */
#calendar .notSubmitted{
    color:white;
    background:#c0392b;
}
#calendar .event.vevent.assignment.notSubmitted a {
    text-decoration:underline;
    color:white;
}
#calendar .event.vevent.assignment.notSubmitted a:visited {
    color:white;
}
#calendar .event.vevent.assignment.notSubmitted a:hover{
    text-decoration:none;

}



.TOPIC { 
    color: #4444CC; 
    text-align:center; 
    padding: 0.125em 0.25em 0 0; 
    margin:0;  
}

/* ~~~~~~~ vacation weeks ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~*/
#calendar table td.days.VACA {
    background-color: #EABFFF; /*#EABFFF;*/ 
}

/* ~~~~~~~~~~~~~  ta styling ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ */

ol.taVisits { min-height: 45px;
}
ol.taVisists li{
    list-style-type: none;
    margin-left: 0;
}

ol.taVisists li.null{
    font-weight: bold;
}
ol.taVisists li.null:before{
    content: "Appt ";
}

ol.taVisists li.Show{
    background: none repeat scroll 0 0 #ccffbf !important;
    color: #24b300 !important;
}
ol.taVisists li.NoShow{
    background: none repeat scroll 0 0 #aa0011 !important;
    color: #ffbfbf !important;
}




/* ~~~~~~ misc ~~~~~~~~   */
.callInSick{
    float: left;
    margin: 0;
}

#fullCalendar{
    float:right;
    font-size: small;
}


/* @@@@@@@@@@@@@@@@@  Sick Page         @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@ */

#sick article#mainContent{
  //  padding-left:15%;
}

#sick p{
}
/* @@@@@@@@@@@@@@@@@  Submit Assignment Page        @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@ */


/* ~~~~~~~~~~~~~~~ general style ~~~~~~~~~~~~*/
#submitAssignment article#mainContent{
  //  padding-left:15%;
}


#submitAssignment h1{
    margin-left:0px;

}

#submitAssignment a:hover{
    text-decoration:underline;
}

/* ~~~~~~~~~~ form style ~~~~~~~~~~~~~~~~~~~~~ */
#submitAssignment fieldset {
    padding-top:10px;
    padding-bottom:20px;
}

#submitAssignment select{
    font-family:"Century Gothic", sans-serif;
    font-size:16px;
    padding:6px;
    border-radius:3px;
    margin:0;
}


#submitAssignment input[type="submit"]{
    // border: thin solid transparent;
    margin:1px;
    border-radius: 3px;
    padding: 10px;
    // background-color: #349033;
    color: white;
    font-family: "Century Gothic";

    /* gradient background */ 
    background: -webkit-linear-gradient(left top, #649158 , #43613b); /* For Safari 5.1 to 6.0 */
    background: -o-linear-gradient(bottom right, #649158, #43613b); /* For Opera 11.1 to 12.0 */
    background: -moz-linear-gradient(bottom right, #649158, #43613b); /* For Firefox 3.6 to 15 */
    background: linear-gradient(to bottom right, #649158 , #43613b); /* Standard syntax */

}

#submitAssignment input[type="submit"]:hover{
    background: -webkit-linear-gradient(left top, #43613b , #1B4011); /* For Safari 5.1 to 6.0 */
    background: -o-linear-gradient(bottom right, #43613b, #1B4011); /* For Opera 11.1 to 12.0 */
    background: -moz-linear-gradient(bottom right, #43613b, #1B4011); /* For Firefox 3.6 to 15 */
    background: linear-gradient(to bottom right, #43613b , #1B4011); /* Standard syntax */
    cursor: pointer;
}


/* ~~~~~~~~~~~~~~~~ results ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~*/

#submitAssignment h2+h2{
    font-size:20px;
    border:none;
}

#submitAssignment form > h2 {
    font-size:20px;
    border-width:1px;
}


#submitAssignment p{
    padding:10px;
}



#submitAssignment iframe{
    width:80%;
    min-height:200px;
    overflow:auto;
    padding:10px;
}


/* Can't access iframe styling due to linked stylesheet closer to the element */

/* @@@@@@@@@@@@@@@@@@@ grades @@@@@@@@@@@@@@@@@@@@@@@@   */

#grades a:hover{
    text-decoration:underline;
}


#grades table.standard {
    background-color: white;
    border-radius: 10px;
}

#grades table.standard {
    margin-top: 15px;
    text-align:left;
   
    
}

#grades th {
    border-style: solid;
    border-width: 2px;
    border-color: black;
    text-align: left;
    padding: 10px;
    background-color: #3399FF;
    border-spacing: 10px;
    
}
#grades td {
    border: 2px solid black;
    text-align: left;
    border-spacing: 10px;
    padding: 10px;
    
}

#grades tr {
    background-color: white;
}

#grades .GradesReleased {
    background-color: #BDF8BD;
}
#grades .NotGraded {
    background-color: #FFC89A;
}

#grades .GradingStarted {
    background-color: #EABFFF
}

#grades .avggrade {
    background-color: antiquewhite;
}

#grades tr:hover {
    background-color: yellow;
}

td.category {
    width:10%
}

td.grade {
    width:10%;
}

td.comments {
    width:70%;
}

td.avggrade {
    width:10%;
}
/* @@@@@@@@@@@@@@@ Resources Page @@@@@@@@@@@@@@@@@@@@@@@@ */

#media article{
}

#media h1+h1 {
    border:none;
    font-size:20px;
}

#media figure {
    display:none;
}
/* @@@@@@@@@@@@@@@ TA Request Help Page / Sick Submission Page @@@@@@@@@@@@@@@@@@@@@@@@ */

#requestTa form, #sick form{
    padding-left:15%;
    padding-right:15%;
    width:70%;
}

#requestTa  fieldset, #sick  fieldset {
    display:flex;
    flex-direction:column;
}

/* fieldset given */
#requestTa fieldset.given , #sick fieldset.given{
    margin-bottom:20px;
}

#requestTa p ,#sick p {
    padding-top:5px;
    padding-bottom:5px;
}

#requestTa fieldset.given label ,#sick fieldset.given label {
    padding-top:10px;
    padding-bottom:10px;
}

#requestTa input#txtAppointmentDate , #sick input#txtAppointmentDate{
    padding-top:10px;
}

/*  fieldset radio */
#requestTa fieldset.radio label,#sick fieldset.radio label{
    padding-top:5px;
}

fieldset fieldset:nth-child(2){
    margin-bottom:20px;
}


/* comments  */

fieldset fieldset:nth-child(3){
    margin-bottom:20px;
}
 
fieldset fieldset:nth-child(3) label{
    margin-bottom:5px;
}
    
#requestTa textarea#txtComments,#sick textarea#txtComments{
    width:365px;
    height:75px;
    border-radius:3px;
}

/* submissionm terms checkbox */

#requestTa fieldset.checkbox #sickfieldset.checkbox{
    width:500px;
}

/* submit button  */
fieldset fieldset:nth-child(4) label{
    margin-bottom:20px;
    
}

    
    
#requestTa input[type="submit"],#sick input[type="submit"]{
    // border: thin solid transparent;
    margin:1px;
    border-radius: 3px;
    padding: 10px;
    // background-color: #349033;
    color: white;
    font-family: "Century Gothic";

    /* gradient background */ 
    background: -webkit-linear-gradient(left top, #649158 , #43613b); /* For Safari 5.1 to 6.0 */
    background: -o-linear-gradient(bottom right, #649158, #43613b); /* For Opera 11.1 to 12.0 */
    background: -moz-linear-gradient(bottom right, #649158, #43613b); /* For Firefox 3.6 to 15 */
    background: linear-gradient(to bottom right, #649158 , #43613b); /* Standard syntax */

}

#requestTa input#btnSubmit[type="submit"]:hover , #sick input#butSubmit[type="submit"]:hover{
    background: -webkit-linear-gradient(left top, #43613b , #1B4011); /* For Safari 5.1 to 6.0 */
    background: -o-linear-gradient(bottom right, #43613b, #1B4011); /* For Opera 11.1 to 12.0 */
    background: -moz-linear-gradient(bottom right, #43613b, #1B4011); /* For Firefox 3.6 to 15 */
    background: linear-gradient(to bottom right, #43613b , #1B4011); /* Standard syntax */
    cursor: pointer;
}


/* @@@@@@@@@@@@@@@@@@@@@@@   TOP BOX   @@@@@@@@@@@@@@@@@@@@@@@@@ */ 


/* ~~~~~~~   NAV   ~~~~~~~ */ 

nav {
  position: fixed;
  width: 100%;
  top: 0px;
  background-color: #649158;
  z-index: 12;
  left: 0;
  box-shadow: 0px 1px 4px rgba(0,0,0,0.5);
}
nav ol {
  display: flex;
  justify-content: flex-start;
  margin-left: 2em;
}
nav ol::before {
  
}
nav ol li {
  padding: 13px 0.8em 13px 0.8em;
  cursor: pointer;
}
nav ol li a {
  color: white;
  font-weight: normal;
  font-size: 13px;
  cursor: pointer;
}

nav ol li:hover {
    background-color:#43613b;
}
nav ol li a:hover {
  text-decoration:underline;
}
nav ol li:nth-child(6) {
  position: relative;
  left: -5px;
}
nav ol li:nth-child(5) {
  position: absolute;
  top: 42px;
  left: 0px;
  padding: 3px;
  padding-right: 25px;
  padding-left: 8px;
  transform: translateX(-40px);
  background-color: rgba(0,0,0,0.5);
  transition: transform 0.4s, border-radius 0.4s;
}
nav ol li:nth-child(5):hover {
  transform: translateX(0px);
  border-radius: 0px 0px 5px 0px;
}
nav ol li:nth-child(7) {
  position: absolute;
  top: 63px;
  left: 2px;
  padding: 3px;
  padding-right: 25px;
  padding-left: 8px;
  transform: translateX(-136px);
  background-color: rgba(0,0,0,0.5);
  transition: transform 0.4s, border-radius 0.4s;
  border-radius: 0px 0px 5px 0px;
}
nav ol li:nth-child(7):hover {
  transform: translateX(0px);
  border-radius: 0px 5px 5px 0px;
}
nav ol li:nth-child(5)::before {
  width: 2px;
  height: 12px;
  background-color: white;
  position: absolute;
  right: 10px;
  top: 5px;
  z-index: 99;
}
nav ol li:nth-child(5)::after {
  width: 2px;
  height: 12px;
  background-color: white;
  position: absolute;
  right: 10px;
  top: 5px;
  z-index: 99;
  transform: rotate(-90deg);
}
nav ol li:nth-child(7)::before {
  width: 2px;
  height: 12px;
  background-color: white;
  position: absolute;
  right: 10px;
  top: 6px;
  z-index: 99;
}
nav ol li:nth-child(7)::after {
  width: 2px;
  height: 12px;
  background-color: white;
  position: absolute;
  right: 10px;
  top: 6px;
  z-index: 99;
  transform: rotate(-90deg);
}

/* ~~~~~~~   HEADER   ~~~~~~~ */ 

header {
  position: relative;
  height: 110px;
  background-color: #426D66;
  z-index:5;
}
#classtitle {
  position: absolute;
  display: flex;
  align-items: center;
  justify-content: center;
  top: 65px;
  width: 100%;
  color: white;
  font-size: 22px;
  text-transform: uppercase;
  font-weight: normal;
  border:none;
  margin:0;
}
#classtitle a {
  color: white;
  font-size: 22px;
  text-transform: uppercase;
  font-weight: normal;
  left: calc(50% - 10em);
  top: 70px;
  padding: 0px 3px 0px 3px;
}



/* ~~~~~~~   STUDENT INFO   ~~~~~~~ */ 

#studentInfo {
  position: fixed;
  top: 0px;
  right: 0px;
  color: white;
  z-index: 20;
  font-size: 12px;
  border-left: thin solid white;
  background-color: rgba(0,0,0,0.6);
  display: flex;
  align-items: center;
  justify-content: center;
  height: 42px;
}
#studentInfo::before {
  content: "";
  position: absolute;
  height: 42px;
  width: 0.5px;
  background-color: white;
  left: 155px;
  top: 0px;
}
#studentInfo::after {
  content: "";
  position: absolute;
  height: 42px;
  width: 1px;
  background-color: white;
  right: 89px;
  top: 0px;
}
#studentInfo span {
  display: flex;
  padding: 0.8em;
}
#studentInfo a {
  color: #87AD3C;
  padding: 0px 2px 0px 2px;
}
#studentInfo a:hover {
  text-decoration:underline;
  color:white;
}




/* @@@@@@@@@@@@@@@@@@@@@@@@@@@  UPCOMING / MILESTONES   @@@@@@@@@@@@@@@@@@@@@@ */ 
#upcoming {
  position: fixed;
  z-index: 11;
  top: 42px;
  right: 0px;

  background-color: #dbe2e9;
  transform: translateX(100%);
  transition: transform 0.4s;
  font-size: 14px;
  border-radius: 0px 0px 0px 5px;
  box-shadow: 2px 2px 4px rgba(0,0,0,0.5);
  box-sizing:border-box;
  width:411px;
}
#upcoming::after {
  content: "Milestones";
  font-size: 14px;
  color: white;
  position: fixed;
  background-color: grey;
  border-radius: 0px 0px 0px 5px;
  top: 0px;
  left: -98px;
  padding: 1em;
  z-index: 12;
  transition: transform 0.4s 0.4s;
  
}
#upcoming:hover {
  transform: translateX(0%);
}
#upcoming:hover::after {
  transform: translateY(-100%);
}
#mainContent #upcoming h1 {
  font-size: 13px;
  padding: 0.2em;
  font-weight: bold;
  margin-bottom:0;
  padding-left:1em;
}
#upcoming .box h1 {
  font-size: 13px;
  font-weight: bold;
  padding: 0.2em 0em 0.2em 1em;
}

#upcoming ol {
    width: 100%;
    margin: 0 auto;
    padding-left:1.5em;
}

#upcoming li {
    padding: 0.3em;
    // padding-left: 1.5em;
    width:100%;
    background-color:#dbe2e9;
   
}

#mainContent #upcoming li:hover{
    background-color:#dbe2e9;
}
#mainContent #upcoming li a:hover{
    
}

#mainContent #upcoming li::before,#mainContent #upcoming li::after{
    content:"";
    height:0px;
}

#upcoming a {
    color: blue;
    text-decoration: underline;
}
#upcoming a:hover {
    color: white;
}

aside#upcoming div:nth-child(2){
    padding-bottom:5px;
}
nav ol li:nth-child(5) 