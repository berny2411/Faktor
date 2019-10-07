const path = require('path');
const fs = require('fs');

const csso = require('csso');

const { main: normalizeCssName } = require('normalize.css/package.json');
const normalizeCssPath = path.resolve(__dirname, `node_modules/normalize.css/${normalizeCssName}`);
const content = fs.readFileSync(normalizeCssPath, { encoding: 'utf-8' });

const minifyContent = csso.minify(content).css;

fs.writeFileSync('./normalize.min.css', minifyContent, {
  encoding: 'utf-8',
});