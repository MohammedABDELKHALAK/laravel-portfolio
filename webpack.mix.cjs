
// const mix = require('laravel-mix');

// // Your Laravel Mix configurations

// mix.webpackConfig({
//   // Add your custom webpack configuration here
//   module: {
//     rules: [
//       {
//         test: /\.(png|jpe?g|gif)$/i,
//         use: [
//           {
//             loader: 'file-loader',
//             options: {
//               name: '[name].[ext]',
//               outputPath: 'images/',
//             },
//           },
//         ],
//       },
//     ],
//   },
//   // Other webpack configurations
// });
    
const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel applications. By default, we are compiling the CSS
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.js(['resources/js/bootstrap.js', 'resources/js/app.js' ], 'public/js/app.js')
    .css('resources/css/app.css', 'public/css/app.css');

    mix.styles('node_modules/bootstrap/dist/css/bootstrap.min.css', 'public/css/theme.css');
