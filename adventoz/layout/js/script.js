/*global $, window*/

$(function () {
    'use strict';
    
    //scroll Function
    
    $(window).scroll(function () {
        var navbar = $('.navbar');
        if ($(window).scrollTop() >= navbar.height()) {
            navbar.addClass('scrolled');
        } else {
            navbar.removeClass('scrolled');
        }
    });
    
    //Active class
    
    $('.navbar li').click(function () {
       
        $('.navbar li').removeClass('active');
        
        $(this).addClass('active');
    });
    
    //smoothly scroll to element
    
    $('.navbar li a').click(function (e) {
        e.preventDefault();
        
        $('html, body').animate({
            scrollTop: $('#' + $(this).data('scroll')).offset().top
        }, 1000);
    });
});
