const { VueLoaderPlugin } = require('vue-loader');
const webpack = require('webpack');  // Add this line
const path = require('path');

module.exports = {
    mode: 'development',
    entry: './src/index.js', // Your main JavaScript file
    output: {
        path: path.resolve(__dirname, 'dist'), // Output directory
        filename: 'bundle.js',
        publicPath: '/'
    },
    devServer: {
        static: {
            directory: path.join(__dirname, 'dist'),
        },
        compress: true,
        port: 9000, // You can choose any port
        hot: true,
        devMiddleware: {
            publicPath: '/'
        },
        headers: {
            'Access-Control-Allow-Origin': '*',
        },
        client: {
            overlay: {
                errors: true,
                warnings: true,
            },
        },
        proxy: {
            '/': {
                target: 'https://gfcalc.local',
                changeOrigin: true,
                secure: false, // Set to false if your local environment uses self-signed certificates
            }
        }
    },

    module: {
        rules: [
            {
                test: /\.vue$/,
                loader: 'vue-loader'
            },
            {
                test: /\.js$/,
                loader: 'babel-loader',
                exclude: /node_modules/
            },
            {
                test: /\.css$/,
                use: [
                    'vue-style-loader',
                    'css-loader'
                ]
            }
        ]
    },
    plugins: [
        new VueLoaderPlugin(),
        new webpack.HotModuleReplacementPlugin() // Now this should work
    ]
};
