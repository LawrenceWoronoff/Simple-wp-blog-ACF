<?php
/**
 * Displays the site header.
 *
 * @package WordPress
 * @subpackage Twenty_Twenty_One
 * @since Twenty Twenty-One 1.0
 */

$wrapper_classes  = 'site-header';
$wrapper_classes .= has_custom_logo() ? ' has-logo' : '';
$wrapper_classes .= ( true === get_theme_mod( 'display_title_and_tagline', true ) ) ? ' has-title-and-tagline' : '';
$wrapper_classes .= has_nav_menu( 'primary' ) ? ' has-menu' : '';

?>
<div class="site-mobile-menu site-navbar-target">
    <div class="site-mobile-menu-header">
        <div class="site-mobile-menu-close"> <span class="icofont-close js-menu-toggle"></span> </div>
    </div>
    <div class="site-mobile-menu-body"></div>
</div>
<nav class="site-nav">
    <div class="container">
        <div class="site-navigation">
            <div class="row">
                <div class="col-md-6 text-center order-1 order-md-2 mb-3 mb-md-0"> <a href="<?= get_home_url()?>" class="logo m-0 text-uppercase">NewsPaper</a> </div>
                <div class="col-md-3 order-3 order-md-1">
                    <form action="#" class="search-form"> <span class="icon-search2"></span>
                        <input type="search" class="form-control" placeholder="Search..."> </form>
                </div>
                <div class="col-md-3 text-end order-2 order-md-3 mb-3 mb-md-0">
                    <div class="d-flex">
                        <ul class="list-unstyled social me-auto">
                            <li><a href="#"><span class="icon-twitter"></span></a></li>
                            <li><a href="#"><span class="icon-facebook"></span></a></li>
                            <li><a href="#"><span class="icon-instagram"></span></a></li>
                        </ul>
                        <a href="#" class="burger ms-auto float-end site-menu-toggle js-menu-toggle d-inline-block" data-toggle="collapse" data-target="#main-navbar"> <span></span> </a>
                    </div>
                </div>
            </div>
            <ul class="js-clone-nav d-none d-lg-inline-none text-start site-menu float-end">
                <li class="active"><a href="<?= get_home_url()?>">Home</a></li>
                <!-- <li class="has-children"> <a href="#">Categories</a>
                    <ul class="dropdown">
                        <li><a href="#">Travel</a></li>
                        <li><a href="#">Food</a></li>
                        <li><a href="#">Technology</a></li>
                        <li><a href="#">Business</a></li>
                        <li class="has-children"> <a href="#">Dropdown</a>
                            <ul class="dropdown">
                                <li><a href="#">Sub Menu One</a></li>
                                <li><a href="#">Sub Menu Two</a></li>
                                <li><a href="#">Sub Menu Three</a></li>
                            </ul>
                        </li>
                    </ul>
                </li> -->
                <!-- <li><a href="<?= get_home_url(). '/article-list'?>">Categories</a></li> -->
                <!-- <li><a href="#">Food</a></li>
                <li><a href="#">Technology</a></li>
                <li><a href="#">Business</a></li> -->
            </ul>
        </div>
    </div>
</nav>
<!-- #masthead -->