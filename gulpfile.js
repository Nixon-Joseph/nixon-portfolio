var gulp = require("gulp");
var newer = require('gulp-newer');
var sass = require("gulp-sass");
var uglify = require("gulp-uglify");
// var imagemin = require('gulp-imagemin');
var imagemin = require('gulp-tinypng');

const cssDest = './public/styles';
const imgDest = './public/images';
const jsDest = './public/scripts';

gulp.task("sass", function(cb) {
    gulp.src("./app/styles/**/*.scss")
        .pipe(newer(cssDest))
        .pipe(sass({outputStyle: 'compressed'}))
        .pipe(gulp.dest(cssDest));
    cb();
});

gulp.task("images", function(cb) {
    gulp.src("./app/images/**")
        .pipe(newer(imgDest))
        .pipe(imagemin('YSRHj4XKWgnzWc9cdpgmZP1sMJqz7pwP'))
        .pipe(gulp.dest(imgDest));
    cb();
});

gulp.task("javascript", function(cb) {
    gulp.src("./app/scripts/**/*.js")
        .pipe(newer(jsDest))
        .pipe(uglify())
        .pipe(gulp.dest(jsDest));
    cb();
});

// gulp.task("moveAngular", function(cb) {
//     gulp.src('./app/angular/dist/**/*')
//         .pipe(gulp.dest(jsDest + '/angular'))
//     cb();
// });

gulp.task(
    "default",
    gulp.series("sass", function(cb) {
        gulp.watch("./app/styles/**/*.scss", gulp.series("sass"));
        gulp.watch("./app/images/**/*", gulp.series("images"));
        gulp.watch("./app/scripts/**/*.js", gulp.series("javascript"));
        // gulp.watch("./app/angular/dist/**/*", gulp.series("moveAngular"));
        cb();
    })
);
