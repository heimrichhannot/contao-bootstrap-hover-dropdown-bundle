# Contao Bootstrap Hover Dropdown Bundle

![](https://img.shields.io/packagist/v/heimrichhannot/contao-bootstrap-hover-dropdown-bundle.svg)
![](https://img.shields.io/packagist/dt/heimrichhannot/contao-bootstrap-hover-dropdown-bundle.svg)
[![](https://img.shields.io/travis/heimrichhannot/contao-bootstrap-hover-dropdown-bundle/master.svg)](https://travis-ci.org/heimrichhannot/contao-bootstrap-hover-dropdown-bundle/)
[![](https://img.shields.io/coveralls/heimrichhannot/contao-bootstrap-hover-dropdown-bundle/master.svg)](https://coveralls.io/github/heimrichhannot/contao-bootstrap-hover-dropdown-bundle)

This bundle offers hover functionality for the contao navigation using a bootstrap dropdown menu.

## Installation

Install via composer: `composer require heimrichhannot/contao-encore-bundle` and update your database.

### Installation with frontend assets using webpack

If you want to add the frontend assets (JS & CSS) to your project using webpack, please
add [foxy/foxy](https://github.com/fxpio/foxy) to the depndencies of your project's `composer.json` and add the following to its `config` section:

```json
"foxy": {
  "manager": "yarn",
  "manager-version": "^1.5.0"
}
```

Using this, foxy will automatically add the needed yarn packages to your project's `node_modules` folder.

If you want to specify which frontend assets to use on a per page level, you can use [heimrichhannot/contao-encore-bundle](https://github.com/heimrichhannot/contao-encore-bundle). 


## Usage

Select the `nav_hover_dropdown.html5` (legacy: `nav_navbar_collapse_hover.html5`) template inside your navigation module or copy the template and adjust for your needs.