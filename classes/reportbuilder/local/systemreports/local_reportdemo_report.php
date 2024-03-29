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

namespace local_reportdemo\reportbuilder\local\systemreports;

use local_reportdemo\reportbuilder\local\entities\demoname;
use core_reportbuilder\system_report;

/**
 *
 * @package    local_reportdemo
 * @copyright  2023 Marcus Green
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class local_reportdemo_report extends system_report {
    /**
     * Initialise report, we need to set the main table, load our entities and set columns/filters
     */
    protected function initialise(): void {
        $demoentity = new demoname();
        $alias = $demoentity->get_table_alias('demonames');
        $this->add_entity($demoentity);
        $this->set_main_table('local_reportdemo_names', $alias);
        $this->add_filters_from_entities(['demoname:demo_firstname']);
        $this->add_columns();
    }

    /**
     * Validates access to view this report
     *
     * @return bool
     */
    protected function can_view(): bool {
        return true;
    }

    /**
     * Adds the columns we want to display in the report
     *
     * They are all provided by the entities we previously added in the {@see initialise} method, referencing each by their
     * unique identifier
     */
    protected function add_columns(): void {
        $columns = [
            'demoname:demo_firstname',
            'demoname:demo_lastname'
        ];
        $this->add_columns_from_entities($columns);
    }
}
