const Readable = require('stream').Readable;
const inherits = require('util').inherits;
const watch = require('watch');
const path = require('path');

/**
 * Returns a new subscription event event.
 * Real APIs would care about the `event`.
 */

exports.subscribe = function(event, options) {
  return Subscription(options);
};

/**
 * Subscription stream. Just increments the result.
 * Never ends!
 */

inherits(Subscription, Readable);

function Subscription(options) {
  if (!(this instanceof Subscription)) return new Subscription(options);

  options = options || {};
  Readable.call(this, options);

  this.value = 0;
}

Subscription.prototype._read = function() {
  // while (this.push(String(this.value++))) {}
  watch.watchTree(path.join(__dirname, '../public'), (f, curr, prev) => {
    // if file was changed
    if (!(typeof f == 'object' && prev === null && curr === null)) {
      // console.warn('file was changed');
      this.push(String('reload'));
    }
  });

  watch.watchTree(path.join(__dirname, '../views'), (f, curr, prev) => {
    // if file was changed
    if (!(typeof f == 'object' && prev === null && curr === null)) {
      console.warn('file was changed: refreshing the browser');
      this.push(String('reload'));
    }
  });
};
