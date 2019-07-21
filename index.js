const sse = require('./lib/sse');
const evt = require('./lib/evt');

/**
 * @param {object} router router instance of your koa app
 * @param {object=} config location of public and view directories
 * @param {boolean=} devEnv default true.
 * @description pass false when your project running on production
 */
let livereload = (
  router,
  devEnv = true,
  config = { public: false, views: false },
) => {
  // if devEnv is false then don't activate the livereload
  if (!devEnv) return;

  router.get('/event_stream', ctx => {
    config['isPublic'] = config.public ? true : false;
    config['isViews'] = config.views ? true : false;

    // otherwise node will automatically close this connection in 2 minutes
    ctx.req.setTimeout(Number.MAX_VALUE);

    ctx.type = 'text/event-stream; charset=utf-8';
    ctx.set('Cache-Control', 'no-cache');
    ctx.set('Connection', 'keep-alive');

    const body = (ctx.body = sse());
    const stream = evt.subscribe('reload', config);
    stream.pipe(body);

    // if the connection closes or errors,
    // we stop the SSE.
    const socket = ctx.socket;
    socket.on('error', close);
    socket.on('close', close);

    function close() {
      stream.unpipe(body);
      socket.removeListener('error', close);
      socket.removeListener('close', close);
    }
  });
};

module.exports = livereload;
