<?php
/**
 * CsvImport plugin
 *
 * Configuring the plugin:  Set the proper settings in config.ini 
 * like so:
 *
 * <code>
 * plugins.CsvImport.columnDelimiter = ","
 * plugins.CsvImport.memoryLimit = "128M"
 * plugins.CsvImport.requiredExtension = "txt"
 * plugins.CsvImport.requiredMimeType = "text/csv"
 * plugins.CsvImport.maxFileSize = "10M"
 * plugins.CsvImport.fileDestination = "/tmp"
 * </code>
 * 
 * All of the above settings are optional.  If not given, CsvImport uses the 
 * following default values:
 *
 * memoryLimit = current script limit
 * requiredExtension = "txt" or "csv"
 * requiredMimeType = "text/csv"
 * maxFileSize = current system upload limit
 * fileDestination = current system temporary dir (via sys_get_temp_dir())
 *
 *
 * Set a high memory limit to avoid memory allocation issues with imports.  
 * Examples include 128M, 1G, and -1.  This will set PHP's memory_limit setting 
 * directly, see PHP's documentation for more info on formatting this number.  
 * Be advised that many web hosts set a maximum memory limit, so this setting 
 * may be ignored if it exceeds the maximum allowable limit. Check with your web 
 * host for more information.
 * 
 * Note that 'maxFileSize' will not affect post_max_size or upload_max_filesize 
 * as is set in php.ini.  Having a maxFileSize that exceeds either
 * will still result in errors that prevent the file upload.
 *
 * 
 * @copyright  Center for History and New Media, 2008-2011
 * @license    http://www.gnu.org/licenses/gpl-3.0.txt
 * @version    $Id:$
 * @package CsvImport
 * @author CHNM
 **/

defined('CSV_IMPORT_DIRECTORY') or define('CSV_IMPORT_DIRECTORY', dirname(__FILE__));

require_once CSV_IMPORT_DIRECTORY . '/functions.php';

add_plugin_hook('install', 'csv_import_install');
add_plugin_hook('uninstall', 'csv_import_uninstall');
add_plugin_hook('admin_theme_header', 'csv_import_admin_header');
add_plugin_hook('define_acl', 'csv_import_define_acl');

add_filter('admin_navigation_main', 'csv_import_admin_navigation');
