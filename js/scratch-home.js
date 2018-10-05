/*
 * Theme Customization
 * 
 * @package Scratch
 * @author Mary Weise
 * @link https://marydoesdev.com
 * @copyright Copyright (c) 2018, Mary Weise
 * @license GPL-2.0+
 */

jQuery(document).ready(function($) {
    var slides = $(".slides li");
    slides.each(function(li){
        var link = $(this).find('a').attr('href');
        $(this).find('p').after('<a class="slider-button" role="button">More Details &rsaquo;</a>');
        $(this).find('.slider-button').attr('href', link);
//        console.log(link); //debug
    });
});
