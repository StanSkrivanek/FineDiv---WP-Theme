/*
 * Test if inline SVGs are supported.
 * @link https://github.com/Modernizr/Modernizr/
 */
function supportsInlineSVG() {
    var div = document.createElement('div');
    div.innerHTML = '<svg/>';
    return 'http://www.w3.org/2000/svg' === ('undefined' !== typeof SVGRect && div.firstChild && div.firstChild.namespaceURI);
}

if (true === supportsInlineSVG()) {
    document.documentElement.className = document.documentElement.className.replace(/(\s*)no-svg(\s*)/, '$1svg$2');
}

/**
 * Toggle visibility by Adding and removing class
 */
function visibilityToggle(id) {
    var e = document.getElementById(id).classList;
    if (e.contains("visible")) {
        e.remove("visible");
    } else {
        e.add("visible");
    }
}

// function searchAgain() {
//     var e = document.querySelector('#search-section').classList;
//     console.log(e);
//     e.add("visible");
// }


// Hide SECONDARY SEARCH FORM
function hide() {
    var e = document.querySelectorAll('.no-search-section');
    for (var i = 0; i < e.length; i++) {
        e[i].style.display = 'none';
    }
}


/**
 * Search field Auto-focus
 */
function SetFocus(id) {
    var input = document.getElementById(id);
    input.focus();
}


// function activateRadiobutton(){
//     var el = document.querySelectorAll('');
// }


// // AUTO RESIZE TEXT AREA
// var tx = document.getElementsByTagName('textarea');
// for (var i = 0; i < tx.length; i++) {
//     tx[i].setAttribute('style', 'height:' + (tx[i].scrollHeight) + 'px;overflow-y:hidden;');
//     tx[i].addEventListener("input", OnInput, false);
// }

// function OnInput() {
//     this.style.height = 'auto';
//     this.style.height = (this.scrollHeight) + 'px';
// }

// Topic Section
// ==============================================

//get value of selected topic
// function topicName(){
//     // get value of checked element (radio button)
//     var checked = document.querySelector('input[name="usertopic"]:checked').value;
//     console.dir(checked);
//     // and return this value
//     return checked;
// }

//add attribute 'checked' with value 'checked' to selected topic
function selectedTopic() {
    // get all inputs with attribute name = usertopic
    var topics = document.querySelectorAll('input[name="user_topic"]');
    // loop through
    for (var i = 0; i < topics.length; i++) {
        // store all finded elements in variable
        var topic = topics[i];
        // console.log(topic);
        // if checked
        if (topic.checked) {
            //add attribute
            topic.setAttribute("checked", "checked");
            var checked = document.querySelector('input[name="user_topic"]:checked').value;
            // console.dir(checked);
            return checked;
        } else {
            // remove attribute on rest of elements in the loop
            topic.removeAttribute("checked");
        }
    }
    // console.log(topics);
}

// FEATURED AND SPONSORED POST
// function specialPostType() {
    // var header = document.getElementById('single_header');
    // console.log(header);
    // header.innerHTML('InnerHTML');
        // var newEl = document.createElement('div');
        // var text = document.createTextNode(text);
        // newEl.append(text);
// }
// specialPostType();


// COMMENTS
// Hide comments if is there more than 2 (run it after comments loop)
function fds_comments() {
    var commentWrap = document.getElementById('comment-list');
    var commentChilderns = commentWrap.children;
    for (var i = 2; i < commentChilderns.length; i++) {
        commentChilderns[i].style.display = "none";
    }
    commentWrap.innerHTML = commentWrap.innerHTML + "<button id='more-comments'" +
        " class='btn-cta-green' onclick='fds_all_comments()'type='button' >Show all comments</button>";
}

// // Used on show_more button
function fds_all_comments() {
    var commentWrap = document.getElementById('comment-list');
    var commentChilderns = commentWrap.children;
    for (var i = 0; i < commentChilderns.length; i++) {
        commentChilderns[i].style.display = "block";
    }
    var show_button = document.getElementById('more-comments');
    show_button.style.display = "none";
}

