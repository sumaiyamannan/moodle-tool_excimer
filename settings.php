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
 * Plugin administration pages are defined here.
 *
 * @package   tool_excimer
 * @author    Nigel Chapman <nigelchapman@catalyst-au.net>
 * @copyright 2021, Catalyst IT
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

if ($hassiteconfig) {

    $ADMIN->add('tools', new admin_externalpage(
        'toolexcimer',
        get_string('pluginname', 'tool_excimer'),
        "$CFG->wwwroot/$CFG->admin/tool/excimer/index.php",
        'moodle/role:manage'
    ));

    $settings = new admin_settingpage(
        'tool_excimer',
        get_string('pluginname', 'tool_excimer')
    );
    $ADMIN->add('tools', $settings);

    $settings->add(new admin_setting_configcheckbox(
        'tool_excimer/excimerenable',
        new lang_string('excimerenable', 'tool_excimer'),
        '',
        1
    ));

    $settings->add(new admin_setting_configduration(
        'tool_excimer/excimerexpiry_s',
        new lang_string('excimerexpiry_s', 'tool_excimer'),
        '',
        7 * 24 * 3600
    ));

    $settings->add(new admin_setting_configtext(
        'tool_excimer/excimersample_ms',
        new lang_string('excimerperiod_ms', 'tool_excimer'),
        '',
        '100'
    ));

    $settings->add(new admin_setting_configtext(
        'tool_excimer/excimertrigger_ms',
        new lang_string('excimerrequest_ms', 'tool_excimer'),
        '',
        '100'
    ));

    /**
     * No filtering yet.
     * Check in core_profiling.
     *

    $settings->add(new admin_setting_configtextarea(
        'tool_excimer/excimeruri_contains',
        new lang_string('excimeruri_contains', 'tool_excimer'),
        '',
        '',
        PARAM_RAW,
        '50',
        '10'
    ));

    $settings->add(new admin_setting_configtextarea(
        'tool_excimer/excimeruri_contains_not',
        new lang_string('excimeruri_not_contains', 'tool_excimer'),
        new lang_string('excimeruri_patterns_help', 'tool_excimer'),
        '',
        PARAM_RAW,
        '50',
        '10'
    ));

     *
     */

}