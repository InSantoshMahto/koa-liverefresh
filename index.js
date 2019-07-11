const sse = require('./lib/sse');
const evt = require('./lib/evt');

let livereload = (router, public, views) => {
  // console.warn(`public: ${public}, views: ${views}`);
  router.get('/event_stream', (ctx) => {
    // otherwise node will automatically close this connection in 2 minutes
    ctx.req.setTimeout(Number.MAX_VALUE);

    ctx.type = 'text/event-stream; charset=utf-8';
    ctx.set('Cache-Control', 'no-cache');
    ctx.set('Connection', 'keep-alive');

    const body = (ctx.body = sse());
    const stream = evt.subscribe('reload', { public, views });
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
