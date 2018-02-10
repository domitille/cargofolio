You are welcome to contribute to this project,
all pull requests are welcome !


# How to contribute:

## setup a dev environment

1 clone this repository

`git clone http://github.com/domitille/cargofolio`

2 install dependencies

`npm install`

3 change `style.css` to enable `@import url('css/default.css');`

## compile scss automatically

run this, so that each time a scss file is modified, a new css will be compiled
`nodemon -e scss --exec gulp build`

don't have nodemon ? install it with `npm i nodemon -g`


## commit

please address your pull requests directly to domitille/cargofolio

In order to have the project up and running, please include generated default.min.css into your commits
