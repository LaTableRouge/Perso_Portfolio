// ==== LIB ==== //
const gulp = require(`gulp`);
const sass = require(`gulp-sass`);
const autoprefixer = require(`gulp-autoprefixer`); //cross browsers css
const sourcemaps = require(`gulp-sourcemaps`); //Create sourcemap files
const plumber = require(`gulp-plumber`); // Helps prevent stream crashing on errors
const babel = require(`gulp-babel`); // cross browsers js
const uglify = require(`gulp-uglify`);
const rename = require(`gulp-rename`); // rename files
const stripDebug = require(`gulp-strip-debug`); // remove console log & alerts from compiled js
const strip = require(`gulp-strip-comments`); // remove comments from compiled js
const prettier = require(`gulp-prettier`); // Prettier for scss files
const gcmq = require(`gulp-group-css-media-queries`); // group MediaQueries
const browserSync = require(`browser-sync`).create(); // Browser sync
const minifycss = require("gulp-uglifycss"); // minify css
const ftp = require("vinyl-ftp"); //FTP upload
const htmlmin = require("gulp-htmlmin");
const newer = require("gulp-newer");
const imagemin = require("gulp-imagemin");
const rimraf = require("gulp-rimraf");
const runSequence = require(`gulp4-run-sequence`);
const del = require('del');

// ==== VARIABLES ==== //
let reload = browserSync.reload;
const url = `http://local.portfolio.test/`;
//PATH
const assetPath = `./assets`;
const distPath = `./dist`;
//FTP
let host = "";
let username = "";
let password = "";
const remoteLocation = `www/`;
const localFiles = [`./assets/css/*`, `./assets/fonts/**/*`, `./assets/js/**/*`, `*.html`, `./assets/lib/**/*`, `./assets/pdf/*`, `./assets/img/**/*`];

/**
 * Compile scss
 */
//general
sass.compiler = require(`node-sass`);
gulp.task(`styles-general`, () => {
  return gulp
    .src(`${assetPath}/scss/general/style.scss`)
    .pipe(sourcemaps.init({}))
    .pipe(
      sass({
        //Sass error display
        errLogToConsole: true,
        outputStyle: "compact",
        precision: 10
      })
    )
    .pipe(
      autoprefixer(
        //Set how sharp is the autoprefixer
        "last 2 version",
        "> 1%",
        "safari 5",
        "ie 8",
        "ie 9",
        "opera 12.1",
        "ios 6",
        "android 4"
      )
    )
    .pipe(gcmq()) //Group Media Queries
    .pipe(sourcemaps.write(`/`))
    .pipe(reload({
      stream: true
    })) // Inject Styles when scss is compiled
    .pipe(gulp.dest(`${assetPath}/css/`));
});
//slideshow
gulp.task(`styles-slideshow`, () => {
  return gulp
    .src(`${assetPath}/scss/slideshow/slideshow.scss`)
    .pipe(sourcemaps.init({}))
    .pipe(
      sass({
        //Sass error display
        errLogToConsole: true,
        outputStyle: "compact",
        precision: 10
      })
    )
    .pipe(
      autoprefixer(
        //Set how sharp is the autoprefixer
        "last 2 version",
        "> 1%",
        "safari 5",
        "ie 8",
        "ie 9",
        "opera 12.1",
        "ios 6",
        "android 4"
      )
    )
    .pipe(gcmq()) //Group Media Queries
    .pipe(sourcemaps.write(`/`))
    .pipe(reload({
      stream: true
    })) // Inject Styles when scss is compiled
    .pipe(gulp.dest(`${assetPath}/css/`));
});
//instagram
gulp.task(`styles-instagram`, () => {
  return gulp
    .src(`${assetPath}/scss/instagram/instagram.scss`)
    .pipe(sourcemaps.init({}))
    .pipe(
      sass({
        //Sass error display
        errLogToConsole: true,
        outputStyle: "compact",
        precision: 10
      })
    )
    .pipe(
      autoprefixer(
        //Set how sharp is the autoprefixer
        "last 2 version",
        "> 1%",
        "safari 5",
        "ie 8",
        "ie 9",
        "opera 12.1",
        "ios 6",
        "android 4"
      )
    )
    .pipe(gcmq()) //Group Media Queries
    .pipe(sourcemaps.write(`/`))
    .pipe(reload({
      stream: true
    })) // Inject Styles when scss is compiled
    .pipe(gulp.dest(`${assetPath}/css/`));
});

/**
 * Minify compiled css
 */
gulp.task(`minify`, () => {
  return gulp
    .src(`${assetPath}/css/*.css`)
    .pipe(
      minifycss({
        maxLineLen: 80
      })
    )
    .pipe(rename({
      suffix: `.min`
    }))
    .pipe(gulp.dest(`${distPath}/assets/css/min`))
    .pipe(gulp.dest(`${assetPath}/css/min`))
});

