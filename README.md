# Nintendo Switch + Tech - WordPress Theme

Required plugins:

* Advanced Custom Fields Pro

## Local Development Requirements

For JavaScript and CSS/SCSS changes this theme uses NPM scripts to build from source files and output compressed and minified files for production.

The following need to be installed:

* NodeJS - [Download](https://nodejs.org/en/download/) or install via homebrew `brew install node`

## Development Setup

On first setup you'll need to run the following command inside the theme folder:

`npm install`

This will install all the dependencies to run tasks, and scripts needed for the site.

## Local Development

To run build and watch for changes simply run:

`npm dev`

To build assets:

`npm build`

To build for production:

`npm build:production`
