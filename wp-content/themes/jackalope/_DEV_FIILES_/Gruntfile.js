//  NOTES, possible stuff, reminders, etc.
//  - Should we look into a module to deploy the site, something like rsync or dploy, check out http://css-tricks.com/deployment/
//  - Where should we grab it from, git is starting to look more attractive
//  - How to get this running right off the bat? Once we activate the theme. Do you need intall grunt? Run grunt for the watch?


module.exports = function(grunt) {

// 1. All configuration goes here 
// ---------------------------------------------------------------------------------------------------------------------------------------------------------------


    grunt.initConfig({
        pkg: grunt.file.readJSON('package.json'),

        //  A. Configure concat so that it combines all JS files
        concat: {
            dist:{
                src:    'js/*.js',                
                dest:   'js/to_prod/global_prod.js'      
            }
        },

        //  B. Configure concat so that it minifies all JS files
        uglify: {
            options: {
                mangle: false, //keeps it from changing variable and function names
            },
            build:{
                src:    'js/to_prod/global_prod.js',     
                dest:   '../js/global_prod.min.js'  
            }
        },

        //  C. Get rid of the unuglied js
        clean: {
                clean: 'js/global_prod.js'       
        },

        //  D. Configure SASS so that it compiles mini
        sass: {
            dist: {
                options: { 
                    style: 'compressed',
                    banner: '/*  \nTheme Name: SBX & Timber Starter \nDescription: Starter Theme to use with Timber \nAuthor: Sandbox Studio, Chicago \n*/\n' 
                },                    
                files:   { '../style.css' : 'scss/*.scss' }  
            } 
        },

        //  E. Copy changes made in the dev PHP & TWIG files to the production files
        copy: {
            main: {
                files: [
                    {expand: true, cwd: 'models/', src: '*.php', dest: '../'},
                    {expand: true, src: 'views/*.twig', dest: '../'},
                    {expand: true, src: 'functions.php', dest: '../'}
                ]
            }
        },

        //  F. Have Grunt watch our files
        //  Do you have to run grunt in the terminal to get this watching? Can you just fire up the files?
        watch: {
            options: { 
                livereload: true,                 //  Comment out if causing problems (port ____ already in use)
            },
            scripts: {
                files:   ['js/*.js'],             //  Select the files
                tasks:   ['concat', 'uglify'],    //  What to do with them
                options: { spawn: false }         //  ??, just include it...
            },
            css: {
                files:   ['scss/*.scss'],           
                tasks:   ['sass'],               
                options: { spawn: false }
            },
            models: {
                files:   ['models/*.php'],
                tasks:   ['copy'],
                options: { spawn: false }
            },
            views: {
                files:   ['views/*.twig'],
                tasks:   ['copy'],
                options: { spawn: false }
            },
            functions_php: {
                files:   ['functions.php'],
                tasks:   ['copy'],
                options: { spawn: false }
            }
        }
    });




// 2. Where we tell Grunt we plan to use this plug-in.
// ---------------------------------------------------------------------------------------------------------------------------------------------------------------


    grunt.loadNpmTasks('grunt-contrib-concat');
    grunt.loadNpmTasks('grunt-contrib-uglify');
    grunt.loadNpmTasks('grunt-contrib-clean');
    grunt.loadNpmTasks('grunt-contrib-sass');
    grunt.loadNpmTasks('grunt-contrib-copy');
    grunt.loadNpmTasks('grunt-contrib-watch');



// 3. Where we tell Grunt what to do when we type "grunt" into the terminal.
// ---------------------------------------------------------------------------------------------------------------------------------------------------------------


    grunt.registerTask('default', ['concat', 'uglify', 'clean', 'sass', 'copy', 'watch']); 


};