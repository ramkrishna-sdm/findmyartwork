"use strict";
function scroll_to_class(element_class, removed_height) {
    var scroll_to = $(element_class).offset().top - removed_height;
    if($(window).scrollTop() != scroll_to) {
        $('.form-wizard').stop().animate({scrollTop: scroll_to}, 0);
    }
}

function bar_progress(progress_line_object, direction) {
    var number_of_steps = progress_line_object.data('number-of-steps');
    var now_value = progress_line_object.data('now-value');
    var new_value = 0;
    if(direction == 'right') {
        new_value = now_value + ( 100 / number_of_steps );
    }
    else if(direction == 'left') {
        new_value = now_value - ( 100 / number_of_steps );
    }
    progress_line_object.attr('style', 'width: ' + new_value + '%;').data('now-value', new_value);
}

jQuery(document).ready(function() {
    
    /*
        Form
    */
    $('.form-wizard fieldset:first').fadeIn('slow');
    
    $('.form-wizard .required').on('focus', function() {
        $(this).removeClass('input-error');
    });
    
    // First step
    $('.first_step').on('click', function(e) {
        e.preventDefault();
        var main_image = $('#main_image').val();
        if($.trim(main_image) == ''){
            toastr.options.timeOut = 2500; // 2s
            toastr.error('Please Select the Artwork Image to Proceed');
            return false;
        }else{
          var cropped_img = $('#main_image').val();
          $('.img_preview').attr('src', cropped_img);
        }

        var parent_fieldset = $(this).parents('fieldset');
        var next_step = true;
        // navigation steps / progress steps
        var current_active_step = $(this).parents('.form-wizard').find('.form-wizard-step.active');
        var progress_line = $(this).parents('.form-wizard').find('.form-wizard-progress-line');
        
        // fields validation
        parent_fieldset.find('.required').each(function() {
            if( $(this).val() == "" ) {
                $(this).addClass('input-error');
                next_step = false;
            }
            else {
                $(this).removeClass('input-error');
            }
        });
        // fields validation
        
        if( next_step ) {
            parent_fieldset.fadeOut(400, function() {
                current_active_step.removeClass('active').addClass('activated').next().addClass('active');
                bar_progress(progress_line, 'right');
                $(this).next().fadeIn();
                scroll_to_class( $('.form-wizard'), 20 );
            });
        }
        
    });
    
    // Second step
    $('.second_step').on('click', function(e) {
        e.preventDefault();
        var title = $("input[name=title]").val();
        var description = $('textarea[name=description]').val();
        if($.trim(title) == ''){
            toastr.options.timeOut = 2500; // 2s
            toastr.error('Title is Required');
            return false;
        }
        if($.trim(description) == ''){
            toastr.options.timeOut = 2500; // 2s
            toastr.error('Description is Required');
            return false;
        }

        var parent_fieldset = $(this).parents('fieldset');
        var next_step = true;
        // navigation steps / progress steps
        var current_active_step = $(this).parents('.form-wizard').find('.form-wizard-step.active');
        var progress_line = $(this).parents('.form-wizard').find('.form-wizard-progress-line');
        
        // fields validation
        parent_fieldset.find('.required').each(function() {
            if( $(this).val() == "" ) {
                $(this).addClass('input-error');
                next_step = false;
            }
            else {
                $(this).removeClass('input-error');
            }
        });
        // fields validation
        if( next_step ) {
            parent_fieldset.fadeOut(400, function() {
                current_active_step.removeClass('active').addClass('activated').next().addClass('active');
                bar_progress(progress_line, 'right');
                $(this).next().fadeIn();
                scroll_to_class( $('.form-wizard'), 20 );
            });
        }
    });
    
    // Third step
    $('.third_step').on('click', function(e) {
        e.preventDefault();
        var category_id = $( "#category_id" ).val();
        var sub_category = $( "#sub_category" ).val();
        var style_id = $( "#style_id" ).val();
        var subject_id = $( "#subject_id" ).val();
        
        if($.trim(category_id) == ''){
            toastr.options.timeOut = 2500; // 2s
            toastr.error('Please Select Category');
            return false;
        }
        if($.trim(sub_category) == ''){
            toastr.options.timeOut = 2500; // 2s
            toastr.error('Please Select Sub-Category');
            return false;
        }
        if($.trim(style_id) == ''){
            toastr.options.timeOut = 2500; // 2s
            toastr.error('Please Select Style');
            return false;
        }
        if($.trim(subject_id) == ''){
            toastr.options.timeOut = 2500; // 2s
            toastr.error('Please Select Subject');
            return false;
        }

        var parent_fieldset = $(this).parents('fieldset');
        var next_step = true;
        // navigation steps / progress steps
        var current_active_step = $(this).parents('.form-wizard').find('.form-wizard-step.active');
        var progress_line = $(this).parents('.form-wizard').find('.form-wizard-progress-line');
        
        // fields validation
        parent_fieldset.find('.required').each(function() {
            if( $(this).val() == "" ) {
                $(this).addClass('input-error');
                next_step = false;
            }
            else {
                $(this).removeClass('input-error');
            }
        });
        // fields validation
        
        if( next_step ) {
            parent_fieldset.fadeOut(400, function() {
                current_active_step.removeClass('active').addClass('activated').next().addClass('active');
                bar_progress(progress_line, 'right');
                $(this).next().fadeIn();
                scroll_to_class( $('.form-wizard'), 20 );
            });
        }
    });
    
    // Final step
    $('.submit_artwork').on('click', function(e) {
        e.preventDefault();
        var album_text = [];
        // debugger;
        $("input[name='variant_type']:checked").each(function() {
            var value = $(this).val();
            if (value) {
              album_text.push(value);
              if(value == "original"){
                var width_original = $("input[name=width]").val();
                var height_original = $("input[name=height]").val();
                var price_original = $("input[name=price]").val();
                if($.trim(width_original) == null || $.trim(width_original) == '0' || $.trim(width_original) == "undefined"){
                  toastr.options.timeOut = 2500; // 2s
                  toastr.error('Width is Required');
                  return false;
                }
                if($.trim(height_original) == null){
                  toastr.options.timeOut = 2500; // 2s
                  toastr.error('Height is Required');
                  return false;
                }
                if($.trim(price_original) == null){
                  toastr.options.timeOut = 2500; // 2s
                  toastr.error('Price is Required');
                  return false;
                }
              }
              if(value == "limited_edition"){
                $("input[name='limited_width']").each(function() {
                  var limited_width = $(this).val();
                  if($.trim(limited_width) == null){
                    toastr.options.timeOut = 2500; // 2s
                    toastr.error('Width Field is Required in Limited Edition');
                    return false;
                  }
                })
                $("input[name='limited_height']").each(function() {
                  var limited_height = $(this).val();
                  if($.trim(limited_height) == null){
                    toastr.options.timeOut = 2500; // 2s
                    toastr.error('Height Field is Required in Limited Edition');
                    return false;
                  }
                })
                $("input[name='limited_price']").each(function() {
                  var limited_price = $(this).val();
                  if($.trim(limited_price) == null){
                    toastr.options.timeOut = 2500; // 2s
                    toastr.error('Price Field is Required in Limited Edition');
                    return false;
                  }
                })
              }
              if(value == "art_paint"){
                $("input[name='art_width']").each(function() {
                  var art_width = $(this).val();
                  if($.trim(art_width) == null){
                    toastr.options.timeOut = 2500; // 2s
                    toastr.error('Width Field is Required in Art Paints');
                    return false;
                  }
                })
                $("input[name='art_height']").each(function() {
                  var art_height = $(this).val();
                  if($.trim(art_height) == null){
                    toastr.options.timeOut = 2500; // 2s
                    toastr.error('Height Field is Required in Art Paints');
                    return false;
                  }
                })
                $("input[name='art_price']").each(function() {
                  var art_price = $(this).val();
                  if($.trim(art_price) == null){
                    toastr.options.timeOut = 2500; // 2s
                    toastr.error('Price Field is Required in Art Paints');
                    return false;
                  }
                })
              }
            }
        });
        // alert(album_text);
        // if (album_text.length === 0) {
        //     toastr.options.timeOut = 2500; // 2s
        //     toastr.error('Please Select Variant Type');
        //     return false;
        // }else{
        //   alert("MKL");
        //   return false;
        // }

        // var parent_fieldset = $(this).parents('fieldset');
        // var next_step = true;
        // // navigation steps / progress steps
        // var current_active_step = $(this).parents('.form-wizard').find('.form-wizard-step.active');
        // var progress_line = $(this).parents('.form-wizard').find('.form-wizard-progress-line');
        
        // // fields validation
        // parent_fieldset.find('.required').each(function() {
        //     if( $(this).val() == "" ) {
        //         $(this).addClass('input-error');
        //         next_step = false;
        //     }
        //     else {
        //         $(this).removeClass('input-error');
        //     }
        // });
        // // fields validation
        
        // if( next_step ) {
        //     parent_fieldset.fadeOut(400, function() {
        //         current_active_step.removeClass('active').addClass('activated').next().addClass('active');
        //         bar_progress(progress_line, 'right');
        //         $(this).next().fadeIn();
        //         scroll_to_class( $('.form-wizard'), 20 );
        //     });
        // }
    });
    // previous step
    $('.form-wizard .btn-previous').on('click', function() {
        // navigation steps / progress steps
        var current_active_step = $(this).parents('.form-wizard').find('.form-wizard-step.active');
        var progress_line = $(this).parents('.form-wizard').find('.form-wizard-progress-line');
        
        $(this).parents('fieldset').fadeOut(400, function() {
            // change icons
            current_active_step.removeClass('active').prev().removeClass('activated').addClass('active');
            // progress bar
            bar_progress(progress_line, 'left');
            // show previous step
            $(this).prev().fadeIn();
            // scroll window to beginning of the form
            scroll_to_class( $('.form-wizard'), 20 );
        });
    });
    
    // submit
    $('.form-wizard').on('submit', function(e) {
        
        // fields validation
        $(this).find('.required').each(function() {
            if( $(this).val() == "" ) {
                e.preventDefault();
                $(this).addClass('input-error');
            }
            else {
                $(this).removeClass('input-error');
            }
        });
        // fields validation
        
    });
    
    
});





