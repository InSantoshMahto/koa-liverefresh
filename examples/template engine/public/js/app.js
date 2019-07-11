let evtSource = new EventSource('http://localhost:80/event_stream');

evtSource.onmessage = function(e) {
  console.log('onMsg: ' + e.data);
  console.log(`message received from server: reloading your page`);
  window.location.reload();
};

evtSource.onopen = function(e) {
  console.info('connected', e);
};

evtSource.onerror = function(e) {
  console.error('error', e);
  evtSource.close();
};
