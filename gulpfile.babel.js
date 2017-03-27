/**
 *
 *  Web Starter Kit
 *  Copyright 2015 Google Inc. All rights reserved.
 *
 *  Licensed under the Apache License, Version 2.0 (the "License");
 *  you may not use this file except in compliance with the License.
 *  You may obtain a copy of the License at
 *
 *      https://www.apache.org/licenses/LICENSE-2.0
 *
 *  Unless required by applicable law or agreed to in writing, software
 *  distributed under the License is distributed on an "AS IS" BASIS,
 *  WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 *  See the License for the specific language governing permissions and
 *  limitations under the License
 *
 */

'use strict';

// This gulpfile makes use of new JavaScript features.
// Babel handles this without us having to do anything. It just works.
// You can read more about the new JavaScript features here:
// https://babeljs.io/docs/learn-es2015/

import path from 'path';
import gulp from 'gulp';
import del from 'del';
import runSequence from 'run-sequence';
import browserSync from 'browser-sync';
import moment from 'moment';
import gulpLoadPlugins from 'gulp-load-plugins';
import { output as pagespeed } from 'psi';
import pkg from './package.json';

const $ = gulpLoadPlugins();
const reload = browserSync.reload;

// File paths to various assets are defined here.
var PATHS = {
    phpcs: [
        '**/*.php',
        '!wpcs',
        '!wpcs/**'
    ]
};

// Lint JavaScript
gulp.task('lint', () =>
    gulp.src(['src/js/**/*.js', '!node_modules/**'])
    .pipe($.eslint())
    .pipe($.eslint.format())
    .pipe($.if(!browserSync.active, $.eslint.failAfterError()))
);

const svgo = require('gulp-svgo');
// Optimize images
gulp.task('images', () => 
    gulp.src('src/images/**/*')
        .pipe($.if('*.svg', svgo({ plugins: [
            {removeTitle: true},
            {removeDimensions: true}
        ]})))
        .pipe($.cache($.imagemin({
            plugins: [$.imagemin.gifsicle(), $.imagemin.jpegtran(), $.imagemin.svgo()],
            progressive: true,
            interlaced: true
        })))
        .pipe(gulp.dest('dist/images'))
    .pipe($.size({ title: 'images' }))
);

gulp.task('styles', () => {
    const AUTOPREFIXER_BROWSERS = [
        'ie >= 10',
        'ie_mob >= 10',
        'ff >= 30',
        'chrome >= 34',
        'safari >= 7',
        'opera >= 23',
        'ios >= 7',
        'android >= 4.4',
        'bb >= 10'
    ];
    const neat = require('node-neat').includePaths;

    // For best performance, don't add Sass partials to `gulp.src`
    return gulp.src('src/sass/style.scss')
        .pipe($.sourcemaps.init())
        .pipe($.sass({
            precision: 10,
            includePaths: ['src/sass/**/*.scss'].concat(neat)
        }).on('error', $.sass.logError))
        .pipe($.autoprefixer(AUTOPREFIXER_BROWSERS))
        // Concatenate and minify styles
        .pipe($.if('*.css', $.cssnano({ discardComments: true, zindex: false })))
        .pipe($.size({ title: 'styles' }))
        .pipe($.sourcemaps.write('./'))
        .pipe(gulp.dest('src/'));
});

// Concatenate and minify JavaScript. Optionally transpiles ES2015 code to ES5.
// to enable ES2015 support remove the line `"only": "gulpfile.babel.js",` in the
// `.babelrc` file.
gulp.task('scripts', () =>
    gulp.src([
        // Note: Since we are not using useref in the scripts build pipeline,
        //       you need to explicitly list your scripts here in the right order
        //       to be correctly concatenated
        './src/js/main.js',
        './src/js/navigation.js',
        './src/js/skip-link-focus-fix.js',
        './node_modules/headroom.js/dist/headroom.js',
        './src/js/socialshare-slide.js',
        './src/js/scrollhandler.js',
        './src/js/comments.js',
    ])
    .pipe($.newer('.tmp/scripts'))
    .pipe($.sourcemaps.init())
    .pipe($.babel())
    .pipe($.sourcemaps.write())
    .pipe(gulp.dest('.tmp/scripts'))
    .pipe($.concat('main.min.js'))
    .pipe($.uglify({ preserveComments: 'some' }))
    // Output files
    .pipe($.size({ title: 'scripts' }))
    .pipe($.sourcemaps.write('.'))
    .pipe(gulp.dest('dist/assets/js'))
    .pipe(gulp.dest('.tmp/scripts'))
);

