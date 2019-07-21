const Koa = require('koa');
const Router = require('koa-router');
const cors = require('@koa/cors');
const static = require('koa-static');
const path = require('path');

const app = new Koa();
const router = new Router();

const livereload = require('../../');

// set port
const PORT = process.env.PORT || 80;

// allow cors request
app.use(cors());

// serve static file as a public
app.use(static(path.join(__dirname, '/public')));

/**
 * @description configure koa-liverefresh
 */
livereload(router, true, {
  public: path.join(__dirname, 'public'),
});

// root get request handler
router.get('/', ctx => {
  ctx.body = '<h1>hello word</h1>';
});

// attached router object with app
app.use(router.routes()).use(router.allowedMethods());

// listen to the server
app.listen(PORT, () => {
  console.log(`server is listening port: ${PORT}`);
});
