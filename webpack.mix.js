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

mix.webpackConfig({
    plugins: [
        new CleanWebpackPlugin([
            'public/css',
            'public/js',
        ], { verbose: false })
    ],
});

mix.js('resources/assets/js/app.js', 'public/js/app.js')
    .sass('resources/assets/sass/app.scss', 'public/css')
    .styles('resources/assets/css/adminLte.min.css', 'public/css/adminLte.min.css')
    .minify('resources/assets/css/style.css')
    .styles('resources/assets/css/style.min.css', 'public/css/style.min.css')
    .styles('resources/assets/css/responsive.css', 'public/css/responsive.css')
    .js([
        'resources/assets/js/bootstrap/popper.min.js',
        'resources/assets/js/bootstrap/bootstrap.min.js',
        'resources/assets/js/others/plugins.js',
        'resources/assets/js/others/active.js',
    ], 'public/js/layout.js');





// const { mix } = require('laravel-mix');

// // Pacotes de terceiros
// const ImageminPlugin = require('imagemin-webpack-plugin').default;
// const CopyWebpackPlugin = require('copy-webpack-plugin');
// const imageminMozjpeg = require('imagemin-mozjpeg');
// const CleanWebpackPlugin = require('clean-webpack-plugin');

// // Configurações
// let config = {
//     host: '192.168.1.80',
//     base_url: 'http://admin.dev'
// };

// mix.webpackConfig({
//     plugins: [
//         new CleanWebpackPlugin([
//             'public/css',
//             'public/js',
//         ], { verbose: false })
//     ],
// });

// // Disable toast notifications
// mix.disableNotifications();

// mix.options({
//     cleanCss: {
//         level: {
//             1: {
//                 specialComments: 'none'
//             }
//         }
//     },
//     postCss: [
//         require('postcss-discard-comments')({ removeAll: true })
//     ],
//     purifyCss: false
// });

// // Tradução Laravel pt-BR - Copia pasta pt-BR para resources/lang
// //mix.copyDirectory('vendor/caouecs/laravel-lang/src/pt-BR', 'resources/lang/pt-BR');
// // Images - copia pasta para public/images
// mix.copyDirectory('resources/assets/images', 'public/images');

// // Copia arquivos de terceiros
// // Fonts
// mix.copy([
//     'bower_components/bootstrap/dist/fonts',
//     'bower_components/font-awesome/fonts'
// ], 'public/fonts');

// // Compila estilo SASS
// mix.sass('resources/assets/sass/style.scss', 'public/css')
//     .sass('resources/assets/sass/loginForm_style.scss', 'public/css')
//     .sass('resources/assets/sass/responsive.scss', 'public/css');

// // Agrupa CSS
// mix.styles([
//     'bower_components/bootstrap/dist/css/bootstrap.css',
//     'bower_components/font-awesome/css/font-awesome.css',
//     'bower_components/select2/dist/css/select2.css',
//     'bower_components/animate.css/animate.css',
//     'bower_components/hover/css/hover.css',
//     'bower_components/lity/dist/lity.css',
//     'bower_components/SpinKit/css/spinkit.css',
//     'bower_components/sweetalert2/dist/sweetalert2.css',
//     'bower_components/pretty-checkbox/src/pretty.min.css',
//     'public/css/style.*.css',
//     'public/css/responsive.*.css'
// ], 'public/css/app.css')
//     // Login
//     .styles([
//         'bower_components/bootstrap/dist/css/bootstrap.css',
//         'bower_components/font-awesome/css/font-awesome.css',
//         'bower_components/pretty-checkbox/src/pretty.min.css',
//         'public/css/loginForm_style.*.css'
//     ], 'public/css/app_login.css')
//     .version();

// // Agrupa JS
// mix.scripts([
//     'bower_components/jquery/dist/jquery.js',
//     'bower_components/bootstrap/dist/js/bootstrap.js',
//     'bower_components/select2/dist/js/select2.full.js',
//     'bower_components/sweetalert2/dist/sweetalert2.js',
//     'bower_components/lity/dist/lity.js',
//     'bower_components/parallax/deploy/jquery.parallax.js',
//     'bower_components/wow/dist/wow.js'
// ], 'public/js/app.js')
//     // Login
//     .scripts([
//         'bower_components/jquery/dist/jquery.js',
//         'bower_components/bootstrap/dist/js/bootstrap.js'
//     ], 'public/js/basic.js')
//     .version();

// // Comprime imagens quando em produção (npm run prod)
// if (mix.config.inProduction) {
//     mix.webpackConfig({
//         plugins: [
//             new CopyWebpackPlugin([{
//                 from: 'resources/assets/images',
//                 to: 'images', // Laravel mix will place this in 'public/images'
//             }]),
//             new ImageminPlugin({
//                 test: /\.(jpe?g|png|gif|svg)$/i,
//                 plugins: [
//                     imageminMozjpeg({
//                         quality: 70,
//                     })
//                 ]
//             })
//         ]
//     });
// }

// // Version
// //mix.version();

// // Browserfy
// mix.browserSync({
//     files: [
//         'resources/sass/**/*.*',
//         'resources/views/**/*.*',
//         'public/css/*.*',
//         'public/js/*.*',
//         'app/Modules/**/Resources/views/**/*.*'
//     ],
//     host: config.host,
//     proxy: config.base_url,
//     port: 3002,
//     online: true,
//     logConnections: false,
//     reloadOnRestart: false,
//     notify: false,
//     open: false //false, local, external, ui, tunnel
//     // injectChanges: true,
// });
