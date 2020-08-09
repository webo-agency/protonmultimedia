const path = require('path');
const MiniCssExtractPlugin = require('mini-css-extract-plugin')
const VueLoaderPlugin = require('vue-loader/lib/plugin')

const jsConfig = {
    entry: {
        Main: ['./assets/js/main.js'],
        Rolldown: ['./assets/js/rolldown.js'],
    },
    output: {
        path: path.resolve(__dirname, 'assets/public/dist/js'),
        filename: '[name].js'
    },
    module: {
        rules: [
            {
                test: /\.js$/,
                exclude: /node_modules/,
                use: {
                    loader: 'babel-loader',
                    options: {
                        presets: ['@babel/preset-env'],
                        plugins: ['@babel/transform-runtime', "@babel/plugin-proposal-class-properties"]
                    }
                }
            },
            {
                test: /\.vue$/,
                use: {
                    loader: 'vue-loader',
                }
            },
        ]
    },
    resolve: {
        alias: {
          'vue$': 'vue/dist/vue.esm.js'
        }
    },
    plugins: [
        new VueLoaderPlugin()
    ],
    devServer: {
        contentBase: path.resolve(__dirname, 'assets'),
        publicPath: '/public/dist/js/'
    }
}

const scssConfig = {
    entry: {
        style: ['./assets/sass/style.scss'],
        index: ['./assets/css/index.css'],
    },
    output: {
        path: path.resolve(__dirname, 'assets/public/dist/css'),
    },
    module: {
        rules: [
            {
                test: /\.(png|svg|jpg|gif)$/,
                loader: 'file-loader',
                options: {
                    outputPath: 'images',
                },
            },
            {
                test: /\.css$/,
                use: [
                    'vue-style-loader',
                    process.env.NODE_ENV === "development"
                      ? "style-loader"
                      : MiniCssExtractPlugin.loader,
                    {
                      loader: "css-loader",
                      options: { importLoaders: 1 }
                    },
                    {
                      loader: "postcss-loader"
                    }
                ]
            },
            {
                test: /\.s[ac]ss$/i,
                use: [
                    'style-loader',
                    {
                        loader: MiniCssExtractPlugin.loader,
                    },
                    {
                        loader: 'css-loader',
                        options: {
                            sourceMap: true,
                        },
                    },
                    {
                        loader: 'postcss-loader',
                        options: {
                            ident: 'postcss',
                            sourceMap: true,
                            plugins: [
                                require('autoprefixer'),
                            ]
                        }
                    },
                    {
                        loader: 'sass-loader',
                        options: {
                            sourceMap: true,
                            implementation: require('dart-sass'),
                            sassOptions: {
                                fiber: false,
                                sourceMap: true,
                            },
                        },
                    },
                ],
            },
        ],
    },
    plugins: [
        new MiniCssExtractPlugin({
            filename: '[name].css',
        }),
    ],
}

module.exports = [jsConfig, scssConfig];