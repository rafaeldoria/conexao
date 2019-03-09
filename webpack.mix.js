let mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */
const CleanWebpackPlugin = require('clean-webpack-plugin');
let ImageminPlugin = require('imagemin-webpack-plugin').default;

mix.webpackConfig({
    plugins: [
        new CleanWebpackPlugin([
            'public/css',
            'public/js',
        ], { verbose: false }),
        new ImageminPlugin({
            //            disable: process.env.NODE_ENV !== 'production', // Disable during development
            pngquant: {
                quality: '50',
            },
            test: /\.(jpe?g|png|gif|svg)$/i,
        }),
    ],
});

mix.js('resources/assets/js/app.js', 'public/js/app.min.js')
    .sass('resources/assets/sass/app.scss', 'public/css')
    .styles('resources/assets/css/adminLte.css', 'public/css/adminLte.min.css')
    .styles('resources/assets/css/style.css', 'public/css/style.min.css')
    .styles('resources/assets/css/responsive.css', 'public/css/responsive.min.css')
    .styles('resources/assets/css/bootstrap/bootstrap.min.css', 'public/css/bootstrap/bootstrap.min.css')
    .styles('resources/assets/css/others/animate.css', 'public/css/others/animate.min.css')
    .styles('resources/assets/css/others/font-awesome.min.css', 'public/css/others/font-awesome.min.css')
    .styles('resources/assets/css/others/magnific-popup.css', 'public/css/others/magnific-popup.css')
    .styles('resources/assets/css/others/meanmenu.min.css', 'public/css/others/meanmenu.min.css')
    .styles('resources/assets/css/others/owl.carousel.min.css', 'public/css/others/owl.carousel.min.css')
    .styles('resources/assets/css/others/pe-icon-7-stroke.css', 'public/css/others/pe-icon-7-stroke.css')
    .styles('resources/assets/css/article/writeArticle.css', 'public/css/writeArticle.css')
    .styles('resources/assets/css/profile.css', 'public/css/profile.css')
    .copyDirectory('resources/assets/js/bootstrap/popper.min.js', 'public/js/popper.min.js')
    .js('resources/assets/js/bootstrap/bootstrap.min.js', 'public/js/bootstrap.min.js')
    .js('resources/assets/js/others/plugins.js', 'public/js/plugins.min.js')
    .js('resources/assets/js/bootstrap-filestyle.min.js', 'public/js/bootstrap-filestyle.min.js')
    .js('resources/assets/js/others/active.js', 'public/js/active.min.js');