// image uploader scripts 

var $dropzone = $('.image_picker'),
    $droptarget = $('.drop_target'),
    $dropinput = $('#inputFile'),
    $dropimg = $('.image_preview'),
    $remover = $('[data-action="remove_current_image"]');

$dropzone.on('dragover', function() {
  $droptarget.addClass('dropping');
  return false;
});

$dropzone.on('dragend dragleave', function() {
  $droptarget.removeClass('dropping');
  return false;
});

$dropzone.on('drop', function(e) {
  $droptarget.removeClass('dropping');
  $droptarget.addClass('dropped');
  $remover.removeClass('disabled');
  e.preventDefault();
  
  var file = e.originalEvent.dataTransfer.files[0],
      reader = new FileReader();

  reader.onload = function(event) {
    $dropimg.css('background-image', 'url(' + event.target.result + ')');
  };
  
  console.log(file);
  reader.readAsDataURL(file);

  return false;
});

$dropinput.change(function(e) {
  $droptarget.addClass('dropped');
  $remover.removeClass('disabled');
  $('.image_title input').val('');
  
  var file = $dropinput.get(0).files[0],
      reader = new FileReader();
  
  reader.onload = function(event) {
    $dropimg.css('background-image', 'url(' + event.target.result + ')');
  }
  
  reader.readAsDataURL(file);
});

$remover.on('click', function() {
  $dropimg.css('background-image', '');
  $droptarget.removeClass('dropped');
  $remover.addClass('disabled');
  $('.image_title input').val('');
});

$('.image_title input').blur(function() {
  if ($(this).val() != '') {
    $droptarget.removeClass('dropped');
  }
});

// image uploader scripts