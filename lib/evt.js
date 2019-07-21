const Readable = require('stream').Readable;
const inherits = require('util').inherits;
const watch = require('watch');

/**
 * Returns a new subscription event event.
 * Real APIs would care about the `event`.
 */

exports.subscribe = function(event, options) {
  // console.info(options);
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
  this.public = options.public;
  this.isPublic = options.isPublic;
  this.views = options.views;
  this.isViews = options.isViews;
}

Subscription.prototype._read = function() {
  // while (this.push(String(this.value++))) {}

  if (this.isPublic) {
    watch.watchTree(this.public, (f, curr, prev) => {
      // if file was changed
      if (!(typeof f == 'object' && prev === null && curr === null)) {
        // console.warn('[PUBLIC] file was changed: refreshing the browser');
        this.push(String('reload'));
      }
    });
  }

  if (this.isViews) {
    watch.watchTree(this.views, (f, curr, prev) => {
      // if file was changed
      if (!(typeof f == 'object' && prev === null && curr === null)) {
        // console.warn('[VIEWS] file was changed: refreshing the browser');
        this.push(String('reload'));
      }
    });
  }
};
