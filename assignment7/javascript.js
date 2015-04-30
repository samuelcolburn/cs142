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
                type:'GET',
                url: 'deleteimage.php',
                data: {'file': "<?php echo dirname(__FILE__)?>" + file_name},
                success: function(response) {
                    if(response === "delete"){
                        alert("deleted!");
                    }
                },
                error: function() {
                    alert("There was an error processing your request.");
                }
            });
        }
    }

    $(".ImageDelete").click(function() {

        var id = $(this).prev().prev().attr("id");
        
        alert(id);
        
        var myImage = document.getElementById(id);
        var src = myImage.src; // will contain the full path

/*
        if (src.indexOf('/') >= 0) {
            src = src.substring(src.lastIndexOf('/') + 1);
        }
        */
        alert(src);
        deleteImage(src);
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