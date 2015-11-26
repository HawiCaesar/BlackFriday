module.exports = function(grunt){

//load all grunt tasks
require('matchdep').filterDev('grunt-*').forEach(grunt.loadNpmTasks);

	grunt.initConfig({
		compass: {
			dev: {
				options: {
					config: 'config.rb',
					force: true
				}
			}
		},

		watch: {
			sass: {
				files: ['sass/*.scss'],
				tasks: ['compass:dev']
			},
			/*watch to see if js files have been changed or new packages have been installed */
			js: {
				files: ['js/*js'],
				tasks: ['uglify']
			},
			/*watch for file change and reload browser*/
			livereload: {
				files: ['*.html' , 'css/*.css' , 'js/*.js','files/*.css','files/*.js', 'files/owl/assets/*.css'],
				options: {
					livereload: true
				}
			},

		}
	});
grunt.registerTask('default' , 'watch');
};