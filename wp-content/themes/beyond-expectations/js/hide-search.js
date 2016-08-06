/*
================================================================================================
Beyond Expectations - hide-search.js
================================================================================================
This is the most generic template file in a WordPress theme and is one of required files to hide
and show the Search Toggle Navigation.

@package        Beyond Expectations WordPress Theme
@copyright      Copyright (C) 2016. Benjamin Lu
@license        GNU General Public License v2 or later (http://www.gnu.org/licenses/gpl-2.0.html)
@author         Benjamin Lu (http://ninjablume.com/contact/
@since          0.0.1
================================================================================================
*/
jQuery(document).ready(function($){
    $(".search-toggle").click(function(){
        $("#search-container").slideToggle('slow', function(){
            $(".search-toggle").toggleClass('active');
        });
    });
});