// // ON SUBMIT
window.onload = function() {
    var reloading = sessionStorage.getItem("reloading");
    if (reloading) {
        sessionStorage.removeItem("reloading");
        fds_all_comments();
    }
}

// // Used on submit button
function fds_all_on_submit() {
    sessionStorage.setItem("reloading", "true");
    document.location.reload();
}

// // function fds_all_on_submit(){
// // document.addEventListener('DOMContentLoaded', function() {
// //     var commentWrap = document.getElementById('comment-list');
// //     var commentChilderns = commentWrap.children;
// //     for (var i = 0; i < commentChilderns.length; i++) {
// //         commentChilderns[i].style.display = "block";
// //     }
// // }, false);
// // }



// =============================================================================
// JQUERY SECTION
// =============================================================================

jQuery(document).ready(function($) {
    /* contact form submission */
    $('#FineDivContactForm').on('submit', function(e) {

        e.preventDefault();

        $('.has-error').removeClass('has-error');
        $('.js-show-feedback').removeClass('js-show-feedback');

        var form = $(this),
            name = form.find('#name').val(),
            topic = form.find('input[checked="checked"]').val(),
            email = form.find('#email').val(),
            message = form.find('#user-text-message').val(),
            ajaxurl = form.data('url');
        // console.log(topic);
        if (name === '') {
            $('#name').parent('.form-group').addClass('has-error');
            return;
        }

        if (email === '') {
            $('#email').parent('.form-group').addClass('has-error');
            return;
        }

        if (!topic) {
            $('.form-radio-group').addClass('has-error');
            return;
        }

        if (message === '') {
            $('#user-text-message').parent('.form-group').addClass('has-error');
            return;
        }

        form.find('input, input[type="radio"], button, #user-text-message').attr('disabled', 'disabled');
        $('.js-form-submission').addClass('js-show-feedback');

        $.ajax({

            url: ajaxurl,
            type: 'post',
            data: {

                name: name,
                topic: topic,
                email: email,
                message: message,
                action: 'FineDiv_save_user_contact_form'

            },
            error: function(response) {
                $('.js-form-submission').removeClass('js-show-feedback');
                $('.js-form-error').addClass('js-show-feedback');
                form.find('input, input[type="radio"], button, #user-text-message').removeAttr('disabled');
            },
            success: function(response) {
                if (response === 0) {

                    setTimeout(function() {
                        $('.js-form-submission').removeClass('js-show-feedback');
                        $('.js-form-error').addClass('js-show-feedback');
                        form.find('input, input, button, #user-text-message').removeAttr('disabled');
                    }, 1500);

                } else {

                    setTimeout(function() {
                        $('.js-form-submission').removeClass('js-show-feedback');
                        $('.js-form-success').addClass('js-show-feedback');
                        form.find('input', 'input', 'button', '#user-text-message').removeAttr('disabled').val('');
                    }, 1500);

                }
            }

        });

    });

    // NINJA FORMS
    jQuery(document).on('nfFormReady', function() {
        // $('.time-wrap').each(function() {
        //     var timeField = this.className; // Get the element class...
        //     console.log(timeField);
        //     if ($(this).hasClass('time-wrap')) {
        $('.time-wrap').closest('nf-fields').addClass('time-container');
        //     }
        // });
    });

});


//NINJA FORMS
jQuery(document).on('nfFormReady', function(e) {
    e.preventDefault();
    var tx = document.getElementsByTagName('textarea');
    for (var i = 0; i < tx.length; i++) {
        tx[i].setAttribute('style', 'height:' + (tx[i].scrollHeight) + 'px;overflow-y:hidden;');
        tx[i].addEventListener("input", OnInput, false);

    }

    function OnInput() {
        this.style.height = 'auto';
        this.style.height = (this.scrollHeight) + 'px';
    }
});