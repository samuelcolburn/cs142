$(document).ready(function() {



// @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
//@@@@@ ADDPET IMAGE PREVIEW @@@@@@@@@@@@@@@@@@@

    function readURL(input) {

        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {

                var imgWidth = $(".YourImage").width;

                var boxWidth = document.getElementsByClassName('image').offsetWidth;

                if (imgWidth < (boxWidth * .8)) {
                    $('.YourImage').css("width", imgWidth);
                }
                else {
                    $('.YourImage').css("width", "80%");
                }


                $('.YourImage').attr('src', e.target.result);



            };

            reader.readAsDataURL(input.files[0]);
        }
    }

    $("#fileToUpload").change(function() {
        readURL(this);
    });


    //Image 
    var imgcheck = 1;


    $("#fileToUpload").change(function() {

        if (imgcheck === 1) {
            $(".YourImage").toggleClass("image-visible");

            imgcheck++;
        }


    });

// @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
// @@@@@@@@@@@ Delete Image @@@@@@@@@@@@@@@


    function deleteImage(file_name)
    {
        
        var r = confirm("Are you sure you want to delete this Image?")
        if (r === true)
        {
            $.ajax({
                type: 'GET',
                url: 'deleteimage.php',
                data: {'file': file_name},
                success: function(response) {
                    location.reload();
                },
                error: function() {
                    alert("There was an error processing your request.");
                }
            });
        }
    }

    $(".ImageDelete").click(function() {

        var petName = document.getElementById("txtProductName");
        
        var directory = $(petName).attr("value");
        
        
        var id = $(this).prev().prev().attr("id");


        var myImage = document.getElementById(id);
        var src = myImage.src; // will contain the full path


        if (src.indexOf('/') >= 0) {
            src = src.substring(src.lastIndexOf('/') + 1);
        }

    
        deleteImage("pics/" + directory + "/" + src);
    });


// @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
// @@@@@@@@@@@ ADOPT PET EMAIL MESSAGE @@@@@@@@@@@@@@@

$(".EmailButton").click(function() {
        
        $(".message").removeClass("active");
        $(".after-message").addClass("active");

        var petName = document.getElementById("pet-name");



        var petname = petName.innerHTML;


        $.ajax({
            type: 'GET',
            url: 'mailadoptmessage.php',
            data: {'petname': petname},
            dataType: 'json',
            success: function(response) { 
                document.getElementById("message-email").textContent=response.email;
            },
            error: function() {
                document.getElementById("message-email").textContent="There was an error processing your request.";
            }
        });

    });




// @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
// @@@@@@@@@@@ OWL CAROUSEL @@@@@@@@@@@@@@@

    $("#owl-demo").owlCarousel({
        navigation: false, // Show next and prev buttons
        slideSpeed: 300,
        paginationSpeed: 400,
        singleItem: false,
        items: 3,
        autoPlay: true,
        autoHeight: true,
        transitionStyle: "fade",
        goToFirstSpeed: 2000,
        stopOnHover: true,
        itemsScaleUp: false




                // "singleItem:true" is a shortcut for:
                // items : 5, 
                // itemsDesktop : false,
                // itemsDesktopSmall : false,
                // itemsTablet: false,
                // itemsMobile : false

    });




});