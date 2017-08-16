<?php

/**
 * This file allow to create roles and capabilities.
 *
 * @author Nicolas TORION
 * @package badges-issuer-for-wp
 * @subpackage includes/initialisation
 * @since 1.0.0
*/

/*
Add capabilities to the existing roles.
*/

function add_passports_capabilities() {
    // ADMINISTRATOR ROLE
    $admin = get_role('administrator');

    $admin->add_cap('edit_passport');
    $admin->add_cap('edit_passports');
    $admin->add_cap('edit_other_passports');
    $admin->add_cap('edit_published_passports');
    $admin->add_cap('publish_passports');
    $admin->add_cap('read_passport');
    $admin->add_cap('read_passports');
    $admin->add_cap('read_private_passports');
    $admin->add_cap('delete_passport');
}

add_action( 'init', 'add_passports_capabilities');

?>
