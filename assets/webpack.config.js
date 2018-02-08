const path = require('path')

const ExtractTextPlugin = require('extract-text-webpack-plugin')
const CopyWebpackPlugin = require('copy-webpack-plugin')

module.exports = {
  context: path.resolve(__dirname),
  entry: {
    'main': [
      './js/main.js',
      './sass/main.scss'
    ],
    'editor': './sass/admin/editor.scss'
  },
  output: {
    filename: 'scripts/[name].js',
    path: path.resolve(__dirname, '../public/'),
    publicPath: '../'
  },
  module: {
    rules: [
      {
        test: /\.js$/,
        exclude: [/(node_modules)/],
        use: [
          {
            loader: 'babel-loader'
          }
        ]
      },
      {
        test: /\.(sass|scss|css)$/,
        use: ExtractTextPlugin.extract({
          use: [
            'css-loader',
            'sass-loader'
          ]
        })
      },
      {
        test: /\.(gif|png|jpe?g|svg)$/i,
        use: [
          {
            loader: 'file-loader',
            options: {
              name: '[path][name].[ext]'
            }
          },
          {
            loader: 'image-webpack-loader',
            options: {
              svgo: {
                plugins: [
                  {
                    removeDoctype: true
                  },
                  {
                    removeTitle: true
                  },
                  {
                    collapseGroups: true
                  },
                  {
                    removeUnknownsAndDefaults: false
                  }
                ]
              },
              mozjpeg: {
                quality: 65
              },
              pngquant: {
                quality: '65-90',
                speed: 4
              }
            }
          }
        ]
      },
      {
        test: /\.(eot|ttf|woff|woff2)$/,
        use: [
          {
            loader: 'file-loader',
            options: {
              name: '[path][name].[ext]'
            }
          }
        ]
      }
    ]
  },
  resolve: {
    modules: [
      'node_modules'
    ]
  },
  plugins: [
    new ExtractTextPlugin({
      filename: 'styles/[name].css',
      allChunks: true
    }),
    new CopyWebpackPlugin([
      {
        from: 'images/**/*',
        to: ''
      }
    ])
  ]
}