/**
 * Babel js files
 */
gulp.task(`scripts`, () => {
  return gulp
    .src(`${assetPath}/js/*.js`)
    .pipe(plumber())
    .pipe(stripDebug())
    .pipe(strip())
    .pipe(babel({
      presets: [
        [`@babel/env`, {
          modules: false
        }]
      ]
    }))
    .pipe(uglify())
    .pipe(
      rename(path => {
        path.basename += `.ba`;
      })
    )
    .pipe(gulp.dest(`${distPath}/assets/js/babel`))
    .pipe(gulp.dest(`${assetPath}/js/babel`));
});

/**
 * Prettier scss & js files
 */
gulp.task(`prettier`, () => {
  return gulp
    .src([`${assetPath}/js/*.js`, `${assetPath}/scss/**/*.scss`])
    .pipe(prettier({
      singleQuote: true,
      jsxBracketSameLine: true,
    }))
    .pipe(gulp.dest(file => file.base));
});

/**
 * HTML minify
 */
gulp.task(`pages`, () => {
  return gulp.src([`*.html`])
    .pipe(htmlmin({
      collapseWhitespace: true,
      removeComments: true
    }))
    .pipe(gulp.dest(`${distPath}/`));
});

/**
 * IMG minify
 */
gulp.task(`images`, () => {
  // Add the newer pipe to pass through newer images only
  return gulp.src([`${assetPath}/img/**/*.{png,jpg,gif}`])
    // .pipe(newer(`./dist/img/`))
    .pipe(imagemin({
      optimizationLevel: 7,
      progressive: true,
      interlaced: true
    }))
    .pipe(gulp.dest(`${distPath}/assets/img/`))
});

/**
 * Copy lib
 */
gulp.task(`copy-lib`, () => {
  return gulp.src(`${assetPath}/lib/**/*.{js,css,png,map}`)
    .pipe(gulp.dest(`${distPath}/assets/lib/`));
});

/**
 * Copy PDF
 */
gulp.task(`copy-pdf`, () => {
  return gulp.src(`${assetPath}/pdf/**/*.pdf`)
    .pipe(gulp.dest(`${distPath}/assets/pdf/`));
});

/**
 * Copy fonts
 */
gulp.task(`copy-fonts`, () => {
  return gulp.src(`${assetPath}/fonts/**/*.{css,eot,svg,ttf,woff,woff2,otf}`)
    .pipe(gulp.dest(`${distPath}/assets/fonts/`));
});

/**
 * clean dist folder
 */
gulp.task(`clean`, () => {
  return del(`dist/`);
});

// ==== TASKS ==== //
//classic watch
gulp.task(`watch`, () => {
  gulp.watch(`${assetPath}/scss/**/*.scss`, gulp.series(`styles-general`));
  gulp.watch(`${assetPath}/scss/**/*.scss`, gulp.series(`styles-slideshow`));
  gulp.watch(`${assetPath}/scss/**/*.scss`, gulp.series(`styles-instagram`));
  gulp.watch(`${assetPath}/js/*.js`, gulp.series(`scripts`));
});
// Browser Sync
gulp.task(`dev`, () => {
  browserSync.init({
    proxy: url,
    injectChanges: true
  });
  gulp.watch(`${assetPath}/scss/**/*.scss`, gulp.series(`styles-general`));
  gulp.watch(`${assetPath}/scss/**/*.scss`, gulp.series(`styles-slideshow`));
  gulp.watch(`${assetPath}/scss/**/*.scss`, gulp.series(`styles-instagram`));
  gulp.watch(`${assetPath}/css/*.css`, gulp.series(`minify`));
  gulp.watch(`${assetPath}/js/*.js`, gulp.series(`scripts`));
});

//Build
gulp.task(`build`, (done) => {
  runSequence(`clean`, `prettier`, `styles-general`, `styles-slideshow`, `styles-instagram`, `pages`, `minify`, `scripts`, `copy-lib`, `copy-pdf`, `copy-fonts`, `images`, () => {
    console.log(`( •̀ ω •́ )✧`);
    done();
  });
});

/**
 * Upload to FTP
 */
// let getFtpConnection = () => {
//   return ftp.create({
//     host: `${host}`,
//     port: 21,
//     user: `${username}`,
//     password: `${password}`,
//     parallel: 5,
//     log: gutil.log
//   })
// }
// //deploy to remote server
// gulp.task(`remote-deploy`, function () {
//   return gulp.src(localFiles, {
//       base: `.`,
//       buffer: false
//     })
//     .pipe(getFtpConnection.newer(remoteLocation))
//     .pipe(getFtpConnection.dest(remoteLocation))
// })