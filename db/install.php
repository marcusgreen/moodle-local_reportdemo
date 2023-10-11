<?php
// This file is part of Moodle - http://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <http://www.gnu.org/licenses/>.

/**
 * Demonstration of Moodle 4.X reportbuilder
 *
 * @package     local_reportdemo
 * @copyright   2023 Marcus Green
 * @license     https://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

function xmldb_local_reportdemo_install() {
    global $DB;
    $data = (object) ['demo_firstname' => 'Albert', 'demo_lastname' => 'Brown'];
    $DB->insert_record('local_reportdemo_names', $data );
    $data = (object) ['demo_firstname' => 'Michael', 'demo_lastname' => 'Sturbs'];
    $DB->insert_record('local_reportdemo_names', $data );
}