// Clean output directory
gulp.task('clean', () => del(['.tmp', 'dist/*', '!dist/.git'], { dot: true }));

gulp.task('copy:style', ['styles'], () => {
    return gulp.src(['src/style.css', 'src/style.css.map']).pipe(gulp.dest('dist/'));
});
gulp.task('copy:images', () => {
    return gulp.src('src/images/**/*').pipe(gulp.dest('dist/assets/images/'));
});

gulp.task('copy:php', () => {
    return gulp.src('src/**/*.php').pipe(gulp.dest('dist/'));
});

gulp.task('build', ['clean', 'styles'], cb => {
    runSequence(['copy:style', 'copy:images', 'scripts', 'copy:php'], cb);
});

// PHP Code Sniffer task
gulp.task('phpcs', function() {
    return gulp.src(PATHS.phpcs)
        .pipe($.phpcs({
            bin: 'wpcs/vendor/bin/phpcs',
            standard: './codesniffer.ruleset.xml',
            showSniffCode: true,
        }))
        .on('error', $.util.log)
        .pipe($.phpcs.reporter('log'));
});

// PHP Code Beautifier task
gulp.task('phpcbf', function() {
    return gulp.src(PATHS.phpcs)
        .pipe($.phpcbf({
            bin: 'wpcs/vendor/bin/phpcbf',
            standard: './codesniffer.ruleset.xml',
            warningSeverity: 0
        }))
        .on('error', $.util.log)
        .pipe(gulp.dest('.'));
});

// Package task
gulp.task('package', ['build'], function() {
    var title = 'presson-theme' + '_' + moment().format("YYYY-MM-DD_HH-mm") + '.zip';

    return gulp.src('dist/**/*')
        .pipe($.zip(title))
        .pipe(gulp.dest('packaged'));
});

gulp.task('serve:wordpress', ['build'], function() {
    browserSync({
        notify: false,
        // Customize the Browsersync console logging prefix
        proxy: 'http://localhost:8080'
    });

    gulp.watch(['src/sass/**/*.scss'], ['styles', 'copy:style', reload]);
    gulp.watch(['src/**/*.php'], ['copy:php', reload]);
    gulp.watch(['src/images/**/*'], ['copy:images', reload]);
    gulp.watch(['src/js/**/*'], ['lint', 'scripts', reload]);
});

// Build production files, the default task
gulp.task('default', ['clean'], cb =>
    runSequence(
        'lint', 'styles', ['build'],
        cb
    )
);

// Run PageSpeed Insights
gulp.task('pagespeed', cb =>
    // Update the below URL to the public URL of your site
    pagespeed('', {
        strategy: 'mobile'
            // By default we use the PageSpeed Insights free (no API key) tier.
            // Use a Google Developer API key if you have one: http://goo.gl/RkN0vE
            // key: 'YOUR_API_KEY'
    }, cb)
);

var penthouse = require('penthouse');
var fs = require('fs');

gulp.task('critical-css', ['styles'],  cb => {

    penthouse({
        url: 'src/html/front_page.html',
        css: path.join('./src/style.css'),
        width: 640,
        height: 360,
        forceInclude: [],
        timeout: 30000,
        strict: true,
        maxEmbeddedBase64Length: 1000,
        userAgent: 'Penthouse Critical Path CSS Generator',
        renderWaitTime: 100,
        blockJSRequests: true,
    },function(err, criticalCss) {
        if (err) {
            throw err;
        }

        fs.writeFileSync('./src/critical.css', criticalCss);

        return gulp.src('./src/critical.css')
            .pipe($.cssnano({ zindex: false }))
            .pipe(gulp.dest('dist/'));
    });
});

// Load custom tasks from the `tasks` directory
// Run: `npm install --save-dev require-dir` from the command-line
// try { require('require-dir')('tasks'); } catch (err) { console.error(err); }
