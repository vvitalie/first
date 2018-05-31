// JavaScript Document
(function ($) {
    'use strict';

    //call function
    var ikstartsmart = {
        iss_initReady : function() {
            this.iss_eventResize();
            this.iss_mmenu();
            this.iss_paket();
            this.iss_validate();
            this.iss_datepicker();
            // this.iss_moreButton();
            this.iss_fileOpen();
            this.single_coach_tabs();
            this.iss_single_post_agenda();
            this.iss_data_background();
            this.iss_agenda_single_thuambnail();
            this.iss_agenda_single_carousel();
            this.iss_single_agenda_carousel();
        },
        iss_initLoad : function () {
            this.iss_loader();
            this.iss_dropkick();
            this.iss_coacheTop();
            this.iss_flexMap();
            this.iss_coacheImage();
        },
        iss_search_filter : function () {
            this.iss_coaches_filter();
        },
        iis_fiter_toggle: function() {
            $(document).on('click', '.searchandfilter > ul > li', function(e) {
                var $target = $(e.target),
                    $this = $(this);
                if($target.is('h4')) {
                    $this.toggleClass('active');
                }
            });
        },
        iss_coacheImage: function() {
            var $coacheImage = $('.coacheBottomImage');

            if($coacheImage.length) {
                var $image = $coacheImage.find('img');

                $image.css({
                    'width' : '',
                    'height' : ''
                });

                var imageHeight = $image.height(),
                    imageWidth = $image.width();

                if( imageHeight > imageWidth ) {
                    $image.css({
                        'width' : '100%'
                    });
                }else {
                    $image.css({
                        'height' : '100%'
                    });
                }
            }

        },
        iss_fileOpen: function() {
            $('.ginput_container_post_image span').closest('span').append('<span class="btn-title">Browse</span>');
            $('.ginput_container_post_image input').on('change', function(){
                $(this).closest('span').find('.btn-title').html($(this).prop('files')[0]['name']);

            });
        },
        iss_moreButton: function() {
            var $buttonMore = $('.link-more');

            $buttonMore.on('click touch', function(){

                var $this = $(this),
                    $thisHide = $this.prev('.hideReviews');

                $thisHide.stop(true, true).slideToggle(500);
                $this.find('.fa').toggleClass('fa-chevron-down fa-chevron-up');

                if( $this.find('.fa').is('.fa-chevron-up') ) {
                    $this.find('span').html('Minder weergeven');
                }else {
                    $this.find('span').html('Meer tonen');
                }

                return false;

            });
        },
        iss_coacheTop: function() {

            var that = this,
                wwObj = that.iss_windowWidth();


            if( wwObj.windowWidth > 767 ){
                var $coacheTop = $('.coacheTop'),
                    coacheTopHeight = $coacheTop.outerHeight(),
                    coacheTopPaddingTop = $coacheTop.css('paddingTop');

                coacheTopPaddingTop = parseInt(coacheTopPaddingTop);

                var coacheRightMargin = coacheTopHeight - coacheTopPaddingTop;

                $('.coacheBottom .coacheRight').css({
                    'margin-top' : -coacheRightMargin+'px'
                });
            }else {
                $('.coacheBottom .coacheRight').css({
                    'margin-top' : ''
                });
            }


        },
        iss_datepicker: function() {

            var $datepicker = $('.datepicker');

            if( $datepicker.length ) {
                $datepicker.find('input').datepicker({
                    "dateFormat" : 'dd/mm/yy',
                    onSelect: function () {
                        $(this).trigger('blur');
                    }
                });
            }

        },
        iss_validate: function() {
            var $flyValidation = $('.flyValidation');

            $('.sf-input-select').dropkick({
                mobile: true
            });

            $('.gfield_select').dropkick({
                mobile: true
            });

            $.validator.addMethod("australianDate", function(value, element) {
                    // put your own logic here, this is just a (crappy) example
                    return value.match(/^\d\d?\/\d\d?\/\d\d\d\d$/);
                },
                "Please enter a date in the format dd/mm/yyyy."
            );

            $.validator.addMethod('customphone', function (value, element) {
                return this.optional(element) || /[0-9]+/.test(value);
            }, "Please enter a valid phone number");

            $.validator.addMethod("zipcode", function(value, element) {
                return this.optional(element) || /^\d{4} ?[a-z]{2}$/i.test(value);
            }, "Please provide a valid zipcode.");

            $.validator.addMethod("valueNotEquals", function(value, element, arg){
                // I use element.value instead value here, value parameter was always null

                return arg != element.value;
            }, "Value must not equal arg.");


            var validationFields = {
                validateName:{
                    required: true,
                    minlength: 2,
                    maxlength: 50
                },
                validateTitle:{
                    required: true,
                    minlength: 2,
                    maxlength: 50
                },
                validateDate:{
                    required: true,
                    australianDate : true
                },
                validateAddress:{
                    required: true,
                    minlength: 2,
                    maxlength: 50
                },
                validateZip:{
                    required: true,
                    zipcode: true
                },
                validateCity:{
                    required: true,
                    minlength: 2,
                    maxlength: 50
                },
                validatePhone:{
                    required: true,
                    customphone: true,
                    maxlength: 12,
                    minlength: 12
                },
                validateEmail:{
                    required: true,
                    email: true,
                    minlength: 6,
                    maxlength: 50
                },
                validateNumber: {
                    required: true,
                    number: true,
                    minlength: 1,
                    maxlength: 1
                },
                validateDescription: {
                    required: true,
                    minlength: 2,
                    maxlength: 255
                },
                validateCoache: {
                    required: true,
                    valueNotEquals: "Kies een naam"
                },
                validateTariff: {
                    required: true,
                    valueNotEquals: "Kies je programma"
                },
                validateRegion: {
                    required: true,
                    valueNotEquals: "Kies een provincie"
                }
            };

            for(var i = 0; i < $flyValidation.length; i++){

                var flyValidationId = $flyValidation.eq(i).attr('id');

                var validateOptions = {};

                for( var key in validationFields ) {

                    var $validateField = $('#'+flyValidationId),
                        $validateFieldContainer = $validateField.find('.ginput_container'),
                        $validateRow = $validateFieldContainer.closest('.gfield'),
                        validateName = '';

                    for( var j = 0; j < $validateFieldContainer.length; j++ ) {
                        var $thisValidateRow = $validateRow.eq(j);
                        if($thisValidateRow.is('.'+key)) {

                            $thisValidateRow.addClass('validateRow');

                            if( $thisValidateRow.find('.ginput_container').is('.ginput_container_select') ) {
                                validateName = $thisValidateRow.find('select').attr('name');
                                //console.log('select');
                            }else if( $thisValidateRow.find('.ginput_container').is('.ginput_container_textarea') ) {
                                validateName = $thisValidateRow.find('textarea').attr('name');
                                // console.log('textarea');
                            }else {

                                validateName = $thisValidateRow.find('input').attr('name');

                                //console.log('input');
                            }

                            validateOptions[validateName] = validationFields[key];
                        }
                    }
                }


                var selectedOptionHtml =  $('#'+flyValidationId).find('.dk-option-selected').html(),
                    selectedHtml = $('#'+flyValidationId).find('.dk-selected').html();

                if(selectedOptionHtml == selectedHtml) {
                    $('#'+flyValidationId).find('.dk-selected ').addClass('gf_placeholder');
                }


                //console.log(validateOptions);

                if(Object.keys(validateOptions).length) {
                    $('#'+flyValidationId).validate({
                        rules: validateOptions,
                        highlight: function(element) {
                            if($(element).closest('.gfield').is('.validateRow')) {
                                // console.log('error');
                                if($(element).closest('.ginput_container').is('.ginput_container_select')) {
                                    $(element).closest('.gfield').find('.dk-selected').addClass('gf_placeholder');
                                }
                                $(element).closest('.gfield').addClass("error").removeClass('success');
                            }
                        },
                        unhighlight: function(element) {
                            if($(element).closest('.gfield').is('.validateRow')) {
                                //console.log('success');
                                $(element).closest('.gfield').removeClass("error").addClass('success');
                            }
                        }
                    });
                }

                $('.validateRow .ginput_container_select select').on('change', function(){
                    // console.log('change');
                    $(this).trigger('blur');
                });

            }
        },
        iss_dropkick: function() {


            if( !$('.gfield_select').prev().is('.dk-select' ) ) {
                $('.gfield_select').dropkick({
                    mobile: true
                });
            }

            if( $('.clear-multi').length ) {
                if( !$('.clear-multi').find('.ginput_container_date select').prev().is('.dk-select' ) ) {
                    $('.clear-multi').find('.ginput_container_date select').dropkick({
                        mobile: true
                    });
                }
            }

            $(document).on('gform_post_render', function(){
                $('.gfield_select').dropkick({
                    mobile: true
                });
                $('.clear-multi').find('.ginput_container_date select').dropkick({
                    mobile: true
                });
            });

        },
        iss_paket: function() {
            var $topForm = $('.topPromoForm');

            if( $topForm.length ) {
                var $topFormSelect = $topForm.find('select');

                $topFormSelect.on('change', function(){

                    var $this = $(this),
                        thisVal = $this.val();

                    if( thisVal != 'Overijssel' && thisVal != '' ) {
                        $('.columnContent6:last').css({
                            'display' : 'none'
                        });
                    }else {
                        $('.columnContent6:last').css({
                            'display' : 'block'
                        });
                    }

                });
            }

        },
        iss_flexMap: function() {

            var $contactsPage = $('.page-template-tpl-contact'),
                $flexMap = $contactsPage.find('div.flxmap-container');

            if($contactsPage.length) {

                if($flexMap.length) {

                    var flxmapName = jQuery("div.flxmap-container").attr("data-flxmap");

                    var $contentLeft = $contactsPage.find('.leftContent'),
                        $sidebar = $contactsPage.find('.rightContent');

                    if($contentLeft.length && $sidebar.length) {



                        var contentLeftTop = $contentLeft.offset().top,
                            sidebarTop = $sidebar.offset().top;

                        if( contentLeftTop == sidebarTop ) {

                            //console.log('here');

                            var mapHeight = $flexMap.height(),
                                rowHeight = $flexMap.closest('.gRow').height(),
                                sidebarHeight = $sidebar.height();

                            var resultHeight = sidebarHeight - mapHeight;

                            resultHeight = rowHeight - resultHeight;

                            $flexMap.css({
                                'height' : resultHeight+'px'
                            });

                        } else {
                            $flexMap.css({
                                'height' : '400px'
                            });
                        }


                    }else {
                        $flexMap.css({
                            'height' : '400px'
                        });
                    }

                    var flxmap = window[flxmapName];

                    var map = flxmap.getMap();
                    google.maps.event.addListener(map, "idle", function(){
                        google.maps.event.trigger(map, 'resize');
                    });

                }
            }
        },
        iss_mmenu: function () {
            //mobilemenu
            var that = this;
            var $desktopMenu = $("#menu-main-menu"),
                $question = $('.headerQuestion');

            var mobileQuestion = $question.clone();

            $desktopMenu.find('.current-menu-item').parents('li').addClass('current-menu-item');

            var mobileMenu = $desktopMenu.clone(),
                $mobileMenuLi = mobileMenu.find('li'),
                mobileMenuLi_length = $mobileMenuLi.length;

            for (var i = 0; i < mobileMenuLi_length; i++) {
                var $thisLi = $mobileMenuLi.eq(i);
                if ($thisLi.is('.current-menu-item')) {
                    $thisLi.removeAttr("class").addClass('active');
                } else {
                    $thisLi.removeAttr("class");
                }

                $thisLi.removeAttr("id");
            }

            mobileMenu.appendTo("#mobilemenu");


            $("#mobilemenu").mmenu({
                "offCanvas": {
                    "zposition": "front"
                }
            });

            mobileQuestion.appendTo(".mm-current");
        },
        single_coach_tabs: function () {
            var $coach_tabs = $('.coach-tabs'),
                $ul = $coach_tabs.find('ul'),
                $li = $ul.find('li');

            $li.click(function(){
                var tab_id = $(this).attr('data-tab');

                $('ul.tabs li').removeClass('current');
                $('.tab-content').removeClass('current');

                $(this).addClass('current');
                $("#"+tab_id).addClass('current');
            });
        },
        iss_single_post_agenda: function () {
            var $tpl_agenda = $('.page-template-tpl-agenda'),
                $agenda = $tpl_agenda.find('.agenda'),
                $post = $agenda.find('.post');

            $post.each(function() {
                var $this = $(this),
                    $thumbnail = $this.find('.thumbnail'),
                    $img = $thumbnail.find('img'),
                    $img_height = $img.outerHeight(),
                    $img_width = $img.outerWidth();

                if($img_height > $img_width){
                    $thumbnail.addClass('tall');
                } else if($img_height < $img_width){
                    $thumbnail.addClass('wide');
                }
            });
        },
        iss_agenda_single_thuambnail: function () {
            var $agenda_top = $('.agenda-top'),
                $left = $agenda_top.find('.left'),
                $left_height = $left.outerHeight(),
                $right = $agenda_top.find('.right');

            $right.css({'height': $left_height + 'px'});
        },
        iss_agenda_single_carousel: function () {
            var $posts = $('.ag-sng-posts');

            $posts.addClass('owl-carousel');
            if($posts.length){
                $posts.owlCarousel({
                    loop:true,
                    margin: 30,
                    navText:[
                        '<i class="fa fa-chevron-left" aria-hidden="true"></i>',
                        '<i class="fa fa-chevron-right" aria-hidden="true"></i>'
                    ],
                    dots: false,
                    items: 3,
                    autoplay: false,
                    mouseDrag: false,
                    responsive:{
                        0:{
                            items:1,
                            nav:true
                        },
                        767:{
                            items:1,
                            nav:true
                        },
                        1025:{
                            items:3,
                            nav:true
                        }
                    }
                });
            }
        },
        iss_single_agenda_carousel: function () {
            var $tpl_agenda = $('.single-agenda'),
                $agenda = $tpl_agenda.find('.ag-sng-posts'),
                $owl_item = $agenda.find('.owl-item');

            $owl_item.each(function() {
                var $this = $(this),
                    $post = $this.find('.post'),
                    $thumbnail = $post.find('.thumbnail'),
                    $img = $thumbnail.find('img'),
                    $img_height = $img.outerHeight(),
                    $img_width = $img.outerWidth();

                if($img_height > $img_width){
                    $thumbnail.addClass('tall');
                } else if($img_height < $img_width){
                    $thumbnail.addClass('wide');
                }
            });
        },
        iss_data_background: function () {
            var $dataBackground = $('[data-background]'),
                dataBackground_length = $dataBackground.length;

            if( dataBackground_length ) {

                for( var i = 0; i < dataBackground_length; i++ ) {

                    var $this = $dataBackground.eq(i),
                        background = $this.data('background');

                    $this.css({
                        'background-image':'url('+background+')'
                    });
                    $this.removeAttr('data-background');
                }
            }
        },
        iss_coaches_filter: function () {
            var $coaches = $('.filtered'),
                $children = $coaches.find('.children');

            $children.parent().addClass('parent');
        },
        iss_loader: function() {
            $('.sk-three-bounce').addClass('loaded');
        },
        iss_scrollControl: function() {
            var scObj = {
                scrollControl: 0
            };

            scObj.scrollControl = $(window).scrollTop();

            return scObj;
        },
        iss_windowWidth: function () {
            //Check browser scroll type
            var wwObj = {
                windowWidth: 0
            };

            wwObj.windowWidth = window.innerWidth;

            return wwObj;
        },
        iss_eventResize: function() {
            //Events call
            var that = this;
            $(window).on("resize", function(){
                that.iss_coacheTop();
                that.iss_flexMap();
                that.iss_agenda_single_thuambnail();
            });
        }
    };


    $(document).ready(function(){
        ikstartsmart.iss_initReady();
    });

    $(window).load(function() {
        ikstartsmart.iss_initLoad();
    });
    $(document).on("sf:init", ".searchandfilter", function(){
        ikstartsmart.iss_search_filter();
        ikstartsmart.iis_fiter_toggle();
    });
    $(document).on("sf:ajaxfinish", ".searchandfilter", function(){
        ikstartsmart.iss_search_filter();
        ikstartsmart.iss_single_post_agenda();
        $("select").dropkick({
            mobile: true
        });
    });
    // ACF / Search&filter pro filter
    $(document).ready(function(){
        // var i;
        // var count = 1;
        // for (i = 1; i < 5; i++) {
        //
        //     $('.sf-field-post-meta-knowledge_' + count + '_title').hide();
        //     var options =  $('.sf-field-post-meta-knowledge_' + count + '_title select > option:not(:first-child)').clone();
        //     var optionsList =  $('.sf-field-post-meta-knowledge_' + count + '_title ul > li:not(:first-child)').clone();
        //
        //     $('.sf-field-post-meta-knowledge_0_title select').append(options);
        //     $('.sf-field-post-meta-knowledge_0_title ul').append(optionsList);
        //     count++;
        // }
        //
        // $('.dk-option').click(function () {
        //     var selectedOption =  $(this).attr('data-value');
        //     $(".sf-input-select option").filter(function() {
        //         return $(this).val() === selectedOption;
        //     }).prop('selected', true).change();
        // });
        //
        // $('li.dk-option-selected').each(function () {
        //     var selectedOption = $(this).last().text();
        //     var optionLabel = $(this).parent().prev('div.dk-selected');
        //     $(optionLabel).text(selectedOption);
        //     console.log(selectedOption);
        // });
        // //  order alphabetically
        // var options = $("#dk1-listbox li");
        // options.detach().sort(function(a,b) {
        //     var at = $(a).text();
        //     var bt = $(b).text();
        //     return (at > bt)?1:((at < bt)?-1:0);
        // });
        // options.appendTo("#dk1-listbox");

    });
}(jQuery));
