$(document).ready(function(e)
{
    /* (Start) Flash Inputs Placeholder of AddProduct Form when focus */
    $('[placeholder]').focus(function (){
        $(this).attr('data-text', $(this).attr('placeholder'));
        $(this).attr('placeholder', '');
    }).blur(function (){
        $(this).attr('placeholder', $(this).attr('data-text'));
    });
    /* (End) */

    /* (Start) Show the selected Product type only */
    $('#productType').change(function (){
        var id = $(this).children(":selected").attr('id');
        $("div .type").hide();
        $("div #"+id).fadeIn(500);
    });
    /* (End) */

    /* (Start) Make the product card clickable.*/
    $(document).on('click', '.card-body', function ()
    {
        //We check first if the div checkbox children is checked, if not then chick it.
        if(!$(this).children(".delete-checkbox").is(":checked")) {
            $(this).children(".delete-checkbox").prop('checked', true);
        }
        // If it's actually checked uncheck it.
        else {
            $(this).children(".delete-checkbox").prop('checked', false);
        }
    });


    /*
        Start Input Validation Process using regex
        ------------------------------------
        - First get all the input in our document
        - Second we define our input fields regex, based on I don't know on what -_-
        - Define our simple validate function
        - Iterate over all the form input fields, and on input change we apply our validation function.
          User may enter invalid data, so we will disable the form submission after that, but if you notice at line 106 I have enabled the form submission.
          I have done that because, if the user came back to correct the input data, we need to enable the button again at that point.
     */
    const inputs = document.querySelectorAll('input');
    const patterns = {
        // sku, name allow letters and digits only, no special characters, and no character length limit
        sku: /^[a-z\d]+$/i,
        name: /^[a-z\d]+$/i,
        // price, size, width, height, length, weight allow digits only, no special characters, and no digit length limit
        price: /^\d+$/,
        size: /^\d+$/,
        width: /^\d+$/,
        height: /^\d+$/,
        length: /^\d+$/,
        weight: /^\d+$/,
    };
    //Validation function
    function validate(field, regex)
    {
        if(regex.test(field.value)){
            //if passed, Add to the input tag valid class
            field.className = 'valid form-control ';
        }else{
            //if not passed, Add to the input tag invalid class
            field.className = 'invalid form-control';
        }
    }
    inputs.forEach((input) => {
        input.addEventListener("change", (e) => {
            validate(e.target, patterns[e.target.attributes.name.value]);
            if($(input).attr('class').startsWith('valid')){
                $('button').attr('disabled', false);
            }
        });
    });



    //Here we disable the form submission if inputs is invalid
    $('button').on('click', function (e){
        var Typevalue = $('#productType').find(":selected").val();
        if(!Typevalue) {
            alert('Please select product type.');
            e.preventDefault();
        }
        $("form").find('input').each(function() {
            if($(this).attr('class').startsWith('invalid')){
                $('button').attr('disabled', true);
                e.preventDefault();
            }
        });
    });
    /*(End)*/

    /*(Start)
        Remove  required attribute from unused inputs
        In the front-end I made all input fields required, but when the user select a specific type, the other 2 hidden types will issue a problem
        when submitting, because the fields inside them are required, so we need to disable them, because they prevent submission, and they are not focusable.
    */
    $('div:hidden').children('input').removeAttr('required');
    /*(End)*/

});