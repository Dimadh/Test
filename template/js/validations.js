//Script for field validation
$(document).ready(function() {
    //function for show error massage
    function showErrorMsg(fieldSel,errorMsg) {
        var errorMessageHtml = '<span class="textErrorMsg nodisplay">'+errorMsg+'</span>';
        $(fieldSel).next('.textErrorMsg').remove();
        $(fieldSel).after(errorMessageHtml);
        $(fieldSel).next('.textErrorMsg').fadeIn(700);
    }
    
    //function for remove error massage
    function removeErrorMsg(fieldSelRemove)
    {
        $(fieldSelRemove).next('.textErrorMsg').fadeOut(500,function () {
            $(fieldSelRemove).next('.textErrorMsg').remove();
        });
    }
    
    //function for validate field Login
    function validateLogin()
    {
        var loginSel = '.login';
        var loginEle = $(loginSel);
        var loginEleVal = loginEle.val();
        if (loginEleVal.length <=2) {
            showErrorMsg(loginSel,'please enter fullname atleast 2 characters');
            return false;
        }
        else {
            removeErrorMsg(loginSel);
            return true;
        }
     }

    //function for validate field Email
    function validateEmail()
    {
        var emailSel = '.email';
        var emailEle = $(emailSel);
        var emailEleVal = emailEle.val();
        var emailRegex = /^[a-zA-Z0-9_.]+\@[a-zA-Z0-9.]+\.[a-zA-Z0-9]{2,4}$/;
        if (!emailEleVal.match(emailRegex)) {
            showErrorMsg(emailSel,'please enter valid email address');
            return false;
        }
        else {
            removeErrorMsg(emailSel);
            return true;
        }
    }

    //function for field validate region
    function validateRegion()
    {
        var regionSel = '.region';
        var regionEle = $(regionSel);
        var regionVal = $('.region option:selected').attr('value');
        if (regionVal == 0 || typeof regionVal==='undefined') {
            showErrorMsg(regionSel,'please select region');
            return false;
        }
        else {
            removeErrorMsg(regionSel);
            return true;
        }
    }

    function validateCity()
    {
        var citySel = '.city';
        var cityEle = $(citySel);
        var cityVal = $('.city option:selected').attr('value');
        if (cityVal == 0 || typeof cityVal==='undefined') {
            showErrorMsg(citySel,'please select city');
            return false;
        }
        else {
            removeErrorMsg(citySel);
            return true;
        }
    }

    function validateDistrict()
    {
        var districtSel = '.district';
        var districtEle = $(districtSel);
        var districtVal = $('.district option:selected').attr('value');
        if (districtVal == 0 || typeof districtVal==='undefined') {
            showErrorMsg(districtSel,'please select district');
            return false;
        }
        else {
            removeErrorMsg(districtSel);
            return true;
        }
    }


    $('.login').blur(validateLogin);
    $('.email').blur(validateEmail);
    $('.region').blur(validateRegion);
    $('.city').blur(validateCity);
    $('.district').blur(validateDistrict);

    $('form.validationSingupform').submit(function() {
        if (validateLogin()&&
            validateEmail() &&
            validateRegion() &&
            validateCity()&&
            validateDistrict()
        ) {
            return true;
        } 
        else {
            validateLogin();
            validateEmail();
            validateRegion();
            validateCity();
            validateDistrict();
            return false;
        }
    });

});
