const webpack = require('webpack')
const path = require('path')
const extractTextWebpackPlugin = require('extract-text-webpack-plugin')
const uglifyJsPlugin = require('uglifyjs-webpack-plugin')
const optimizeCssAssetsWebpackPlugin = require('optimize-css-assets-webpack-plugin')

let config = {
  entry: './src/app.js',
  output: {
    path: path.resolve(__dirname, './dist'),
    filename: './js/app.bundle.js'
  },
  module: {
    rules: [
      {
        test: /\.js$/, // files ending with .js
        exclude: /node_modules/, // exclude the node_modules directory
        loader: "babel-loader" // use this (babel-core) loader
      },
      {
        test: /\.scss$/,
        use:  extractTextWebpackPlugin.extract({
          use: ["css-loader?-url", "sass-loader"],
          fallback: "style-loader"
        })
      }
    ]
  },
  plugins: [
    new extractTextWebpackPlugin('./css/main.css'),
  ],
  devServer: {
    contentBase: path.resolve(__dirname, './dist'),
    historyApiFallback: true,
    inline: true,
    open: true
  },
  devtool: 'eval-source-maps'
}

if (process.env.NODE_ENV === 'production') {
  config.plugins.push(
    new uglifyJsPlugin(),
    new optimizeCssAssetsWebpackPlugin()
  )
}

module.exports = config;