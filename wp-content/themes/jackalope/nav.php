<?php
/**
 * The Template for the nav
 *
 * Methods for TimberHelper can be found in the /functions sub-directory
 *
 * @package  WordPress
 * @subpackage  Timber
 * @since    Timber 0.1
 */

$context = Timber::get_context();
$context['jackalope_bust_nav'] = 'THE IMAGE';
Timber::render('base.twig', $context);
