/*global $, confirm*/
$(function () {

    "use strict";

    // Dashboard

    $('.toggle-info').click(function () {

        $(this).toggleClass('selected').parent().next('.panel-body').fadeToggle(100);

        if ($(this).hasClass('selected')) {

            $(this).html('<i class="fa fa-minus fa-lg"></i>')
        } else {
            $(this).html('<i class="fa fa-plus fa-lg"></i>')
        }

    });


    // Show & Hide button From dashboard page

    $('.comment-box .member-c').hover(function () {

            'use strict';

        $('.comment-box .js-hide').slideDown(500);

        $('.comment-box .member-c').click(function () {

        $('.comment-box .js-hide').slideUp(800);

     });
    });



    /* =========================================================================== */

    // Hide PlaceHolder on focus

    $('[placeholder]').focus(function () {

        $(this).attr('data-text', $(this).attr('placeholder'));
        $(this).attr('placeholder', ' ');
    }).blur(function () {

        $(this).attr('placeholder', $(this).attr('data-text'));
    });

    // Add Asterisk On Required Field

    $('input').each(function () {

        if ($(this).attr('required') === 'required') {

            $(this).after("<span class='asterisk'>*</span>");

        }

    });

    /* =========================================================================== */

    // Show Password When I Hover On Icon Eye

    var passField = $('.password');

    $('.show-pass').hover(function () {

        passField.attr('type', 'text');

    }, function () {

        passField.attr('type', 'password');
    });


    /* =========================================================================== */

    // Confirmation With Button special('Delet')

    $('.confirm').click(function () {

        return confirm('Are You Sure....??');

    });


    /* =========================================================================== */

    // Category View Option

    $('.cat h3').click(function () {

        $(this).next('.full-view').fadeToggle();
    });

    $('.option span').click(function () {

        $(this).addClass('active').siblings('span').removeClass('active');

        if ($(this).data('view') === 'full') {

            $('.cat .full-view').fadeIn(200);

        } else {

            $('.cat .full-view').fadeOut(200);
        }
    });


    // Show Delete Button On Child Cats

    $(".child-link").hover(function () {

        $(this).find('.show_remove').fadeIn(400);

    }, function () {

        $('.show_remove').find('.show_remove').fadeOut(400);
    });


});

var data = [
      { y: '2014', a: 50, b: 90},
      { y: '2015', a: 65,  b: 75},
      { y: '2016', a: 50,  b: 50},
      { y: '2017', a: 75,  b: 60},
      { y: '2018', a: 80,  b: 65},
      { y: '2019', a: 90,  b: 70},
      { y: '2020', a: 100, b: 75},
      { y: '2021', a: 115, b: 75},
      { y: '2022', a: 120, b: 85},
      { y: '2023', a: 145, b: 85},
      { y: '2024', a: 160, b: 95}
    ],
    config = {
      data: data,
      xkey: 'y',
      ykeys: ['a', 'b'],
      labels: ['Total Income', 'Total Outcome'],
      fillOpacity: 0.6,
      hideHover: 'auto',
      behaveLikeLine: true,
      resize: true,
      pointFillColors:['#ffffff'],
      pointStrokeColors: ['black'],
      lineColors:['gray','red']
  };
config.element = 'area-chart';
Morris.Area(config);
Morris.Donut({
  element: 'pie-chart',
  data: [
    {label: "Friends", value: 30},
    {label: "Allies", value: 15},
    {label: "Enemies", value: 45},
    {label: "Neutral", value: 10}
  ]
});
