const sse = require('./sse');
const evt = require('./evt');
let livereload = (router) => {
  router.get('/event_stream', (ctx) => {
    // otherwise node will automatically close this connection in 2 minutes
    ctx.req.setTimeout(Number.MAX_VALUE);

    ctx.type = 'text/event-stream; charset=utf-8';
    ctx.set('Cache-Control', 'no-cache');
    ctx.set('Connection', 'keep-alive');

    const body = (ctx.body = sse());
    const stream = evt.subscribe();
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
