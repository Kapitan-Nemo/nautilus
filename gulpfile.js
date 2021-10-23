'use strict';

let gulp = require('gulp');
let sass = require('gulp-sass')(require('sass'));
let autoprefixer = require('gulp-autoprefixer');
let cleanCSS = require('gulp-clean-css');
let sassGlob = require('gulp-sass-glob');
let sourcemaps = require('gulp-sourcemaps');
let uglify = require('gulp-uglify');
var concat = require('gulp-concat');


const config = {
    watch: {
        sass: [
            "./assets/src/sass/**/**.sass",
            "./assets/src/sass/**/**.scss",
        ],
        js: [
            './assets/src/js/**/**.js'
        ],
        php: [
            `*.php`,
            "./templates/**/*.php",
            "./components/**/*.php",
        ],
    },
    path: {
        sass: {
            src: [
                './assets/src/sass/style.scss',
            ],
            dest: './assets/dist/css'
        },
    }
};

gulp.task('watch', (done) => { 
    gulp.watch(config.watch.js, gulp.series('global-js'));
    gulp.watch(config.watch.js, gulp.series('ajax-search-js'));

    gulp.watch(config.watch.sass, gulp.series('sass'));
});


gulp.task('sass', (done) => {
    return gulp
        .src(config.path.sass.src)
        .pipe(sourcemaps.init())
        .pipe(sassGlob())
        .pipe(sass())
        .pipe(autoprefixer())
        .pipe(cleanCSS())
        .pipe(sourcemaps.write('./'))
        .pipe(gulp.dest(config.path.sass.dest));
});

gulp.task('global-js', function() {
    return  gulp.src(['./assets/src/js/global/siema.min.js', './assets/src/js/global/swup/swup.min.js', './assets/src/js/global/swup/swup-scroll-plugin.min.js',   './assets/src/js/global/swup/swup-config.js','./assets/src/js/global/navbar.js' ])
    .pipe(concat('theme.min.js'))
    .pipe(uglify())
    .pipe(gulp.dest('./assets/dist/js/global/'))   
});

  
  gulp.task('ajax-search-js', function() {
    return  gulp.src(['./assets/src/js/global/ajax-search.js'])
    .pipe(concat('ajax-search.min.js'))
    .pipe(uglify())
    .pipe(gulp.dest('./assets/dist/js/global/'))   
});

gulp.task('default', gulp.parallel('watch'));