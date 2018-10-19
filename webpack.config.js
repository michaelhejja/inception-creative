const path = require('path');
const webpack = require('webpack');
const ExtractTextPlugin = require('extract-text-webpack-plugin');
const StyleLintPlugin = require('stylelint-webpack-plugin');
const BrowserSyncPlugin = require('browser-sync-webpack-plugin');
const JsonImporter = require('node-sass-json-importer');

const ENVIRONMENT = process.env.NODE_ENV || 'development';
let sourceMap = 'inline-source-map';

// Fixes compile error when source-map is set on production build
if (ENVIRONMENT === 'dev' || ENVIRONMENT === 'qa' || ENVIRONMENT === 'prod') {
    sourceMap = '(none)';
}

console.log('\nRunning webpack!'); // eslint-disable-line

// Webpack Entrypoints
const entryPoints = {
    main: ['babel-polyfill', './src'] // our global entry point. Feel free to add more here.
};

module.exports = {
    devtool: sourceMap, // the best source map for dev. may want to change for production, or remove
    entry: entryPoints,
    output: {
        path: path.join(__dirname, 'wp-content/themes/inception'), // output into assets/nuveenstatic
        filename: 'js/[name].js'
    },
    node: {
        Buffer: false // this helps with stylelint
    },
    module: { // set loaders for different file types
        rules: [
            {
                test: /\.ejs/,
                use: [
                    { loader: 'file-loader?name=[name].html' },
                    { loader: 'ejs-html-loader' }
                ]
            },
            {
                test: /\.(eot|woff|woff2|ttf|svg|png|jpg|gif)$/,
                loader: 'url-loader?limit=30000&name=[name]-[hash].[ext]'
            },
            {   // js uses babel and eslint
                test: /\.js/,
                use: ['babel-loader', 'eslint-loader'],
                exclude: /node_modules/
            },
            {   // compile scss with css loader, postcss loader, and sass loader
                test: /\.scss/,
                use: ExtractTextPlugin.extract({
                    fallback: 'style-loader',
                    use: [
                        {
                            loader: 'css-loader',
                            options: {
                                sourceMap: true,
                                importLoaders: 1
                            }
                        },
                        { loader: 'postcss-loader',
                            options: {
                                plugins: () => [
                                  require('postcss-object-fit-images')(), // eslint-disable-line
                                  require('autoprefixer') // eslint-disable-line
                                ]
                            }
                        },
                        { loader: 'sass-loader',
                            options: {
                                importer: JsonImporter,
                                includePaths: [
                                    path.resolve(__dirname, 'node_modules/bourbon-neat/core'),
                                ],
                                sourceMap: true
                            }
                        }
                    ]
                })
            },
            {   // compile css in the same way, without the sass loader
                test: /\.css/,
                use: ExtractTextPlugin.extract({
                    fallback: 'style-loader',
                    use: [
                        {
                            loader: 'css-loader',
                            options: {
                                sourceMap: true,
                                importLoaders: 1
                            }
                        },
                        { loader: 'postcss-loader' }
                    ]
                })
            }
        ]
    },
    plugins: [
        new ExtractTextPlugin('style.css'), // extract css into a separate file
        new StyleLintPlugin({ // stylelint configuration
            context: './src',
            configFile: '.stylelintrc',
            files: '**/*.scss',
            failOnError: false,
            quiet: false
        }),
        new webpack.LoaderOptionsPlugin({
            options: {
                postcss: [ // postcss plugins
                    require('postcss-cssnext'), // eslint-disable-line
                    require('postcss-reporter')({ clearMessages: true }) // eslint-disable-line
                ]
            }
        }),
        new BrowserSyncPlugin({
            host: 'inception.test',
            files: ['src/**.*', 'dist/**.*'],
            reloadDelay: 1000
        })
    ],
    resolve: {
        modules: [path.join(__dirname, './src'), path.join(__dirname, './node_modules')],
        extensions: ['.js', '.scss', '.css']
    }
};
