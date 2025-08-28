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

declare(strict_types=1);

namespace local_reportdemo\reportbuilder\datasource;
use local_reportdemo\reportbuilder\local\entities\demoname;
use core_reportbuilder\datasource;

/**
 * Demo names datasource for custom reports.
 *
 * @package     local_reportdemo
 * @copyright   2023 Marcus Green
 * @license     http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class demonames extends datasource {

    /**
     * Return user friendly name of the datasource
     *
     * @return string
     */
    public static function get_name(): string {
        return get_string('demonames', 'local_reportdemo');
    }

    /**
     * Initialise report
     */
    protected function initialise(): void {
        $demonamesentity = new demoname();
        $demonamestablealias = $demonamesentity->get_table_alias('demonames');
        $this->set_main_table('local_reportdemo_names', $demonamestablealias);
        $this->add_entity($demonamesentity);

        // Add all columns/filters/conditions from entities to be available in custom reports.
        $this->add_all_from_entities();
    }

    /**
     * Return the columns that will be added to the report as part of default setup
     *
     * @return string[]
     */
    public function get_default_columns(): array {
        return [
            'local_reportdemo_names:id',
            'local_reportdemo_names:demo_firstname',
            'local_reportdemo_names:demo_lastname',
        ];
    }

    /**
     * Return the filters that will be added to the report once is created
     *
     * @return string[]
     */
    public function get_default_filters(): array {
        return ['local_reportdemo_names:demo_firstname', 'local_reportdemo_names:demo_lastname'];
    }

    /**
     * Return the conditions that will be added to the report once is created
     *
     * @return string[]
     */
    public function get_default_conditions(): array {
        return [];
    }

    /**
     * Return the default sorting that will be added to the report once it is created
     *
     * @return array|int[]
     */
    public function get_default_column_sorting(): array {
        return [
            'local_reportdemo_names:demo_lastname' => SORT_ASC,
        ];
    }
}
