'use strict';

// Importing required modules
const { src, dest, parallel, series, watch } = require('gulp');
const sass = require('gulp-sass')(require('sass'));
const autoprefixer = require('autoprefixer');
const postcss = require('gulp-postcss');

// Move JS Files to dist/js
function js() {
    return src([
            'node_modules/bootstrap/dist/js/bootstrap.bundle.min.js',
            'node_modules/apexcharts/dist/apexcharts.min.js',
            'node_modules/tiny-slider/dist/min/tiny-slider.js',
            'node_modules/vanilla-rangeslider/js/rangeslider.min.js',
            'node_modules/counterup2/dist/index.js',
            'node_modules/vanilla-datatables/dist/vanilla-dataTables.min.js',
            'node_modules/imagesloaded/imagesloaded.pkgd.min.js',
            'node_modules/isotope-layout/dist/isotope.pkgd.min.js',
            'node_modules/venobox/dist/venobox.min.js'
        ])
        .pipe(dest('dist/js'));
}

// Move CSS to dist/css
function css() {
    return src([
            'node_modules/apexcharts/dist/apexcharts.css',
            'node_modules/bootstrap-icons/font/bootstrap-icons.min.css',
            'node_modules/tiny-slider/dist/tiny-slider.css',
            'node_modules/vanilla-rangeslider/css/rangeslider.css',
            'node_modules/vanilla-datatables/dist/vanilla-dataTables.min.css',
            'node_modules/venobox/dist/venobox.min.css'
        ])
        .pipe(dest('dist/css'));
}

// CSS Autoprefixer
function cssAutoprefixer() {
    return src('node_modules/bootstrap/dist/css/bootstrap.min.css')
        .pipe(postcss([autoprefixer({
            overrideBrowserslist: ['last 2 versions']
        })]))
        .pipe(dest('dist/css/'));
}

// Move Web Fonts files to "dist/fonts" folder
function webFonts() {
    return src('node_modules/bootstrap-icons/font/fonts/*')
        .pipe(dest('dist/css/fonts'));
}

// Move all static images to dist/img
function staticImages() {
    return src('static/img/**/*')
        .pipe(dest('dist/img'));
}

// Move all static JS to dist/js
function staticJS() {
    return src('static/js/*')
        .pipe(dest('dist/js'));
}

// Move all static files to dist/
function staticFiles() {
    return src('static/*')
        .pipe(dest('dist/'));
}

// SCSS to CSS convert
function sassToCSS() {
    return src('src/scss/*.scss')
        .pipe(sass.sync().on('error', sass.logError))
        .pipe(postcss([autoprefixer({
            overrideBrowserslist: ['last 2 versions']
        })]))
        .pipe(dest('dist/'));
}

// Move HTML files to dist/
function htmlFiles() {
    return src([
            'src/html/common/*.html',
            'src/html/elements/*.html',
            'src/html/pages/*.html'
        ])
        .pipe(dest('dist/'));
}

// Watching
function watching() {
    watch('static/img/**/*', staticImages);
    watch('static/js/*', staticJS);
    watch('static/*', staticFiles);
    watch('src/scss/*.scss', sassToCSS);
    watch([
        'src/html/common/*.html',
        'src/html/elements/*.html',
        'src/html/pages/*.html'
    ], htmlFiles);
}

// Exports
exports.default = series(parallel(js, css, cssAutoprefixer, webFonts, staticImages, staticJS, staticFiles, sassToCSS, htmlFiles), watching);
exports.watch = watching;