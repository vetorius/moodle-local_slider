<?php

/**
 * This file is part of Moodle - http://moodle.org/
 *
 * Moodle is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * Moodle is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with Moodle.  If not, see <http://www.gnu.org/licenses/>.
 */

/**
 * insertslider page
 *
 * @package    local_slider
 * @author     Víctor M. Sanchez
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

require_once(__DIR__. '/../../config.php');
require_once(__DIR__. '/classes/form/insertslider.php');

global $DB;

$PAGE->set_url(new moodle_url('/local/slider/insertslider.php'));
$PAGE->set_context(\context_system::instance());
$PAGE->set_title('Insertar nuevo slider');

require_login();

// initialize the form
$mform = new insertslider_form();


//Form processing and displaying is done here
if ($mform->is_cancelled()) {
    //Go back to main page
    redirect($CFG->wwwroot . '/local/slider/insertslider.php', 'Has cancelado la creación del slider');

} else if ($fromform = $mform->get_data()) {
    //insert the data into the database
    $recordtoinsert = new stdClass();
    $recordtoinsert->name = $fromform->name;
    $recordtoinsert->data = $fromform->data;

    $DB->insert_record('local_slider', $recordtoinsert);

    redirect($CFG->wwwroot . '/local/slider/insertslider.php', 'Datos insertados');
    
}

echo $OUTPUT->header();

//displays the form
$mform->display();

echo $OUTPUT->footer();