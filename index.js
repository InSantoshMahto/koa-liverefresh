const Koa = require('koa');
const Router = require('koa-router');
const cors = require('@koa/cors');
const static = require('koa-static');
const render = require('koa-ejs');
const path = require('path');

const app = (module.exports = new Koa());
const router = new Router();

let livereload = require('./lib');

// importing views
const INDEX = 'index';

// allow cors request
app.use(cors());
// serve static file as a public
app.use(static(path.join(__dirname, '/public')));

// view engine with ejs rendering
render(app, {
  root: path.join(__dirname, 'views'),
  // layout: 'layout',
  viewExt: 'ejs',
  delimiter: '%',
  cache: false,
  debug: false,
  async: true,
});

router.get('/', async (ctx) => {
  // ctx.body = `<h1 style='text-align:center'>hello world</h1>`;
  let sse = ``;
  await ctx.render(INDEX,{
    sse
  });
});

router.get('/test', (ctx) => {
  ctx.body = `<h1>i am working</h1>`;
});

livereload(router);

// ping routes for check whether server is alive or not
router.get('/ping', (ctx) => {
  ctx.body = `i am alive`;
});

// attached router object with app
app.use(router.routes()).use(router.allowedMethods());

if (!module.parent)
  app.listen(80, () => {
    console.log('server is listening port: 80');
  });
