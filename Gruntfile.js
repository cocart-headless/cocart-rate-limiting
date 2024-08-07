/**
 * Build automation scripts.
 * 
 * @package CoCart
 */

module.exports = function(grunt) {
	'use strict';

	require('load-grunt-tasks')(grunt);

	// Project configuration.
	grunt.initConfig({
		pkg: grunt.file.readJSON('package.json'),

		// Bump version numbers (replace with version in package.json)
		replace: {
			container: {
				src: [
					'<%= pkg.name %>.php',
					'includes/class-<%= pkg.name %>.php',
				],
				overwrite: true,
				replacements: [
					{
						from: /Description:.*$/m,
						to: "Description: <%= pkg.description %>"
					},
					{
						from: /Requires at least:.*$/m,
						to: "Requires at least: <%= pkg.requires %>"
					},
					{
						from: /Requires PHP:.*$/m,
						to: "Requires PHP: <%= pkg.requires_php %>"
					},
					{
						from: /WC requires at least:.*$/m,
						to: "WC requires at least: <%= pkg.wc_requires %>"
					},
					{
						from: /WC tested up to:.*$/m,
						to: "WC tested up to: <%= pkg.wc_tested_up_to %>"
					},
					{
						from: /CoCart requires at least:.*$/m,
						to: 'CoCart requires at least: <%= pkg.cocart_requires %>'
					},
					{
						from: /CoCart tested up to:.*$/m,
						to: 'CoCart tested up to: <%= pkg.cocart_tested_up_to %>'
					},
					{
						from: /Version:.*$/m,
						to: "Version:     <%= pkg.version %>"
					},
					{
						from: /public static \$version = \'.*.'/m,
						to: "public static $version = '<%= pkg.version %>'"
					},
					{
						from: /public static \$required_wp = \'.*.'/m,
						to: "public static $required_wp = '<%= pkg.requires %>'"
					},
					{
						from: /public static \$required_woo = \'.*.'/m,
						to: "public static $required_woo = '<%= pkg.wc_requires %>'"
					},
					{
						from: /public static \$required_php = \'.*.'/m,
						to: "public static $required_php = '<%= pkg.requires_php %>'"
					}
				]
			},
			readme: {
				src: [ 'readme.txt' ],
				overwrite: true,
				replacements: [
					{
						from: /Requires at least:(\*\*|)(\s*?)[0-9.-]+(\s*?)$/mi,
						to: 'Requires at least:$1$2<%= pkg.requires %>$3'
					},
					{
						from: /Requires PHP:(\*\*|)(\s*?)[0-9.-]+(\s*?)$/mi,
						to: 'Requires PHP:$1$2<%= pkg.requires_php %>$3'
					},
					{
						from: /Tested up to:(\*\*|)(\s*?)[0-9.-]+(\s*?)$/mi,
						to: 'Tested up to:$1$2<%= pkg.tested_up_to %>$3'
					},
				]
			},
			stable: {
				src: [ 'readme.txt' ],
				overwrite: true,
				replacements: [
					{
						from: /Stable tag:(\*\*|)(\s*?)[0-9.-]+(\s*?)$/mi,
						to: 'Stable tag:$1$2<%= pkg.version %>$3'
					},
				]
			},
			package: {
				src: [
					'load-package.php',
				],
				overwrite: true,
				replacements: [
					{
						from: /@version .*$/m,
						to: "@version <%= pkg.version %>"
					},
				]
			}
		},

		// Copies the plugin to create deployable plugin.
		copy: {
			build: {
				files: [
					{
						expand: true,
						src: [
							'**',
							'!.*',
							'!**/*.{gif,jpg,jpeg,js,json,log,lock,md,png,scss,sh,txt,xml,zip}',
							'!.*/**',
							'!.DS_Store',
							'!.htaccess',
							'!<%= pkg.name %>-git/**',
							'!<%= pkg.name %>-svn/**',
							'!node_modules/**',
							'!releases/**',
							'!vendor/**',
							'!unit-tests/**',
							'readme.txt'
						],
						dest: 'build/',
						dot: true
					}
				]
			}
		},

		// Compresses the deployable plugin folder.
		compress: {
			zip: {
				options: {
					archive: './releases/<%= pkg.name %>-v<%= pkg.version %>.zip',
					mode: 'zip'
				},
				files: [
					{
						expand: true,
						cwd: './build/',
						src: '**',
						dest: '<%= pkg.name %>'
					}
				]
			}
		},

		// Deletes the deployable plugin folder once zipped up.
		clean: {
			build: [ 'build/' ]
		}
	});

	// Set the default grunt command to run version command.
	grunt.registerTask( 'default', [ 'version' ] );

	// Update version of plugin.
	grunt.registerTask( 'version', [ 'replace:container', 'replace:package', 'replace:readme' ] );

	// Update stable version of plugin.
	grunt.registerTask( 'stable', [ 'replace:stable' ] );

	/**
	 * Creates a deployable plugin zipped up ready to upload
	 * and install on a WordPress installation.
	 */
	grunt.registerTask( 'zip', [ 'copy:build', 'compress:zip', 'clean:build' ] );

	// Build Plugin.
	grunt.registerTask( 'build', [ 'version', 'zip' ] );

	// Ready for release.
	grunt.registerTask( 'ready', [ 'version', 'stable', 'zip' ] );

};
